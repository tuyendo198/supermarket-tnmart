<?php

class Mdathang extends CI_Model
{
	public function getProfile($mauser)
	{
		$this->db->where('PK_sMaND', $mauser);
		return $this->db->get('nguoidung')->row_array();
	}

	public function getThongTinGiaoHang($mataikhoan)
	{
		$this->db->where('FK_iMaTaiKhoan', $mataikhoan);
		$this->db->where('iDoUuTien IS NOT NULL');
		$this->db->order_by('iDoUuTien', 'desc');
		return $this->db->get('thongtingiaohang')->result_array();
	}

	public function get_product_in_cart($mataikhoan)
	{
		$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $mataikhoan);
		$this->db->where('FK_iMaTrangThai', 1); //trạng thái đang ở giỏ hàng của người dùng
		$this->db->join('chitietdonhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang');
		$this->db->join('sanpham', 'sanpham.PK_sMaSP = chitietdonhang.FK_sMaSP');
		$this->db->join('thongtingiaohang', 'thongtingiaohang.PK_iMaThongTinGH = donhang.FK_iMaThongTinGH', 'left');
		return $this->db->get('donhang')->result_array();
	}

	public function getHinhThucThanhToan()
	{
		return $this->db->get('hinhthucthanhtoan')->result_array();
	}

	public function checkGia($matk)
	{
		$this->db->where('thongtingiaohang.FK_iMaTaiKhoan', $matk);
		$this->db->where('FK_iMaTrangThai', 1); //trạng thái đang ở giỏ hàng của người dùng
		$this->db->where('fDonGia != ', 0);
		$this->db->where('sanpham.fGiaSP != chitietdonhang.fDonGia');
		$this->db->join('thongtingiaohang', 'thongtingiaohang.PK_iMaThongTinGH = donhang.FK_iMaThongTinGH', 'inner');
		$this->db->join('chitietdonhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang');
		$this->db->join('sanpham', 'sanpham.PK_sMaSP = chitietdonhang.FK_sMaSP');
		$arrSP = $this->db->get('donhang')->result_array();
		if (!empty($arrSP)){
			foreach ($arrSP as $key => $value) {
				$this->db->where('FK_sMaDonHang', $value['FK_sMaDonHang']);
				$this->db->where('FK_sMaSP', $value['FK_sMaSP']);
				$this->db->update('chitietdonhang', array('fDonGia' => $value['fGiaSP']));
			}
		}
	}

	public function getTongTienDonHang($maDonHang)
	{
		$this->db->where('PK_sMaDonHang', $maDonHang);
		$this->db->select('sum(iSoLuong*fDonGia) as tongtien');
		$this->db->join('chitietdonhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang');
		$this->db->group_by('FK_sMaDonHang');
		return $this->db->get('donhang')->row_array();
	}

	public function updateDonHang($maDonHang, $data)
	{
		$this->db->where('PK_sMaDonHang', $maDonHang);
		$this->db->update('donhang', $data);
		return $this->db->affected_rows();
	}
}
