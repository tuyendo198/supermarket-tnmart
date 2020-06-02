<?php
/**
 * Created by Tuyên Đỗ Thị
 * Date: 03/04/2020
 * Time: 2:50 PM
 */

class Mhuysanpham extends CI_Model
{
	// Lấy ra danh sách sản phẩm sắp hoặc đã hết hạn
	public function get_listspsaphethan(){
		$date = date('Y-m-d', strtotime('+3 day'));
		$this->db->where('dHanSuDung <= ', $date);
		$this->db->where_not_in('CONCAT(`FK_sMaSP`,`dNgaySanXuat`,`dHanSuDung`)', '(SELECT CONCAT(`FK_sMaSP`,`dNgaySanXuat`,`dHanSuDung`) FROM `huysanpham`)', false);
		$this->db->select('sanpham.PK_sMaSP, sTenSP, fGiaSP, sDonViTinh, chitietphieunhap.*');
		$this->db->join('sanpham', 'chitietphieunhap.FK_sMaSP = sanpham.PK_sMaSP');
		$this->db->order_by('PK_sMaSP', 'ASC');
		$this->db->order_by('dHanSuDung', 'DESC');
		return $this->db->get('chitietphieunhap')->result_array();
	}

	public function get_sanphamdahuy()
	{
		$this->db->where('huysanpham.FK_sMaSP = chitietphieunhap.FK_sMaSP');
		$this->db->where('huysanpham.dNgaySanXuat = chitietphieunhap.dNgaySanXuat');
		$this->db->where('huysanpham.dHanSuDung = chitietphieunhap.dHanSuDung');
		$this->db->select('sanpham.PK_sMaSP, sTenSP, fGiaSP, sDonViTinh, huysanpham.*, chitietphieunhap.fDonGiaNhap');
		$this->db->join('sanpham', 'huysanpham.FK_sMaSP = sanpham.PK_sMaSP');
		$this->db->order_by('dNgayHuySP', 'DESC');
		return $this->db->get('huysanpham, chitietphieunhap')->result_array();
	}

	public function get_thongtinnhap($mapn, $masp)
	{
		$this->db->where('FK_sMaPN', $mapn);
		$this->db->where('FK_sMaSP', $masp);
		return $this->db->get('chitietphieunhap')->row_array();
	}

	public function insert_huy($arrHuy)
	{
		$this->db->insert('huysanpham', $arrHuy);
		return $this->db->affected_rows();
	}
}
