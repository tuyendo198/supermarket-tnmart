<?php

class Mbinhluan extends CI_Model
{
	public function get_listbinhluan()
	{
		$this->db->join('sanpham', 'sanpham.PK_sMaSP = binhluan.FK_sMaSP');
		$this->db->join('taikhoan', 'binhluan.FK_iMaTaiKhoan = taikhoan.PK_iMaTaiKhoan');
		$this->db->join('nguoidung', 'nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		$this->db->order_by('dThoiGianBL ', 'DESC');
		return $this->db->get('binhluan')->result_array();
	}

	public function deleteBinhLuan($maBL)
	{
		$this->db->where('PK_iMaBL',$maBL);
		$this->db->delete('binhluan');
		return $this->db->affected_rows();
	}
}
