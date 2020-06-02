<?php
/**
 * Created by Tuyên Đỗ Thị
 * Date: 09/04/2020
 * Time: 10:55 PM
 */

class Mreportdoanhthu extends CI_Model
{
	public function get_tongdoanhthu($date)
	{
		$this->db->like('dNgayLap', $date);
		$this->db->where_not_in('FK_iMaTrangThai', [1, 5]);
		$this->db->select('sum(iSoLuong*fDonGia) as tongthu');
		$this->db->join('chitietdonhang','donhang.PK_sMaDonHang = chitietdonhang.FK_sMaDonHang');
		return $this->db->get('donhang')->row_array()['tongthu'];
	}

	public function get_doanhthunhomsp($ngay)
	{
		$this->db->where('dNgayLap', $ngay);
		$this->db->where_not_in('FK_iMaTrangThai', [1, 5]);
		$this->db->select('PK_sMaNhomSP, sTenNhomSP, sum(iSoLuong*fDonGia) as tongthunhom');
		$this->db->join('chitietdonhang','donhang.PK_sMaDonHang = chitietdonhang.FK_sMaDonHang');
		$this->db->join('sanpham','chitietdonhang.FK_sMaSP = sanpham.PK_sMaSP');
		$this->db->join('nhomsanpham','sanpham.FK_sMaNhomSP = nhomsanpham.PK_sMaNhomSP');
		$this->db->group_by('FK_sMaNhomSP');
		return $this->db->get('donhang')->result_array();
	}

	public function get_nhomsanpham()
	{
		$this->db->where('sTrangThai', 'show');
		return $this->db->get('nhomsanpham')->result_array();
	}

	public function get_rangeyear()
	{
		$this->db->distinct();
		$this->db->select('YEAR(`dNgaynhap`) as nam');
		$this->db->order_by('nam', 'asc');
		return $this->db->get('phieunhap')->result_array();
	}

	public function get_tongtiennhaphang($date)
	{
		$this->db->like('dNgaynhap', $date);
		$this->db->select('sum(iSoLuongNhap*fDonGiaNhap) as tongnhap');
		$this->db->join('chitietphieunhap','phieunhap.PK_sMaPN = chitietphieunhap.FK_sMaPN');
		return $this->db->get('phieunhap')->row_array()['tongnhap'];
	}

	public function get_tongtienhuyhang($date)
	{
		$this->db->like('dNgayHuySP', $date);
		$this->db->where('huysanpham.FK_sMaSP = chitietphieunhap.FK_sMaSP');
		$this->db->where('huysanpham.dNgaySanXuat = chitietphieunhap.dNgaySanXuat');
		$this->db->where('huysanpham.dHanSuDung = chitietphieunhap.dHanSuDung');
		$this->db->select('sum(iSoLuongHuy*fDonGiaNhap) as tonghuy');
		return $this->db->get('huysanpham, chitietphieunhap')->row_array()['tonghuy'];
	}

	public function get_doanhthutungngay($thang)
	{
		$this->db->like('dNgayLap', $thang);
		$this->db->where_not_in('FK_iMaTrangThai', [1, 5]);
		$this->db->select('dNgayLap, sum(iSoLuong*fDonGia) as tongthungay');
		$this->db->join('chitietdonhang','donhang.PK_sMaDonHang = chitietdonhang.FK_sMaDonHang');
		$this->db->join('sanpham','chitietdonhang.FK_sMaSP = sanpham.PK_sMaSP');
		$this->db->join('nhomsanpham','sanpham.FK_sMaNhomSP = nhomsanpham.PK_sMaNhomSP');
		$this->db->group_by('dNgayLap');
		$listDoanhThu = $this->db->get('donhang')->result_array();
		$newListDoanhThu = array();
		foreach ($listDoanhThu as $k => $v) {
			$newListDoanhThu[$v['dNgayLap']] = $v['tongthungay'];
		}
		$listReturn = array();
		$dayofmonth = $this->dayofmonth($thang);
		foreach ($dayofmonth as $k => $v) {
			if (!array_key_exists($v, $newListDoanhThu)){
				$listReturn[$v] = 0;
			}
			else{
				$listReturn[$v] = $newListDoanhThu[$v];
			}
		}
		return $listReturn;
	}

	public function get_doanhthutungthang($nam)
	{
		$this->db->like('dNgayLap', $nam);
		$this->db->where_not_in('FK_iMaTrangThai', [1, 5]);
		$this->db->select('MONTH(dNgayLap) as thang, sum(iSoLuong*fDonGia) as tongthuthang');
		$this->db->join('chitietdonhang','donhang.PK_sMaDonHang = chitietdonhang.FK_sMaDonHang');
		$this->db->join('sanpham','chitietdonhang.FK_sMaSP = sanpham.PK_sMaSP');
		$this->db->join('nhomsanpham','sanpham.FK_sMaNhomSP = nhomsanpham.PK_sMaNhomSP');
		$this->db->group_by('thang');
		$listDoanhThu = $this->db->get('donhang')->result_array();
		$newListDoanhThu = array();
		foreach ($listDoanhThu as $k => $v) {
			$newListDoanhThu[$v['thang']] = $v['tongthuthang'];
		}
		$listReturn = array();
		for ($i = 1; $i < 13; $i++) {
			if (!array_key_exists($i, $newListDoanhThu)){
				$listReturn[$i] = 0;
			}
			else{
				$listReturn[$i] = $newListDoanhThu[$i];
			}
		}
		return $listReturn;
	}

	public function dayofmonth($thang)
	{
		$list=array();
		$month = explode('-', $thang)[1];
		$year = explode('-', $thang)[0];

		for($d=1; $d<=31; $d++)
		{
		    $time=mktime(12, 0, 0, $month, $d, $year);          
		    if (date('m', $time)==$month){
		        $list[] = date('Y-m-d', $time);
		    }
		}
		return $list;
	}
}