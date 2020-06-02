<?php

class Mtrangthai extends CI_Model
{
	// Lấy ra thông tin trạng thái
	public function get_trangthai()
	{
		return $this->db->get('trangthai')->result_array();
	}

	// Insert trạng thái
	public function insert_trangthai($info){
		$this->db->insert('trangthai', $info);
		return $this->db->affected_rows();
	}

	// Lấy ra mã trạng thái
	public function get_ma_status($ma){
		$this->db->where('PK_iMaTrangThai', $ma);
		return $this->db->get('trangthai')->row_array();
	}

	// Update trạng thái
	public function update_trangthai($ma, $tentrangthai){
		$this->db->where('PK_iMaTrangThai',$ma);
		$this->db->update('trangthai',$tentrangthai);
		return $this->db->affected_rows();
	}

	// Xoá trạng thái
	public function delete_trangthai($ma)
	{
		$this->db->where('PK_iMaTrangThai',$ma);
		$this->db->delete('trangthai');
		return $this->db->affected_rows();
	}

	public function checkStatus($status)
	{
		$this->db->where('sTenTrangThai', $status);
		return $this->db->get('trangthai')->num_rows();
	}
}
