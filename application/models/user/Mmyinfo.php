<?php

class Mmyinfo extends CI_Model
{
	// Lấy thông tin user theo tài khoản
	public function get_user($mauser){
		$this->db->where('FK_sMaND', $mauser);
		$this->db->select('PK_iMaTaiKhoan, sTenTaiKhoan, nguoidung.*');
		$this->db->join('nguoidung', 'nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		return $this->db->get('taikhoan')->row_array();
	}
	// Update thông tin user
	public function update_user($mauser, $data){
		$this->db->where('PK_sMaND', $mauser);
		$this->db->update('nguoidung', $data);
		return $this->db->affected_rows();
	}
}
