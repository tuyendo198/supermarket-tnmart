<?php

class Mnhomsanpham extends CI_Model
{
	public function getRating($masp){
		$this->db->where('FK_sMaSP', $masp);
		$listRate = $this->db->get('danhgia')->result_array();
		$soluong = count($listRate); //đếm số lượng trước khi bổ sung phần tử mảng
		$listRate['5star'] = 0;
		$listRate['4star'] = 0;
		$listRate['3star'] = 0;
		$listRate['2star'] = 0;
		$listRate['1star'] = 0;
		$tongRate = 0;
		foreach ($listRate as $k => $v) {
			$tongRate += $v['iDiemSo'];
			switch ($v['iDiemSo']) {
				case 5:
					$listRate['5star']++;
					break;
				case 4:
					$listRate['4star']++;
					break;
				case 3:
					$listRate['3star']++;
					break;
				case 2:
					$listRate['2star']++;
					break;
				case 1:
					$listRate['1star']++;
					break;
			}
		}
		if ($soluong == 0){
			$soluong = 1;
		}
		$listRate['trungbinh'] = $tongRate / $soluong;
		$listRate['soluong'] = $soluong;
		return $listRate;
	}

	public function getInfoNhomSp($manhomsp)
	{
		$this->db->where('PK_sMaNhomSP', $manhomsp);
		return $this->db->get('nhomsanpham')->row_array();
	}

	public function getProductByCategory($manhomsp)
	{
		$this->db->where('FK_sMaNhomSP', $manhomsp);
		$this->db->order_by('fGiaSP', 'asc');
		$listProduct = $this->db->get('sanpham')->result_array();
		foreach ($listProduct as $k => $v) {
			$listProduct[$k]['rating'] = $this->getRating($v['PK_sMaSP']);
		}
		return $listProduct;
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

	public function get_chitietsp($masp){
		$this->db->where('sanpham.PK_sMaSP', $masp);
		// $this->db->select('sanpham.*, album.sLink, album.PK_iMaAlbum');
		$arr_sp = $this->db->get('sanpham')->result_array();
		foreach ($arr_sp as $k => $v){
			$this->db->where('FK_sMaSP', $v['PK_sMaSP']);
			$arr_sp[$k]['listAnh'] = $this->db->get('album')->result_array();
		}
		return $arr_sp;
	}
}
