<?php
/**
 * Created by Tuyên Đỗ Thị
 * Date: 01/04/2020
 * Time: 10:12 PM
 */

class Mreportdonhang extends CI_Model
{
	public function get_rangeyear()
	{
		$this->db->distinct();
		$this->db->select('YEAR(`dNgayLap`) as nam');
		$this->db->order_by('nam', 'asc');
		return $this->db->get('donhang')->result_array();
	}

	public function get_hinhthuctt()
	{
		return $this->db->get('hinhthucthanhtoan')->result_array();
	}

	public function get_donhang($year,$month,$hinhthuc,$khachhang)
	{
		$ngaylap = '';
		if (!empty($year)) {
			$ngaylap = $year;
		}
		if (!empty($month)) {
			if ($month < 10) {
				$month = '0'.$month;
			}
			$ngaylap = '-'.$month.'-';
		}
		if (!empty($ngaylap)) {
			$this->db->like('dNgayLap', $ngaylap);
		}
		if (!empty($hinhthuc)) {
			$this->db->where('FK_iMaHinhThuc', $hinhthuc);
		}
		if (!empty($khachhang)) {
			$this->db->like('sTenNguoiDung', $khachhang);
		}
		$this->db->where_in('PK_iMaTrangThai', [4, 5]);
		$this->db->select('donhang.*, nguoidung.sTenNguoiDung, trangthai.sTenTrangThai, hinhthucthanhtoan.sTenHinhThuc, sum(iSoLuong*fDonGia) as tongtien');
		$this->db->join('chitietdonhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang');
		$this->db->join('trangthai', 'trangthai.PK_iMaTrangThai = donhang.FK_iMaTrangThai');
		$this->db->join('hinhthucthanhtoan', 'hinhthucthanhtoan.PK_iMaHinhThuc = donhang.FK_iMaHinhThuc');
		$this->db->join('thongtingiaohang', 'donhang.FK_iMaThongTinGH = thongtingiaohang.PK_iMaThongTinGH');
		$this->db->join('taikhoan', 'thongtingiaohang.FK_iMaTaiKhoan = taikhoan.PK_iMaTaiKhoan');
		$this->db->join('nguoidung', 'taikhoan.FK_sMaND = nguoidung.PK_sMaND');
		$this->db->group_by('donhang.PK_sMaDonHang');
		$this->db->order_by('FK_iMaTrangThai', 'ASC');
		$this->db->order_by('sThanhToan', 'ASC');
		return $this->db->get('donhang')->result_array();
	}
}