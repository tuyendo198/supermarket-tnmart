<?php

class Mnhaphang extends CI_Model
{
	// Lấy ra chi tiết từng phiếu nhập
	public function get_chitietphieunhap($maphieu){
		$this->db->where('PK_sMaPN', $maphieu);
		$this->db->select('phieunhap.*, nhacungcap.sTenNCC, nguoidung.sTenNguoiDung');
		$this->db->join('taikhoan', 'phieunhap.FK_iMaTaiKhoan = taikhoan.PK_iMaTaiKhoan');
		$this->db->join('nguoidung', 'nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		$this->db->join('nhacungcap', 'nhacungcap.PK_sMaNCC = phieunhap.FK_sMaNCC');
		$phieunhap = $this->db->get('phieunhap')->row_array();

		$this->db->where('FK_sMaPN',$phieunhap['PK_sMaPN']);
		$this->db->select('chitietphieunhap.*, sanpham.sTenSP, sanpham.fGiaSP');
		$this->db->join('sanpham', 'sanpham.PK_sMaSP = chitietphieunhap.FK_sMaSP');
		$chitietpn = $this->db->get('chitietphieunhap')->result_array();

		if (!empty($chitietpn)) {
			$phieunhap['chitiet'] = $chitietpn;
		}

		return $phieunhap;
	}
	// Lấy ra người dùng có quyền khác khách hàng
	public function get_dsnhanvien(){
		$this->db->where('FK_iMaQuyen !=', 2);
		$this->db->join('taikhoan', 'taikhoan.FK_sMaND = nguoidung.PK_sMaND');
		return $this->db->get('nguoidung')->result_array();
	}
	// Lấy ra danh sách nhà cung cấp
	public function get_nhacungcap(){
		return $this->db->get('nhacungcap')->result_array();
	}
	// Lấy ra mã sản phẩm max
	public function get_masp_max(){
		$this->db->select_max('PK_sMaSP');
		return $this->db->get('sanpham')->row_array()['PK_sMaSP'];
	}
	// Lấy ra mã phiếu nhập max
	public function get_maphieunhap_max(){
		$this->db->select_max('PK_sMaPN');
		return $this->db->get('phieunhap')->row_array()['PK_sMaPN'];
	}
	// Lấy ra tất cả các sản phẩm
	public function get_sanpham(){
		return $this->db->get('sanpham')->result_array();
	}

	// Insert phiếu nhập
	public function insert_ctphieunhap($pn, $chitiet){
		try {
			$this->db->trans_start();
			$this->db->insert('phieunhap', $pn);
			$row = $this->db->affected_rows();
			$this->db->insert_batch('chitietphieunhap', $chitiet);
			$row += $this->db->affected_rows();
		}
		catch (Exception $e){
			$row = 0;
		}
		$this->db->trans_complete();
		return $row;
	}

	// Update phiếu nhập
	public function update_phieunhap($mapn, $thongtin, $ctphieu){
		$this->db->trans_start();
		try {
			$this->db->where('PK_sMaPN', $mapn);
			$this->db->update('phieunhap', $thongtin);
			$row = $this->db->affected_rows();
			$this->db->where('FK_sMaPN', $mapn);
			$this->db->delete('chitietphieunhap');
			$this->db->insert_batch('chitietphieunhap', $ctphieu);
			$row += $this->db->affected_rows();
		}
		catch (Exception $e){
			$row = 0;
		}
		$this->db->trans_complete();
		return $row;
	}

	public function update_giabanmoi($arrUdtGiaBan){
		$this->db->update_batch('sanpham', $arrUdtGiaBan, 'PK_sMaSP');
		return $this->db->affected_rows();
	}
}
