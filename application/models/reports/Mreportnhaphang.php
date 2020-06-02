<?php
/**
 * Created by Tuyên Đỗ Thị
 * Date: 30/03/2020
 * Time: 10:55 AM
 */

class Mreportnhaphang extends CI_Model
{
	// Lấy ra danh sách tất cả phiếu nhập
	public function get_phieunhap($ngaynhap,$nhacc,$sanpham,$nguoinhap){
		if (!empty($ngaynhap)){
			$this->db->where('dNgaynhap', $ngaynhap);
		}
		if (!empty($nhacc)){
			$this->db->where('FK_sMaNCC', $nhacc);
		}
		if (!empty($sanpham)){
			$this->db->where('chitietphieunhap.FK_sMaSP', $sanpham);
		}
		if (!empty($nguoinhap)){
			$this->db->like('nguoidung.sTenNguoiDung', $nguoinhap);
		}
		$this->db->select('phieunhap.*, nhacungcap.sTenNCC, nguoidung.sTenNguoiDung');
		$this->db->join('chitietphieunhap', 'chitietphieunhap.FK_sMaPN = phieunhap.PK_sMaPN');
		$this->db->join('taikhoan', 'phieunhap.FK_iMaTaiKhoan = taikhoan.PK_iMaTaiKhoan');
		$this->db->join('nguoidung', 'nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		$this->db->join('nhacungcap', 'nhacungcap.PK_sMaNCC = phieunhap.FK_sMaNCC');
		$this->db->group_by('phieunhap.PK_sMaPN');
		$this->db->order_by('dNgaynhap', 'DESC');
		$phieunhap = $this->db->get('phieunhap')->result_array();
		foreach ($phieunhap as $k => $v) {
			$this->db->where('FK_sMaPN', $v['PK_sMaPN']);
			$this->db->select('sum(iSoLuongNhap*fDonGiaNhap) as tongtien');
			$this->db->group_by('FK_sMaPN');
			$phieunhap[$k]['tongtien'] = $this->db->get('chitietphieunhap')->row_array()['tongtien'];
		}
		return $phieunhap;
	}

	public function get_nhacungcap()
	{
		return $this->db->get('nhacungcap')->result_array();
	}

	public function get_sanpham()
	{
		$this->db->select('PK_sMaSP, sTenSP');
		return $this->db->get('sanpham')->result_array();
	}
}
