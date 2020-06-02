<?php

class Mdanhsachnguoidung extends CI_Model
{
	// Lấy ra thông tin nhân viên
	public function get_thongtin_nv(){
		$this->db->order_by('PK_sMaND', 'DESC');
		return $this->db->get('nguoidung')->result_array();
	}
	// Lấy ra tất cả các quyền của hệ thống
	public function get_quyen(){
		return $this->db->get('quyen')->result_array();
	}
	// Lấy ra mã user max
	public function get_mauser_max(){
		$this->db->select_max('PK_sMaND');
		return $this->db->get('nguoidung')->row_array()['PK_sMaND'];
	}
	// Insert nhân viên
	public function insert_user($info_user){
		$this->db->insert('nguoidung', $info_user);
		return $this->db->affected_rows();
	}
	// Lấy ra thông tin nhân viên
	public function get_info($mauser){
		$this->db->where('PK_sMaND', $mauser);
		return $this->db->get('nguoidung')->row_array();
	}
	// Update nhân viên
	public function update_user($mauser, $info){
		$this->db->where('PK_sMaND', $mauser);
		$this->db->update('nguoidung', $info);
		return $this->db->affected_rows();
	}
}
