<?php

class Mchangepass extends CI_Model
{
	public function getProductByCategory($manhomsp)
	{
		$this->db->where('FK_sMaNhomSP', $manhomsp);
		return $this->db->get('sanpham')->result_array();
	}

	// Lấy sản phẩm theo danh mục
	public function get_listProduct()
	{
		$list_cate = $this->db->get('nhomsanpham')->result_array();
		foreach ($list_cate as $k => $v) {
			$list_cate[$k]['sp'] = $this->getProductByCategory($v['PK_sMaNhomSP']);
		}
		return $list_cate;

	}
	// Lấy ra thông tin tài khoản
	public function get_thongtintaikhoan($mataikhoan){
		$this->db->where('PK_iMaTaiKhoan', $mataikhoan);
		$this->db->select('taikhoan.*, nguoidung.*');
		$this->db->join('nguoidung', 'nguoidung.PK_sMaND = taikhoan.FK_sMaND');
		return $this->db->get('taikhoan')->row_array();
	}

	public function get_taikhoan_info($mataikhoan){
		$this->db->where('PK_iMaTaiKhoan', $mataikhoan);
		return $this->db->get('taikhoan')->row_array();
	}

	public function update_matkhau($mataikhoan, $mk){
		$this->db->where('PK_iMaTaiKhoan', $mataikhoan);
		$this->db->update('taikhoan', array('sMatKhau' => $mk));
		return $this->db->affected_rows();
	}
}
