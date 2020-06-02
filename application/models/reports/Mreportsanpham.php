<?php
/**
 * Created by Tuyên Đỗ Thị
 * Date: 05/04/2020
 * Time: 03:22 PM
 */

class Mreportsanpham extends CI_Model
{
	public function get_rangeyear()
	{
		$this->db->distinct();
		$this->db->select('YEAR(`dNgaynhap`) as nam');
		$this->db->order_by('nam', 'asc');
		return $this->db->get('phieunhap')->result_array();
	}

	public function get_sanpham($year,$month,$sanpham)
	{
		$ngay = '';
		if (!empty($year)) {
			$ngay = $year;
		}
		if (!empty($month)) {
			if ($month < 10) {
				$month = '0'.$month;
			}
			$ngay = '-'.$month.'-';
		}
		if (!empty($sanpham)) {
			$this->db->like('sTenSP', $sanpham);
		}
		$this->db->select('PK_sMaSP, sTenSP, fGiaSP, sDonViTinh');
		$this->db->order_by('fGiaSP', 'ASC');
		$listsp = $this->db->get('sanpham')->result_array();
		foreach ($listsp as $k => $v) {
			$ttNhap = $this->getSoLuongNhap($v['PK_sMaSP'], $ngay);
			$listsp[$k]['soLuongNhap'] = $ttNhap['soLuongNhap'];
			$listsp[$k]['maxGiaNhap'] = $ttNhap['maxGiaNhap'];
			$listsp[$k]['soLuongBan'] = $this->getSoLuongBan($v['PK_sMaSP'], $ngay)['soLuongBan'];
			$listsp[$k]['soLuongHuy'] = $this->getSoLuongHuy($v['PK_sMaSP'], $ngay)['soLuongHuy'];
			if (empty($listsp[$k]['soLuongNhap'])){
				$listsp[$k]['soLuongNhap'] = 0;
			}
			if (empty($listsp[$k]['soLuongBan'])){
				$listsp[$k]['soLuongBan'] = 0;
			}
			if (empty($listsp[$k]['soLuongHuy'])){
				$listsp[$k]['soLuongHuy'] = 0;
			}
			$listsp[$k]['soLuongCon'] = $this->getSoLuongCon($v['PK_sMaSP']);
		}
		return $listsp;
	}

	public function getSoLuongNhap($masp, $ngay)
	{
		if (!empty($ngay)) {
			$this->db->like('dNgaynhap', $ngay);
		}
		$this->db->where('FK_sMaSP', $masp);
		$this->db->select('sum(iSoLuongNhap) as soLuongNhap, max(fDonGiaNhap) as maxGiaNhap');
		$this->db->join('chitietphieunhap', 'chitietphieunhap.FK_sMaPN = phieunhap.PK_sMaPN');
		$this->db->group_by('FK_sMaSP');
		return $this->db->get('phieunhap')->row_array();
	}

	public function getSoLuongBan($masp, $ngay)
	{
		if (!empty($ngay)) {
			$this->db->like('dNgayLap', $ngay);
		}
		$this->db->where('FK_sMaSP', $masp);
		$this->db->where_not_in('FK_iMaTrangThai', [1, 5]);
		$this->db->select('sum(iSoLuong) as soLuongBan');
		$this->db->join('chitietdonhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang');
		$this->db->group_by('FK_sMaSP');
		return $this->db->get('donhang')->row_array();
	}

	public function getSoLuongHuy($masp, $ngay)
	{
		if (!empty($ngay)) {
			$this->db->like('dNgayHuySP', $ngay);
		}
		$this->db->where('FK_sMaSP', $masp);
		$this->db->select('sum(iSoLuongHuy) as soLuongHuy');
		$this->db->group_by('FK_sMaSP');
		return $this->db->get('huysanpham')->row_array();
	}

	public function getSoLuongCon($masp)
	{
		$this->db->where('FK_sMaSP', $masp);
		$this->db->select('FK_sMaSP, sum(iSoLuongNhap) as soluong');
		$this->db->group_by('FK_sMaSP');
		$spNhap = $this->db->get('chitietphieunhap')->row_array();

		if (!empty($spNhap)) {
			$soluongcon = $spNhap['soluong'];
		}
		else{
			$soluongcon = 0;
		}

		$this->db->where('FK_sMaSP', $masp);
		$this->db->where_not_in('FK_iMaTrangThai', [1, 5]);
		$this->db->select('FK_sMaSP, sum(iSoLuong) as soluong');
		$this->db->join('donhang', 'chitietdonhang.FK_sMaDonHang = donhang.PK_sMaDonHang');
		$this->db->group_by('FK_sMaSP');
		$spXuat = $this->db->get('chitietdonhang')->row_array();
		if (!empty($spXuat)) {
			$soluongcon = $soluongcon - $spXuat['soluong'];
		}

		$this->db->where('FK_sMaSP', $masp);
		$this->db->select('FK_sMaSP, sum(iSoLuongHuy) as soluong');
		$this->db->group_by('FK_sMaSP');
		$spHuy = $this->db->get('huysanpham')->row_array();
		if (!empty($spHuy)) {
			$soluongcon = $soluongcon - $spHuy['soluong'];
		}
		if ($soluongcon < 0) {
			$soluongcon = 0;
		}
		return $soluongcon;
	}
}