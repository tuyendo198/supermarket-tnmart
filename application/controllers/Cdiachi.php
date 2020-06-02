<?php

class Cdiachi extends MY_Controller_KH
{
	public $Mdiachi;
	public function __construct() {
		parent::__construct();
		$this->load->model('Mdiachi', 'Mdiachi');
		$this->Mdiachi = new Mdiachi();
	}

	public function index(){
		$session = getSession('info_khachhang');
		$service = $this->input->get('service');

		if ($this->input->post('btnAddAddress')){
			$this->addAddress();
		}

		if ($this->input->post('diaChiUuTien')){
			$this->diaChiUuTien();
		}

		$data = array(
			'thongTinGiaoHang'  => $this->Mdiachi->getThongTinGiaoHang($session['mataikhoan']),
			'service'			=> $service
		);
		$temp['data']      	 	= $data;
		$temp['template']   	= 'layout_frontend/Vdiachi';
		$this->load->view('layout_frontend/Vlayout',$temp);
	}

	public function addAddress(){
		$session	= getSession('info_khachhang');
		$service = $this->input->get('service');
		$doUuTien 	= $this->Mdiachi->getDoUuTienMax($session['mataikhoan']);
		$arrIns = array(
			'sHoTen'			=> $this->input->post('tenNguoiNhan'),
			'sDiaChiNhanHang'	=> $this->input->post('diaChiNhanHang'),
			'sSoDienThoai'		=> $this->input->post('soDienThoai'),
			'iDoUuTien'			=> ($doUuTien + 1),
			'FK_iMaTaiKhoan'	=> $session['mataikhoan']
		);
		$af_row = $this->Mdiachi->addAddress($arrIns);
		$redirect = 'diachigiaohang';
		$mess = 'nhận';
		if (!empty($service)){
			$redirect = $service;
			$mess = 'giao';
		}
		if ($af_row > 0){
			setMessages('success','','Thêm địa chỉ '.$mess.' hàng thành công');
		}
		else{
			setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
		}
		return redirect($redirect);
	}

	public function diaChiUuTien(){
		$session			= getSession('info_khachhang');
		$maTTGiaoHang 		= $this->input->post('diaChiUuTien');
		$af_row = $this->Mdiachi->diaChiUuTien($maTTGiaoHang, $session['mataikhoan']);
		if ($af_row > 0){
			setMessages('success','','Ưu tiên địa chỉ thành công');
		}
		else{
			setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
		}
		return redirect('diachigiaohang');
	}
}
