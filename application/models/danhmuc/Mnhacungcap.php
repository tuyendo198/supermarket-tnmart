<?php

class Mnhacungcap extends CI_Model
{
	// Lấy ra tất cả nhà cung cấp
	public function get_nhacc(){
		$this->db->order_by('PK_sMaNCC', 'DESC');
		return $this->db->get('nhacungcap')->result_array();
	}
	// Lấy ra mã nhà cung cấp max
	public function get_mancc_max(){
		$this->db->select_max('PK_sMaNCC');
		return $this->db->get('nhacungcap')->row_array()['PK_sMaNCC'];
	}
	// Thêm nhà cung cấp
	public function insert_nhacc($dl)
	{
		$this->db->insert('nhacungcap',$dl);
		return $this->db->affected_rows();
	}
	// Lấy ra thông tin từng nhà cung cấp
	public function get_ncc($mancc){
		$this->db->where('PK_sMaNCC', $mancc);
		return $this->db->get('nhacungcap')->row_array();
	}
	// Sửa nhà cung cấp
	public function update_nhacc($mancc, $thongtin){
		$this->db->where('PK_sMaNCC',$mancc);
		$this->db->update('nhacungcap',$thongtin);
		return $this->db->affected_rows();
	}
	// Xoá nhà cung cấp
	public function delete_nhacc($ma){
		$this->db->where('PK_sMaNCC',$ma);
		$this->db->delete('nhacungcap');
		return $this->db->affected_rows();
	}

	public function checkTenNCC($tenncc)
	{
		$this->db->where('sTenNCC', $tenncc);
		return $this->db->get('nhacungcap')->num_rows();
	}
}
