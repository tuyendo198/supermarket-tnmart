<?php

class Mprofile extends CI_Model
{
	// Lấy ra thông tin tài khoản
	public function get_thongtintaikhoan($mauser){
		$this->db->where('PK_sMaND', $mauser);
		return $this->db->get('nguoidung')->row_array();
	}
	// Update thông tin khách hàng
	public function update_info($mauser, $thongtin){
		$this->db->where('PK_sMaND', $mauser);
		$this->db->update('nguoidung', $thongtin);
		return $this->db->affected_rows();
	}
}
