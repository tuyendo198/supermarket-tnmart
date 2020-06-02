<?php

class Mkhuyenmai extends CI_Model
{
	public function getLoaiKhuyenMai()
	{
		return $this->db->get('khuyenmai')->result_array();
	}

	public function getSpKhuyenMai()
	{
		// $this->db->where('fGiaSP !=', 0);
		$dssp = $this->db->get('sanpham')->result_array();
		$listSP = array();
		foreach ($dssp as $key => $value) {
			$listSP[$value['PK_sMaSP']] = $value;
		}
		return $listSP;
	}

	public function insert_km($arrIns)
	{
		// foreach ($arrIns as $k => $v) {
		// 	$this->db->where('FK_sMaKM', $v['FK_sMaKM']);
		// 	$this->db->where('FK_sMaSP', $v['FK_sMaSP']);
		// 	$row = $this->db->get('khuyenmai_sp')->num_rows();
		// 	if ($row > 0){
		// 		$this->db->where('FK_sMaKM', $v['FK_sMaKM']);
		// 		$this->db->where('FK_sMaSP', $v['FK_sMaSP']);
		// 		$this->db->update
		// 	}
		// }
		// $this->db->insert_batch('khuyenmai_sp', $arrIns);
		// return $this->db->affected_rows();
	}

	// Lấy ra thông tin khuyến mại theo mã
	public function get_khuyenmai_ma($ma){
		$this->db->where('PK_sMaKM', $ma);
		$this->db->select('khuyenmai.*, khuyenmai_sp.*');
		$this->db->join('khuyenmai_sp', 'khuyenmai_sp.FK_sMaKM = khuyenmai.PK_sMaKM');
		return $this->db->get('khuyenmai')->row_array();
	}

	// Sửa khuyến mại
	public function update_km($ma,$thongtin)
	{
		$this->db->where('PK_sMaKM',$ma);
		$this->db->update('khuyenmai',$thongtin);
		return $this->db->affected_rows();
	}

	// Xoá khuyến mại
	public function del_km($makm){
		$this->db->where('FK_sMaKM',$makm);
		$this->db->delete('khuyenmai_sp');
		return $this->db->affected_rows();
	}
	public function getDsKhuyenMai()
	{
		$currentDate = date('Y-m-d');
		$this->db->where('dThoiGianBD <= ', $currentDate);
		$this->db->where('dThoiGianKT >= ', $currentDate);
		$this->db->join('khuyenmai', 'khuyenmai.PK_sMaKM = khuyenmai_sp.FK_sMaKM', 'inner');
		$this->db->join('sanpham', 'khuyenmai_sp.FK_sMaSP = sanpham.PK_sMaSP', 'inner');
		$this->db->order_by('FK_sMaKM, FK_sMaSP', 'asc');
		return $this->db->get('khuyenmai_sp')->result_array();
	}
}
