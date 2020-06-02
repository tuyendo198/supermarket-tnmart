<?php

class Mdanhgia extends CI_Model
{
	public function get_listdanhgia(){
		$this->db->select('PK_sMaSP, sTenSP, fGiaSP, sDonViTinh');
		$arrSP = $this->db->get('sanpham')->result_array();
		foreach ($arrSP as $k => $v) {
			$arrSP[$k]['rate'] = $this->getRating($v['PK_sMaSP']);
		}
		return $arrSP;
	}

	public function getRating($masp){
		$this->db->where('FK_sMaSP', $masp);
		$listRate = $this->db->get('danhgia')->result_array();
		$soluong = count($listRate); //đếm số lượng trước khi bổ sung phần tử mảng
		$tongRate = 0;
		foreach ($listRate as $k => $v) {
			$tongRate += $v['iDiemSo'];
		}
		if ($soluong == 0){
			$rsRate['trungbinh'] = $tongRate;
			$rsRate['soluong'] = $soluong;
		}
		else{
			$rsRate['trungbinh'] = $tongRate / $soluong;
			$rsRate['soluong'] = $soluong;
		}
		return $rsRate;
	}
}
