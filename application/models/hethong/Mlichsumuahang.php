<?php

class Mlichsumuahang extends CI_Model
{
	public function getDanhSachKhachHang()
	{
		$this->db->distinct();
		$this->db->where('FK_iMaQuyen', 2); //Quyền khách hàng
		$this->db->select('nguoidung.*, SUBSTRING_INDEX(sTenNguoiDung, " ", -1) as ten, PK_iMaTaiKhoan');
		$this->db->join('taikhoan', 'nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		$this->db->order_by('ten, sTenNguoiDung','asc');
		$listKH = $this->db->get('nguoidung')->result_array();
		foreach ($listKH as $k => $v) {
			$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $v['PK_iMaTaiKhoan']);
			$this->db->join('thongtingiaohang','donhang.FK_iMaThongTinGH=thongtingiaohang.PK_iMaThongTinGH');
			$listKH[$k]['sodonhang'] = $this->db->get('donhang')->num_rows();

			$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $v['PK_iMaTaiKhoan']);
			$this->db->select('sum(iSoLuong*fDonGia) as tongtien');
			$this->db->join('thongtingiaohang','thongtingiaohang.PK_iMaThongTinGH=donhang.FK_iMaThongTinGH');
			$this->db->join('chitietdonhang','donhang.PK_sMaDonHang = chitietdonhang.FK_sMaDonHang');
			$listKH[$k]['tongtien'] = $this->db->get('donhang')->row_array()['tongtien'];
		}
		return $listKH;
	}

	public function getDonHangTaiKhoan($matk)
	{
		$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $matk);
		$this->db->select('donhang.*, trangthai.sTenTrangThai, count(FK_sMaSP) as sosp, sum(iSoLuong*fDonGia) as tongtien');
		$this->db->join('thongtingiaohang','thongtingiaohang.PK_iMaThongTinGH = donhang.FK_iMaThongTinGH');
		$this->db->join('trangthai','donhang.FK_iMaTrangThai = trangthai.PK_iMaTrangThai');
		$this->db->join('chitietdonhang','donhang.PK_sMaDonHang = chitietdonhang.FK_sMaDonHang');
		$this->db->order_by('FK_iMaTrangThai asc, dNgayLap desc');
		$this->db->group_by('PK_sMaDonHang');
		return $this->db->get('donhang')->result_array();
	}
}
?>
