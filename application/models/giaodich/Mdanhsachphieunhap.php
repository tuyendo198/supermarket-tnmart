<?php

class Mdanhsachphieunhap extends CI_Model
{
	// Lấy ra danh sách tất cả phiếu nhập
	public function get_mathangdanhap(){
		$this->db->select('phieunhap.*, nhacungcap.sTenNCC, nguoidung.sTenNguoiDung');
		$this->db->join('taikhoan', 'phieunhap.FK_iMaTaiKhoan = taikhoan.PK_iMaTaiKhoan');
		$this->db->join('nguoidung', 'nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		$this->db->join('nhacungcap', 'nhacungcap.PK_sMaNCC = phieunhap.FK_sMaNCC');
		$this->db->order_by('PK_sMaPN', 'DESC');
		$phieunhap = $this->db->get('phieunhap')->result_array();
		return $phieunhap;
	}

	// Xoá phiếu nhập
	public function del_phieu($maphieu){
		$this->db->trans_start();
		try {
			$this->db->where('FK_sMaPN', $maphieu);
			$this->db->delete('chitietphieunhap');
			$row = $this->db->affected_rows();
			$this->db->where('PK_sMaPN', $maphieu);
			$this->db->delete('phieunhap');
			$row += $this->db->affected_rows();
		}
		catch (Exception $e){
			$row = 0;
		}
		$this->db->trans_complete();
		return $row;
	}
}
?>
