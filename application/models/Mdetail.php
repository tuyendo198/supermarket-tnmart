<?php

class Mdetail extends CI_Model
{
	public function get_chitietsp($masp){
		$this->db->where('sanpham.PK_sMaSP', $masp);
		$this->db->join('nhomsanpham', 'nhomsanpham.PK_sMaNhomSP = sanpham.FK_sMaNhomSP');
		$arr_sp = $this->db->get('sanpham')->row_array();

		$this->db->where('FK_sMaSP', $arr_sp['PK_sMaSP']);
		$arr_sp['listAnh'] = $this->db->get('anh')->result_array();

		$this->db->where('FK_sMaSP', $arr_sp['PK_sMaSP']);
		$this->db->select('FK_sMaSP, sum(iSoLuongNhap) as soluong');
		$this->db->group_by('FK_sMaSP');
		$spNhap = $this->db->get('chitietphieunhap')->row_array();

		if (!empty($spNhap)) {
			$arr_sp['soluongcon'] = $spNhap['soluong'];
		}
		else{
			$arr_sp['soluongcon'] = 0;
		}

		$this->db->where('FK_sMaSP', $arr_sp['PK_sMaSP']);
		$this->db->where_not_in('FK_iMaTrangThai', [1, 5]);
		$this->db->select('FK_sMaSP, sum(iSoLuong) as soluong');
		$this->db->join('donhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang');
		$this->db->group_by('FK_sMaSP');
		$spXuat = $this->db->get('chitietdonhang')->row_array();
		if (!empty($spXuat)) {
			$arr_sp['soluongcon'] = $arr_sp['soluongcon'] - $spXuat['soluong'];
		}

		$this->db->where('FK_sMaSP', $arr_sp['PK_sMaSP']);
		$this->db->select('FK_sMaSP, sum(iSoLuongHuy) as soluong');
		$this->db->group_by('FK_sMaSP');
		$spHuy = $this->db->get('huysanpham')->row_array();
		if (!empty($spHuy)) {
			$arr_sp['soluongcon'] = $arr_sp['soluongcon'] - $spHuy['soluong'];
		}

		return $arr_sp;
	}

	// Thêm bình luận
	public function insert_binhluan($thongtin){
		$this->db->insert('binhluan', $thongtin);
		return $this->db->affected_rows();
	}

	public function get_listComment($masp){
		$this->db->where('FK_sMaSP', $masp);
		$this->db->select('binhluan.*, nguoidung.*');
		$this->db->join('taikhoan', 'taikhoan.PK_iMaTaiKhoan = binhluan.FK_iMaTaiKhoan', 'inner');
		$this->db->join('nguoidung', 'nguoidung.PK_sMaND = taikhoan.FK_sMaND', 'inner');
		return $this->db->get('binhluan')->result_array();
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

	public function get_listSpLienQuan($masp){
		$this->db->where('PK_sMaSP', $masp); 
		$this->db->select('FK_sMaNhomSP');
		$infoProduct = $this->db->get('sanpham')->row_array();
		$this->db->where('PK_sMaSP != ', $masp);
		$this->db->where('FK_sMaNhomSP', $infoProduct['FK_sMaNhomSP']);
		$this->db->limit(5);
		$listProductRelate = $this->db->get('sanpham')->result_array();
		foreach ($listProductRelate as $k => $v) {
			$listProductRelate[$k]['rating'] = $this->getRating($v['PK_sMaSP']);
		}
		return $listProductRelate;
	}

	public function checkIsBoughtProduct($masp, $matk)
	{
		$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $matk);
		$this->db->where('FK_sMaSP', $masp);
		$this->db->where('FK_iMaTrangThai', 4);
		$this->db->join('thongtingiaohang', 'thongtingiaohang.PK_iMaThongTinGH = donhang.FK_iMaThongTinGH');
		$this->db->join('chitietdonhang', 'donhang.PK_sMaDonHang = chitietdonhang.FK_sMaDonHang');
		$row = $this->db->get('donhang')->num_rows();
		if ($row > 0){
			return true;
		}
		return false;
	}

	public function saveRate($arrRate, $masp, $matk)
	{
		$this->db->where('FK_iMaTaiKhoan', $matk);
		$this->db->where('FK_sMaSP', $masp);
		$row = $this->db->get('danhgia')->num_rows();
		$rs = 0;
		if ($row > 0){
			$this->db->where('FK_iMaTaiKhoan', $matk);
			$this->db->where('FK_sMaSP', $masp);
			$this->db->update('danhgia', $arrRate);
			$rs = $this->db->affected_rows();
		}
		else{
			$arrRate['FK_sMaSP'] = $masp;
			$arrRate['FK_iMaTaiKhoan'] = $matk;
			$this->db->insert('danhgia', $arrRate);
			$rs = $this->db->affected_rows();
		}
		return $rs;
	}
}
