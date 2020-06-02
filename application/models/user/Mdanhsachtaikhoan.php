<?php

class Mdanhsachtaikhoan extends CI_Model
{
	// Lấy ra danh sách tài khoản
	public function get_danhsach_taikhoan($matk){
		$this->db->where('PK_iMaTaiKhoan != ', $matk);
		$this->db->select('taikhoan.*, quyen.sTenQuyen, nguoidung.sTenNguoiDung');
		$this->db->join('quyen', 'quyen.PK_iMaQuyen = taikhoan.FK_iMaQuyen');
		$this->db->join('nguoidung', 'nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		$this->db->order_by('PK_iMaQuyen', 'DESC');
		return $this->db->get('taikhoan')->result_array();
	}
	// Lấy ra tất cả nhân viên
	public function get_nhanvien(){
		return $this->db->get('nguoidung')->result_array();
	}
	// Lấy ra tất cả nhân viên chưa có tài khoản
	public function get_nv_chuacoTK(){
		$this->db->where('PK_sMaND NOT IN (SELECT FK_sMaND FROM taikhoan)', '', false);
		return $this->db->get('nguoidung')->result_array();
	}
	// Lấy ra tất cả các quyền của hệ thống
	public function get_quyen(){
		$this->db->where('PK_iMaQuyen != ', 1);
		return $this->db->get('quyen')->result_array();
	}
	// Lấy ra các quyền khác quyền khách hàng
	public function get_quyen_nhanvien(){
		$this->db->where('PK_iMaQuyen !=', 2);
		return $this->db->get('quyen')->result_array();
	}
	// Insert tài khoản cho user
	public function insert_tk($thongtin){
		$this->db->insert('taikhoan', $thongtin);
		return $this->db->affected_rows();
	}
	// Lấy ra thông tin tài khoản
	public function get_info($ma){
		$this->db->where('PK_iMaTaiKhoan', $ma);
		$this->db->select('taikhoan.*, quyen.sTenQuyen, nguoidung.sTenNguoiDung');
		$this->db->join('quyen', 'quyen.PK_iMaQuyen = taikhoan.FK_iMaQuyen');
		$this->db->join('nguoidung', 'nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		return $this->db->get('taikhoan')->row_array();
	}
	// Update tài khoản
	public function update_taikhoan($matk, $info){
		$this->db->where('PK_iMaTaiKhoan', $matk);
		$this->db->update('taikhoan', $info);
		return $this->db->affected_rows();
	}
	// Update trạng thái tài khoản
	public function update_trangthai($ma, $state){
		$this->db->where('PK_iMaTaiKhoan', $ma);
		$this->db->update('taikhoan', array('sTrangThai' => $state));
		return $this->db->affected_rows();
	}
}
