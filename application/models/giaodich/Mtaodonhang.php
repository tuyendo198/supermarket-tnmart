<?php

class Mtaodonhang extends CI_Model
{
	public function getListProduct()
	{
		$this->db->where('PK_sMaSP IN (SELECT DISTINCT FK_sMaSP FROM chitietphieunhap)', NULL, false);
		$this->db->select('PK_sMaSP, sTenSP');
		return $this->db->get('sanpham')->result_array();
	}

	public function getChiTietDonHang($mdh='')
	{
		if (empty($mdh)){
			return array();
		}
		$this->db->where('FK_sMaDonHang', $mdh);
		$this->db->join('sanpham', 'sanpham.PK_sMaSP = chitietdonhang.FK_sMaSP');
		return $this->db->get('chitietdonhang')->result_array();
	}

	public function getInfoProduct($masp)
	{
		$this->db->select('PK_sMaSP, sTenSP, fGiaSP, sDonViTinh');
		$this->db->where('PK_sMaSP', $masp);
		return $this->db->get('sanpham')->row_array();
	}

	public function get_madonhang_max(){
		$this->db->select_max('PK_sMaDonHang');
		return $this->db->get('donhang')->row_array()['PK_sMaDonHang'];
	}

	public function createDonHang()
	{
		$mamax = $this->get_madonhang_max();
		$madonhang = generatePrimary($mamax);
		$arrInsDonHang = array(
			'PK_sMaDonHang' 	=> $madonhang,
			'dNgayLap' 			=> date('Y-m-d'),
			'sThanhToan' 		=> 'Đã thanh toán',
			'FK_iMaTrangThai' 	=> 4,
			'FK_iMaHinhThuc'	=> 1,
			'FK_iMaThongTinGH'	=> 1
		);
		$this->db->insert('donhang', $arrInsDonHang);
		return $madonhang;
	}

	public function saveChiTietDonHang($data)
	{
		$this->db->insert_batch('chitietdonhang', $data);
		return $this->db->affected_rows();
	}
}
