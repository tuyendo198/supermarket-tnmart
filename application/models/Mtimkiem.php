<?php

class Mtimkiem extends CI_Model
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

	public function getSearchProduct($text)
	{
		if (empty($text)){
			return [];
		}
		$this->db->like('sTenSP', $text);
		$this->db->order_by('fGiaSP', 'asc');
		$listProduct = $this->db->get('sanpham')->result_array();
		foreach ($listProduct as $k => $v) {
			$listProduct[$k]['rating'] = $this->getRating($v['PK_sMaSP']);
		}
		return $listProduct;
	}
}
