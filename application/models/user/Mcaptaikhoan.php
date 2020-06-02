<?php

class Mcaptaikhoan extends CI_Model
{
	// Lấy ra tất cả nhân viên
	public function get_nhanvien(){
		$this->db->where('FK_iMaQuyen !=', 2);
		$this->db->join('taikhoan', 'taikhoan.FK_sMaND = nguoidung.PK_sMaND');
		return $this->db->get('nguoidung')->result_array();
	}
	// Lấy ra tất cả các quyền của hệ thống
	public function get_quyen(){
		return $this->db->get('quyen')->result_array();
	}
	// Insert tài khoản cho user
	public function insert_tk($thongtin){
		$this->db->insert('taikhoan', $thongtin);
		return $this->db->affected_rows();
	}
}
