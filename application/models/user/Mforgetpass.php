<?php

class Mforgetpass extends CI_Model
{
	public function get_taikhoan_info($tentk)
	{
		$this->db->where('sTenTaiKhoan', $tentk);
		return $this->db->get('taikhoan')->row_array();
	}

	public function update_pass($tentk, $mk)
	{
		$this->db->where('sTenTaiKhoan', $tentk);
		$this->db->update('taikhoan', array('sMatKhau' => $mk));
		return $this->db->affected_rows();
	}

}
