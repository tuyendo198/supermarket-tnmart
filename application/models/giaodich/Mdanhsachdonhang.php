<?php

class Mdanhsachdonhang extends CI_Model
{
	public function get_danhsachdonhang(){
		$this->db->select('donhang.*, count(FK_sMaSP) as sosp, sum(iSoLuong*fDonGia) as tongtien, thongtingiaohang.sHoTen, sDiaChiNhanHang, sSoDienThoai, iDoUuTien, taikhoan.sTenTaiKhoan, trangthai.sTenTrangThai');
		$this->db->join('trangthai', 'trangthai.PK_iMaTrangThai = donhang.FK_iMaTrangThai');
		$this->db->join('chitietdonhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang');
		$this->db->join('thongtingiaohang', 'donhang.FK_iMaThongTinGH = thongtingiaohang.PK_iMaThongTinGH');
		$this->db->join('taikhoan', 'thongtingiaohang.FK_iMaTaiKhoan = taikhoan.PK_iMaTaiKhoan');
		$this->db->group_by('FK_sMaDonHang');
		$this->db->order_by('FK_iMaTrangThai', 'asc');
		$this->db->order_by('dNgayLap', 'desc');
		return $this->db->get('donhang')->result_array();
	}

	public function getChiTietDonHang($madh)
	{
		$this->db->where('PK_sMaDonHang', $madh);
		$this->db->select('donhang.*, nguoidung.sTenNguoiDung');
		$this->db->join('thongtingiaohang', 'donhang.FK_iMaThongTinGH = thongtingiaohang.PK_iMaThongTinGH');
		$this->db->join('taikhoan', 'thongtingiaohang.FK_iMaTaiKhoan = taikhoan.PK_iMaTaiKhoan');
		$this->db->join('nguoidung', 'taikhoan.FK_sMaND = nguoidung.PK_sMaND');
		$donhang = $this->db->get('donhang')->row_array();
		$this->db->where('FK_sMaDonHang', $madh);
		$this->db->join('sanpham', 'chitietdonhang.FK_sMaSP = sanpham.PK_sMaSP');
		$donhang['chitiet'] = $this->db->get('chitietdonhang')->result_array();
		return $donhang;
	}

	public function chuyenTrangThai($madh, $matrangthai = null)
	{
		$session = getSession();
		$thoigianxuly = date('Y-m-d H:i:s');
		if (!empty($matrangthai)){
			$this->db->where('PK_sMaDonHang', $madh);
			$this->db->update('donhang', array(
				'FK_iMaTrangThai' => $matrangthai,
				'sThoiGianXuLy' => $thoigianxuly,
				'FK_iMaTaiKhoan' => $session['mataikhoan']
			));
			return $this->db->affected_rows();
		}
		else{
			$this->db->where('PK_iMaTrangThai > ', '(SELECT FK_iMaTrangThai FROM `donhang` WHERE `PK_sMaDonHang` LIKE "'.$madh.'")', false);
			$this->db->order_by('PK_iMaTrangThai', 'asc');
			$this->db->limit(1);
			$ttTiep = $this->db->get('trangthai')->row_array()['PK_iMaTrangThai'];
			
			$this->db->where('PK_sMaDonHang', $madh);
			$this->db->update('donhang', array(
				'FK_iMaTrangThai' => $ttTiep,
				'sThoiGianXuLy' => $thoigianxuly,
				'FK_iMaTaiKhoan' => $session['mataikhoan']
			));
			return $this->db->affected_rows();
		}
	}

	public function chuyenTrangThaiTruoc($madh)
	{
		$this->db->where('PK_iMaTrangThai < ', '(SELECT FK_iMaTrangThai FROM `donhang` WHERE `PK_sMaDonHang` LIKE "'.$madh.'")', false);
		$this->db->order_by('PK_iMaTrangThai', 'desc');
		$this->db->limit(1);
		$ttTruoc = $this->db->get('trangthai')->row_array()['PK_iMaTrangThai'];
		
		$this->db->where('PK_sMaDonHang', $madh);
		$this->db->update('donhang', array(
			'FK_iMaTrangThai' => $ttTruoc,
			'sThoiGianXuLy' => ''
		));
		return $this->db->affected_rows();
	}

	public function capNhatDaThanhToan($madh)
	{
		$this->db->where('PK_sMaDonHang', $madh);
		$this->db->update('donhang', array('sThanhToan' => 'Đã thanh toán'));
		return $this->db->affected_rows();
	}
}
