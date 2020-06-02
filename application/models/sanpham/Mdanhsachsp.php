<?php

class Mdanhsachsp extends CI_Model
{
	// Lấy ra danh sách sản phẩm
	public function get_sanpham(){
		$this->db->select('sanpham.*, sTenNhomSP');
		$this->db->join('nhomsanpham', 'nhomsanpham.PK_sMaNhomSP = sanpham.FK_sMaNhomSP');
		$this->db->order_by('PK_sMaSP', 'DESC');
		return $this->db->get('sanpham')->result_array();
	}
	//Lấy ra số lượng còn của sản phẩm
	public function get_soluongcon()
	{
		$this->db->select('FK_sMaSP, sum(iSoLuongNhap) as soluong');
		$this->db->group_by('FK_sMaSP');
		$spNhap = $this->db->get('chitietphieunhap')->result_array();
		$soluongcon = array();
		foreach ($spNhap as $key => $value) {
			$soluongcon[$value['FK_sMaSP']] = $value['soluong'];
		}
		$this->db->where_not_in('FK_iMaTrangThai', [1, 5]);
		$this->db->select('FK_sMaSP, sum(iSoLuong) as soluong');
		$this->db->join('donhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang');
		$this->db->group_by('FK_sMaSP');
		$spXuat = $this->db->get('chitietdonhang')->result_array();
		foreach ($spXuat as $key => $value) {
			if (!isset($soluongcon[$value['FK_sMaSP']])){
				$soluongcon[$value['FK_sMaSP']] = 0;
			}
			$soluongcon[$value['FK_sMaSP']] = $soluongcon[$value['FK_sMaSP']] - $value['soluong'];
		}
		$this->db->select('FK_sMaSP, sum(iSoLuongHuy) as soluong');
		$this->db->group_by('FK_sMaSP');
		$spHuy = $this->db->get('huysanpham')->result_array();
		foreach ($spHuy as $key => $value) {
			if (!isset($soluongcon[$value['FK_sMaSP']])){
				$soluongcon[$value['FK_sMaSP']] = 0;
			}
			$soluongcon[$value['FK_sMaSP']] = $soluongcon[$value['FK_sMaSP']] - $value['soluong'];
		}
		return $soluongcon;
	}
	// Lấy ra danh mục
	public function get_danhmuc(){
		return $this->db->get('nhomsanpham')->result_array();
	}
	// Lấy ra nhà sản xuất
	public function get_nhasx(){
		return $this->db->get('nhasanxuat')->result_array();
	}
	// Lấy ra mã sản phẩm max
	public function get_masp_max(){
		$this->db->select_max('PK_sMaSP');
		return $this->db->get('sanpham')->row_array()['PK_sMaSP'];
	}
	// Thêm sản phẩm
	public function insert_sp($ttsp, $ttanh){
		$this->db->insert('sanpham', $ttsp);
//		$id_sp = $this->db->insert_id();
//		foreach ($ttanh as $k => $v){
//			$ttanh[$k]['FK_sMaSP'] = $id_sp;
//		}
		$this->db->insert_batch('anh', $ttanh);
		return $this->db->affected_rows();
	}
	// Lấy ra link ảnh sản phẩm
	public function get_link_sp($masp){
		$this->db->where('FK_sMaSP', $masp);
		return $this->db->get('anh')->result_array();
	}

	// Insert ảnh chi tiết sản phẩm vào anh
	public function insert_anhsp($thongtin){
		$this->db->insert('anh', $thongtin);
		return $this->db->affected_rows();
	}

	// Lấy ra thông tin sản phẩm
	public function get_tt_sp($masp){
		$this->db->where('PK_sMaSP', $masp);
		return $this->db->get('sanpham')->row_array();
	}

	// Update anh ảnh sản phẩm
	public function update_anh_sp($maAlbum, $arrLink){
		$this->db->where('PK_iMaAnh', $maAlbum);
		$this->db->update('anh', $arrLink);
		return $this->db->affected_rows();
	}

	// Sửa sản phẩm
	public function update_sp($masp, $ttsp){
		$this->db->where('PK_sMaSP',$masp);
		$this->db->update('sanpham',$ttsp);
		$row = $this->db->affected_rows();

		return $row;
	}

	public function getLoaiKhuyenMai()
	{
		return $this->db->get('khuyenmai')->result_array();
	}

	public function checksp($tensp, $masp = '')
	{
		if (!empty($masp)){
			$this->db->where('PK_sMaSP != ', $masp);
		}
		$this->db->where('sTenSP', $tensp);
		return $this->db->get('sanpham')->num_rows();
	}

}
