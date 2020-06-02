<?php
/**
 * Created by Tuyên Đỗ Thị
 * Date: 03/04/2020
 * Time: 2:48 PM
 */

class Chuysanpham extends MY_Controller
{
	public $Mhuysanpham;
	public function __construct() {
		parent::__construct();
		$this->load->model('sanpham/Mhuysanpham', 'Mhuysanpham');
		$this->Mhuysanpham = new Mhuysanpham();
	}

	public function index()
	{
		if ($this->input->post('huysp')) {
			$this->huySanPham();
		}
		if ($this->input->post('btnHuySP')) {
			$this->huyNhieuSanPham();
		}
		if ($this->input->get('tab')) {
			$tab = $this->input->get('tab');
		}
		else{
			$tab = 'tab1';
		}
		$data  = array(
			'listspsaphethan'	=> $this->Mhuysanpham->get_listspsaphethan(),
			'listspdahuy'		=> $this->Mhuysanpham->get_sanphamdahuy(),
			'tab'				=> $tab
		);
		$temp['data'] 			= $data;
		$temp['template'] 		= 'sanpham/Vhuysanpham';
		$this->load->view('layout_backend/Vlayout', $temp);
	}

	public function huySanPham()
	{
		$chitietpn = $this->input->post('huysp');
		$af_row = $this->processDestroy($chitietpn);
		
		if($af_row > 0){
			setMessages('success','','Huỷ sản phẩm thành công!');
		}
		else{
			setMessages('error','','Huỷ sản phẩm không thành công!');
		}
		return redirect(base_url().'huysanpham?tab=tab2');
	}

	public function huyNhieuSanPham()
	{
		$listCTPN = $this->input->post('maChiTietPN');
		if (empty($listCTPN)) {
			setMessages('warning','','Vui lòng chọn sản phẩm muốn huỷ!');
			return redirect(base_url().'huysanpham?tab=tab1');
		}

		$af_row = 0;
		foreach ($listCTPN as $k => $machitiet) {
			$af_row += $this->processDestroy($machitiet);
		}

		if($af_row > 0 && $af_row == count($listCTPN)){
			setMessages('success','','Huỷ sản phẩm thành công!');
		}
		else{
			setMessages('error','','Có sản phẩm chưa được huỷ. Vui lòng kiểm tra lại!');
		}
		return redirect(base_url().'huysanpham?tab=tab2');
	}

	public function processDestroy($chitietpn)
	{
		$session = getSession();
		$chitietpn = explode('|', $chitietpn);
		$mapn = $chitietpn[0];
		$masp = $chitietpn[1];

		$thongtinnhap = $this->Mhuysanpham->get_thongtinnhap($mapn, $masp);

		$arrHuy = array(
			'dNgaySanXuat' 	=> $thongtinnhap['dNgaySanXuat'],
			'dHanSuDung' 	=> $thongtinnhap['dHanSuDung'],
			'dNgayHuySP' 	=> date('Y-m-d'),
			'iSoLuongHuy' 	=> $thongtinnhap['iSoLuongNhap'],
			'sNguoiHuy' 	=> $session['tentaikhoan'],
			'FK_sMaSP' 		=> $masp,
		);

		$af_row = $this->Mhuysanpham->insert_huy($arrHuy);
		return $af_row;
	}
}
