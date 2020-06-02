<?php

class Mgiohang extends CI_Model
{
	public function getProductByCategory($manhomsp)
	{
		$this->db->where('FK_sMaNhomSP', $manhomsp);
		return $this->db->get('sanpham')->result_array();
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
	// Lấy ra thông tin tài khoản
	public function get_thongtintaikhoan($matk){
		$this->db->where('PK_iMaTaiKhoan', $matk);
		$this->db->join('nguoidung', 'nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		return $this->db->get('taikhoan')->row_array();
	}

	// Lấy ra mã đơn hàng max
	public function get_madonhang_max(){
		$this->db->select_max('PK_sMaDonHang');
		return $this->db->get('donhang')->row_array()['PK_sMaDonHang'];
	}

	public function getThongTinGiaoHangUuTien($matk)
	{
		$this->db->where('FK_iMaTaiKhoan', $matk);
		$this->db->order_by('iDoUuTien', 'desc');
		return $this->db->get('thongtingiaohang')->row_array();
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

	public function addToCart($masp, $soluong, $matk)
	{
		$soluongcon = $this->getSoLuongCon($masp);
		if ($soluongcon <= 0) {
			return 0;
		}
		$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $matk);
		$this->db->where('FK_iMaTrangThai', 1); //trạng thái đang ở giỏ hàng của người dùng
		$this->db->join('thongtingiaohang', 'thongtingiaohang.PK_iMaThongTinGH = donhang.FK_iMaThongTinGH', 'inner');
		$donhang = $this->db->get('donhang')->row_array();
		if (!empty($donhang)){
			$madonhang = $donhang['PK_sMaDonHang'];
		}
		else{
			$mamax = $this->get_madonhang_max();
			$madonhang = generatePrimary($mamax);
			$arrInsDonHang = array(
				'PK_sMaDonHang' 	=> $madonhang,
				'dNgayLap' 			=> date('Y-m-d'),
				'sThanhToan'		=> 'Chưa đặt hàng',
				'FK_iMaTrangThai' 	=> 1,
				'FK_iMaHinhThuc'	=> 1,
				'FK_iMaThongTinGH'	=> $this->getThongTinGiaoHangUuTien($matk)['PK_iMaThongTinGH']
			);
			$this->db->insert('donhang', $arrInsDonHang);
		}

		$this->db->where('PK_sMaSP', $masp);
		$thongtinsp = $this->db->get('sanpham')->row_array();

		$this->db->where('FK_sMaDonHang', $madonhang);
		$this->db->where('FK_sMaSP', $masp);
		$chitietdonhang = $this->db->get('chitietdonhang')->row_array();
		if (!empty($chitietdonhang)){
			$this->db->where('FK_sMaDonHang', $madonhang);
			$this->db->where('FK_sMaSP', $masp);
			$this->db->update('chitietdonhang', array(
				'iSoLuong' 	=> $soluong,
				'fDonGia'	=> $thongtinsp['fGiaSP']
			));
		}
		else{
			$arrIns = array(
				'FK_sMaDonHang' => $madonhang,
				'FK_sMaSP' 		=> $masp,
				'iSoLuong' 		=> $soluong,
				'fDonGia'		=> $thongtinsp['fGiaSP']
			);
			$this->db->insert('chitietdonhang', $arrIns);
		}
		return $this->db->affected_rows();
	}

	public function checkGia($matk)
	{
		$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $matk);
		$this->db->where('FK_iMaTrangThai', 1); //trạng thái đang ở giỏ hàng của người dùng
		$this->db->where('fDonGia != ', 0);
		$this->db->where('sanpham.fGiaSP != chitietdonhang.fDonGia');
		$this->db->join('thongtingiaohang', 'thongtingiaohang.PK_iMaThongTinGH = donhang.FK_iMaThongTinGH', 'inner');
		$this->db->join('chitietdonhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang');
		$this->db->join('sanpham', 'sanpham.PK_sMaSP = chitietdonhang.FK_sMaSP');
		$arrSP = $this->db->get('donhang')->result_array();
		if (!empty($arrSP)){
			foreach ($arrSP as $key => $value) {
				$this->db->where('FK_sMaDonHang', $value['FK_sMaDonHang']);
				$this->db->where('FK_sMaSP', $value['FK_sMaSP']);
				$this->db->update('chitietdonhang', array('fDonGia' => $value['fGiaSP']));
			}
		}
	}

	public function get_product_in_cart($matk)
	{
		$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $matk);
		$this->db->where('FK_iMaTrangThai', 1); //trạng thái đang ở giỏ hàng của người dùng
		$this->db->join('thongtingiaohang', 'thongtingiaohang.PK_iMaThongTinGH = donhang.FK_iMaThongTinGH', 'inner');
		$this->db->join('chitietdonhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang');
		$this->db->join('sanpham', 'sanpham.PK_sMaSP = chitietdonhang.FK_sMaSP');
		$listProduct = $this->db->get('donhang')->result_array();
		foreach ($listProduct as $k => $v) {
			$this->db->where('FK_sMaSP', $v['PK_sMaSP']);
			$this->db->select('FK_sMaSP, sum(iSoLuongNhap) as soluong');
			$this->db->group_by('FK_sMaSP');
			$spNhap = $this->db->get('chitietphieunhap')->row_array();

			$this->db->where('FK_sMaSP', $v['PK_sMaSP']);
			$this->db->select('FK_sMaSP, sum(iSoLuong) as soluong');
			$this->db->group_by('FK_sMaSP');
			$spXuat = $this->db->get('chitietdonhang')->row_array();
			$listProduct[$k]['soluongcon'] = $spNhap['soluong'] - $spXuat['soluong'];
		}
		return $listProduct;
	}

	public function removeFromCart($masp, $matk)
	{
		$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $matk);
		$this->db->where('FK_iMaTrangThai', 1); //trạng thái đang ở giỏ hàng của người dùng
		$this->db->join('thongtingiaohang', 'thongtingiaohang.PK_iMaThongTinGH = donhang.FK_iMaThongTinGH', 'inner');
		$donhang = $this->db->get('donhang')->row_array();
		$madonhang = $donhang['PK_sMaDonHang'];

		$this->db->where('FK_sMaDonHang', $madonhang);
		$this->db->where('FK_sMaSP', $masp);
		$this->db->delete('chitietdonhang');
		return $this->db->affected_rows();
	}

	public function changeAmount($masp, $matk, $soluong)
	{
		$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $matk);
		$this->db->where('FK_iMaTrangThai', 1); //trạng thái đang ở giỏ hàng của người dùng
		$this->db->join('thongtingiaohang', 'thongtingiaohang.PK_iMaThongTinGH = donhang.FK_iMaThongTinGH', 'inner');
		$donhang = $this->db->get('donhang')->row_array();
		$madonhang = $donhang['PK_sMaDonHang'];

		$this->db->where('FK_sMaDonHang', $madonhang);
		$this->db->where('FK_sMaSP', $masp);
		$this->db->update('chitietdonhang', array('iSoLuong' => $soluong));
		return $this->db->affected_rows();
	}
}
