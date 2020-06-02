<?php

class Mlogin extends CI_Model 
{
	public function dangnhap($taikhoan,$matkhau){
		$this->db->where('sTenTaiKhoan',$taikhoan);
		$this->db->where('sMatKhau',sha1($matkhau));
		$this->db->select('taikhoan.PK_iMaTaiKhoan, sTenTaiKhoan, FK_sMaND, FK_iMaQuyen, sTenNguoiDung, sAnhDaiDien, sTrangThai');
		$this->db->join('nguoidung','nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		return $this->db->get('taikhoan')->row_array();
	}
}
?>
