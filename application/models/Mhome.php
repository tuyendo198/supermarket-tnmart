<?php

class Mhome extends CI_Model
{
	/*Lấy dữ liệu menu*/
	public function get_menu(){
		$menu = $this->db->get('nhomdanhmuc')->result_array();
		foreach ($menu as $key => $value) {
			$this->db->where('FK_iMaNhomDM',$value['PK_iMaNhomDM']);
			$loaitin = $this->db->get('nhomsanpham')->result_array();
			if (!empty($loaitin)) {
				$menu[$key]['sTenNhomSP'] = $loaitin;
			}
		}
		return $menu;
	}

	public function getRating($masp){
		$this->db->where('FK_sMaSP', $masp);
		$listRate = $this->db->get('danhgia')->result_array();
		$soluong = count($listRate); //đếm số lượng trước khi bổ sung phần tử mảng
		$listRate['5star'] = 0;
		$listRate['4star'] = 0;
		$listRate['3star'] = 0;
		$listRate['2star'] = 0;
		$listRate['1star'] = 0;
		$tongRate = 0;
		foreach ($listRate as $k => $v) {
			$tongRate += $v['iDiemSo'];
			switch ($v['iDiemSo']) {
				case 5:
					$listRate['5star']++;
					break;
				case 4:
					$listRate['4star']++;
					break;
				case 3:
					$listRate['3star']++;
					break;
				case 2:
					$listRate['2star']++;
					break;
				case 1:
					$listRate['1star']++;
					break;
			}
		}
		if ($soluong == 0){
			$soluong = 1;
		}
		$listRate['trungbinh'] = $tongRate / $soluong;
		$listRate['soluong'] = $soluong;
		return $listRate;
	}

	public function getProductByCategory($manhomsp)
	{
		$this->db->where('FK_sMaNhomSP', $manhomsp);
		$listProduct = $this->db->get('sanpham')->result_array();
		foreach ($listProduct as $k => $v) {
			$listProduct[$k]['rating'] = $this->getRating($v['PK_sMaSP']);
			$listProduct[$k]['soluongcon'] = $this->getSoLuongCon($v['PK_sMaSP']);
		}
		return $listProduct;
	}

	// Lấy sản phẩm theo danh mục
	public function get_listProduct()
	{
		$list_cate = $this->db->get('nhomsanpham')->result_array();
		foreach ($list_cate as $k => $v) {
			$list_cate[$k]['sp'] = $this->getProductByCategory($v['PK_sMaNhomSP']);
		}
		return $list_cate;
	}

	public function getSoLuongCon($masp)
	{
		$this->db->where('FK_sMaSP', $masp);
		$this->db->select('FK_sMaSP, sum(iSoLuongNhap) as soluong');
		$this->db->group_by('FK_sMaSP');
		$spNhap = $this->db->get('chitietphieunhap')->row_array();

		if (!empty($spNhap)) {
			$soluongcon = $spNhap['soluong'];
		}
		else{
			$soluongcon = 0;
		}

		$this->db->where('FK_sMaSP', $masp);
		$this->db->where_not_in('FK_iMaTrangThai', [1, 5]);
		$this->db->select('FK_sMaSP, sum(iSoLuong) as soluong');
		$this->db->join('donhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang');
		$this->db->group_by('FK_sMaSP');
		$spXuat = $this->db->get('chitietdonhang')->row_array();
		if (!empty($spXuat)) {
			$soluongcon = $soluongcon - $spXuat['soluong'];
		}

		$this->db->where('FK_sMaSP', $masp);
		$this->db->select('FK_sMaSP, sum(iSoLuongHuy) as soluong');
		$this->db->group_by('FK_sMaSP');
		$spHuy = $this->db->get('huysanpham')->row_array();
		if (!empty($spHuy)) {
			$soluongcon = $soluongcon - $spHuy['soluong'];
		}
		return $soluongcon;
	}

	public function get_chitietsp($masp){
		$this->db->where('sanpham.PK_sMaSP', $masp);
		$this->db->select('sanpham.*, sTenNhomSP, sTenNSX');
		$this->db->join('nhasanxuat', 'nhasanxuat.PK_sMaNSX = sanpham.FK_sMaNSX');
		$this->db->join('nhomsanpham', 'nhomsanpham.PK_sMaNhomSP = sanpham.FK_sMaNhomSP');
		$arr_sp = $this->db->get('sanpham')->row_array();

		$this->db->where('FK_sMaSP', $arr_sp['PK_sMaSP']);
		$arr_sp['listAnh'] = $this->db->get('anh')->result_array();

		$arr_sp['soluongcon'] = $this->getSoLuongCon($arr_sp['PK_sMaSP']);
		return $arr_sp;
	}
	// Function đăng nhập
	public function dangnhap($taikhoan,$matkhau){
		$this->db->where('sTenTaiKhoan',$taikhoan);
		$this->db->where('sMatKhau',sha1($matkhau));
		$this->db->where('FK_iMaQuyen',2);
		$this->db->where('sTrangThai','Bình thường');
		$this->db->select('taikhoan.PK_iMaTaiKhoan, sTenTaiKhoan, FK_sMaND, FK_iMaQuyen, sTenNguoiDung, sAnhDaiDien');
		$this->db->join('nguoidung','nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		return $this->db->get('taikhoan')->row_array();
	}
	// Lấy ra mã khách hàng max
	public function get_makh_max(){
		$this->db->select_max('PK_sMaND');
		return $this->db->get('nguoidung')->row_array()['PK_sMaND'];
	}
	// Funtion đăng ký tài khoản khách hàng
	public function dangky($info_khachhang, $info_taikhoan){
		$this->db->insert('nguoidung', $info_khachhang);
		$this->db->insert('taikhoan', $info_taikhoan);
		return $this->db->insert_id();
	}

	public function countCart()
	{
		$session = getSession('info_khachhang');
		if (empty($session)){
			return 0;
		}
		$maTK = $session['mataikhoan'];
		$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $maTK);
		$this->db->where('FK_iMaTrangThai', 1); //trạng thái đang ở giỏ hàng của người dùng
		$this->db->join('chitietdonhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang', 'inner');
		$this->db->join('thongtingiaohang', 'donhang.FK_iMaThongTinGH = thongtingiaohang.PK_iMaThongTinGH', 'inner');
		return $this->db->get('donhang')->num_rows();
	}

	public function getListSPKhuyenMai()
	{
		$currentDate = date('Y-m-d');
		$this->db->where('dThoiGianBD <= ', $currentDate);
		$this->db->where('dThoiGianKT >= ', $currentDate);
		$this->db->join('khuyenmai', 'khuyenmai.PK_sMaKM = khuyenmai_sp.FK_sMaKM', 'inner');
		$this->db->join('sanpham', 'khuyenmai_sp.FK_sMaSP = sanpham.PK_sMaSP', 'inner');
		$this->db->order_by('FK_sMaKM, FK_sMaSP', 'asc');
		return $this->db->get('khuyenmai_sp')->result_array();
	}

	public function checkThongTinGiaoHang()
	{
		$session = getSession('info_khachhang');
		if (empty($session)){
			return false;
		}
		$this->db->where('FK_iMaTaiKhoan', $session['mataikhoan']);
		$row = $this->db->get('thongtingiaohang')->num_rows();
		if ($row > 0){
			return true;
		}
		return false;
	}

	public function checkTruncateEmail($email)
	{
		$this->db->where('sTenTaiKhoan', $email);
		return $this->db->get('taikhoan')->num_rows();
	}
}
?>
