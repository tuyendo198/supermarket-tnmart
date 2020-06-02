<?php

class Mquenmatkhau extends CI_Model
{
	public function checkEmail($tenTK, $email)
	{
		$this->db->where('sTenTaiKhoan', $tenTK);
		$this->db->where('sEmail', $email);
		$this->db->where('FK_iMaQuyen', 2); //quyền khách hàng
		$this->db->join('nguoidung', 'taikhoan.FK_sMaND = nguoidung.PK_sMaND');
		return $this->db->get('taikhoan')->row_array();
	}

	public function updatePassword($tenTK, $pass)
	{
		$this->db->where('sTenTaiKhoan', $tenTK);
		$this->db->update('taikhoan', array('sMatKhau' => sha1($pass)));
		return $this->db->affected_rows();
	}
}
