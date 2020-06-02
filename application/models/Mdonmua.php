<?php

class Mdonmua extends CI_Model
{
	// Lấy ra thông tin tài khoản
	public function get_thongtintaikhoan($matk){
		$this->db->where('PK_iMaTaiKhoan', $matk);
		$this->db->join('nguoidung', 'nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		return $this->db->get('taikhoan')->row_array();
	}
	// Lấy danh sách trạng thái
	public function get_listtrangthai()
	{
		return $this->db->get('trangthai')->result_array();
	}
	// Lấy danh sách đơn hàng
	public function get_donhang($matk)
	{
		$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $matk);
		$this->db->join('thongtingiaohang', 'thongtingiaohang.PK_iMaThongTinGH = donhang.FK_iMaThongTinGH', 'inner');
		$this->db->join('trangthai', 'trangthai.PK_iMaTrangThai = donhang.FK_iMaTrangThai', 'inner');
		$this->db->order_by('FK_iMaTrangThai', 'asc');
		$lsDon = $this->db->get('donhang')->result_array();
		$arrDonHang = array();
		foreach ($lsDon as $k => $v) {
			$arrDonHang[$v['FK_iMaTrangThai']][] = $v;
		}
		return $arrDonHang;
	}
	public function get_chitietdonhang($madh)
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
}
