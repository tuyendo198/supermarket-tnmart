<?php

class Mnhasanxuat extends CI_Model
{
	// Lấy ra tất cả nhà sản xuất
	public function get_nhasx(){
		$this->db->order_by('PK_sMaNSX', 'DESC');
		return $this->db->get('nhasanxuat')->result_array();
	}
	// Lấy ra mã nhà sản xuất max
	public function get_mansx_max(){
		$this->db->select_max('PK_sMaNSX');
		return $this->db->get('nhasanxuat')->row_array()['PK_sMaNSX'];
	}
	// Thêm nhà sản xuất
	public function insert_nhasx($dl)
	{
		$this->db->insert('nhasanxuat',$dl);
		return $this->db->affected_rows();
	}
	// Lấy ra thông tin từng nhà sản xuất
	public function get_nsx($mansx){
		$this->db->where('PK_sMaNSX', $mansx);
		return $this->db->get('nhasanxuat')->row_array();
	}
	// Sửa nhà sản xuất
	public function update_nhasx($mansx, $thongtin){
		$this->db->where('PK_sMaNSX',$mansx);
		$this->db->update('nhasanxuat',$thongtin);
		return $this->db->affected_rows();
	}
	// Xoá nhà sản xuất
	public function delete_nhasx($ma){
		$this->db->where('PK_sMaNSX',$ma);
		$this->db->delete('nhasanxuat');
		return $this->db->affected_rows();
	}

	public function checkTenNSX($tennsx)
	{
		$this->db->where('sTenNSX', $tennsx);
		return $this->db->get('nhasanxuat')->num_rows();
	}
}
