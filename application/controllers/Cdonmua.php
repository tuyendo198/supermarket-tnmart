<?php

class Cdonmua extends MY_Controller_KH
{
	public $Mdonmua;
	public function __construct() {
		parent::__construct();
		$this->load->model('Mdonmua', 'Mdonmua');
		$this->Mdonmua = new Mdonmua();
	}
	public function index(){
		$session				= getSession('info_khachhang');
		if($this->input->get('mdh')){
			$madh = $this->input->get('mdh');
			$type = $this->input->get('type');
			$data = array(
				'type' 			=> $type,
				'thongTinDon' 	=> $this->Mdonmua->get_chitietdonhang($madh),
				'maHD'			=> $madh
			);
			$this->parser->parse('giaodich/Vchitietdonhang', $data);
		}
		else{
			$data = array(
				'info_canhan' 		=> $this->Mdonmua->get_thongtintaikhoan($session['mataikhoan']),
				'getListTrangThai' 	=> $this->Mdonmua->get_listtrangthai(),
				'listDonHang'		=> $this->Mdonmua->get_donhang($session['mataikhoan'])
			);

			$temp['data']      	 	= $data;
			$temp['template']   	= 'layout_frontend/Vdonmua';
			$this->load->view('layout_frontend/Vlayout',$temp);
		}
	}
}
