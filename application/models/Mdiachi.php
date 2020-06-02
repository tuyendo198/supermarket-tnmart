<?php

class Mdiachi extends CI_Model
{
	public function getThongTinGiaoHang($mataikhoan)
	{
		$this->db->where('FK_iMaTaiKhoan', $mataikhoan);
		$this->db->order_by('iDoUuTien', 'desc');
		return $this->db->get('thongtingiaohang')->result_array();
	}

	public function getDoUuTienMax($mataikhoan)
	{
		$this->db->where('FK_iMaTaiKhoan', $mataikhoan);
		$this->db->select_max('iDoUuTien');
		return $this->db->get('thongtingiaohang')->row_array()['iDoUuTien'];
	}

	public function addAddress($arrIns)
	{
		$this->db->insert('thongtingiaohang', $arrIns);
		return $this->db->affected_rows();
	}

	public function diaChiUuTien($mattgiaohang, $mataikhoan)
	{
		$maxUuTien = $this->getDoUuTienMax($mataikhoan);
		$this->db->where('PK_iMaThongTinGH', $mattgiaohang);
		$this->db->where('FK_iMaTaiKhoan', $mataikhoan);
		$this->db->update('thongtingiaohang', array('iDoUuTien' => ($maxUuTien + 1)));
		return $this->db->affected_rows();
		// Update mã thấp nhất về null khi tăng ưu tiên cho 1 thg khác
		// $this->db->trans_start();
		// $maxUuTien = $this->getDoUuTienMax($mataikhoan);
		// try {
		// 	$this->db->where('PK_iMaThongTinGH', $mattgiaohang);
		// 	$this->db->where('FK_imataikhoan', $mataikhoan);
		// 	$this->db->update('thongtingiaohang', array('iDoUuTien' => ($maxUuTien + 1)));
		// 	$row = $this->db->affected_rows();
		// 	$listDiaChi = $this->getThongTinGiaoHang($mataikhoan);
		// 	if (count($listDiaChi) > 4){
		// 		$this->db->where('FK_imataikhoan', $mataikhoan);
		// 		$this->db->where('iDoUuTien != ', NULL);
		// 		$this->db->order_by('iDoUuTien', 'asc');
		// 		$maTTGH_Old = $this->db->get('thongtingiaohang')->row_array()['PK_iMaThongTinGH'];
		// 		$this->db->where('PK_iMaThongTinGH', $maTTGH_Old);
		// 		$this->db->update('thongtingiaohang', array('iDoUuTien' => NULL));
		// 		$row += $this->db->affected_rows();
		// 	}
		// }
		// catch (Exception $e) {
		// 	$row = 0;
		// }
		// $this->db->trans_complete();
		// return $row;
	}
}
