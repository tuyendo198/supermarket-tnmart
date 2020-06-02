<?php

class Mnhomdanhmuc extends CI_Model
{
	// Lấy ra thông tin nhóm danh mục
	public function get_nhomdanhmuc()
	{
		$this->db->select('*');
		$this->db->from('nhomdanhmuc');
		return $this->db->get()->result_array();
	}

	// Lấy ra số lượng danh mục thuộc nhóm danh mục
	public function get_slnhomdm($ma)
	{
		$this->db->where('FK_iMaNhomDM',$ma);
		return $this->db->get('nhomsanpham')->num_rows();
	}

	// Thêm nhóm danh mục
	public function insert_nhomdanhmuc($info)
	{
		$this->db->insert('nhomdanhmuc', $info);
		return $this->db->affected_rows();
	}

	// Lấy ra thông tin nhóm danh mục theo mã nhóm danh mục

	public function get_nhomdm_ma($ma){
		$this->db->where('PK_iMaNhomDM', $ma);
		return $this->db->get('nhomdanhmuc')->row_array();
	}

	// Sửa nhóm danh mục
	public function update_nhomdanhmuc($ma,$thongtin)
	{
		$this->db->where('PK_iMaNhomDM',$ma);
		$this->db->update('nhomdanhmuc',$thongtin);
		return $this->db->affected_rows();
	}

	// Xoá nhóm danh mục
	public function delete_nhomdanhmuc($matheloai)
	{
		$this->db->where('PK_iMaNhomDM',$matheloai);
		$this->db->delete('nhomdanhmuc');
		return $this->db->affected_rows();
	}

	public function checkTruncateTenNhomDM($tennhomdm)
	{
		$this->db->where('sTenNhomDM', $tennhomdm);
		return $this->db->get('nhomdanhmuc')->num_rows();
	}

}
