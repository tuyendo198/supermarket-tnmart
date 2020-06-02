<?php

class Mnhomsanpham extends CI_Model
{
	// Lấy ra tên nhóm sản phẩm có menu con
	public function get_tennhomdm()
	{
		$this->db->where('nhomdanhmuc.sTrangThai', 'Có menu con');
		$this->db->select('nhomdanhmuc.PK_iMaNhomDM, nhomdanhmuc.sTenNhomDM, nhomdanhmuc.sTrangThai');
		$this->db->from('nhomdanhmuc');
		return $this->db->get()->result_array();
	}

	// Lấy ra danh sách sản phẩm theo nhóm danh mục
	public function get_nhomsp()
	{
		$this->db->select('nhomsanpham.*, nhomdanhmuc.sTenNhomDM');
		$this->db->from('nhomsanpham');
		$this->db->join('nhomdanhmuc','nhomdanhmuc.PK_iMaNhomDM = nhomsanpham.FK_iMaNhomDM');
		$this->db->order_by('PK_sMaNhomSP', 'DESC');
		return $this->db->get()->result_array();
	}

	// Lấy ra mã nhóm sản phẩm max
	public function get_manhomsp_max(){
		$this->db->select_max('PK_sMaNhomSP');
		return $this->db->get('nhomsanpham')->row_array()['PK_sMaNhomSP'];
	}

	// Thêm sản phẩm
	public function insert_nhomsp($thongtin)
	{
		$this->db->insert('nhomsanpham',$thongtin);
		return $this->db->affected_rows();
	}
	// Lấy ra thông tin sản phẩm theo mã sản phẩm

	public function get_nhomsp_ma($ma){
		$this->db->where('PK_sMaNhomSP', $ma);
		return $this->db->get('nhomsanpham')->row_array();
	}
	// Sửa nhóm sản phẩm
	public function update_nhomsp($ma,$thongtin)
	{
		$this->db->where('PK_sMaNhomSP',$ma);
		$this->db->update('nhomsanpham',$thongtin);
		return $this->db->affected_rows();
	}
	// Xoá nhóm sản phẩm
	public function delete_nhomsp($malt){
		$this->db->where('PK_sMaNhomSP',$malt);
		$this->db->delete('nhomsanpham');
		return $this->db->affected_rows();
	}

	public function checkNhomSP($tennhomsp)
	{
		$this->db->where('sTenNhomSP', $tennhomsp);
		return $this->db->get('nhomsanpham')->num_rows();
	}
}
