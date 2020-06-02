<?php

class Cgiohang extends MY_Controller_KH
{
	public $Mgiohang;
	public function __construct() {
		parent::__construct();
		$this->load->model('Mgiohang', 'Mgiohang');
		$this->Mgiohang = new Mgiohang();
	}
	public function index(){
		$session				= getSession('info_khachhang');
		$action 				= $this->input->post('action');
		switch ($action) {
			case 'addToCart':
				$this->addToCart();
				break;
			case 'removeFromCart':
				$this->removeFromCart();
				break;
			case 'changeAmount':
				$this->changeAmount();
				break;
		}
		$this->Mgiohang->checkGia($session['mataikhoan']);

		$data = array(
			'info_canhan' 		=> $this->Mgiohang->get_thongtintaikhoan($session['mataikhoan']),
			'product_in_cart' 	=> $this->Mgiohang->get_product_in_cart($session['mataikhoan'])
		);

		$temp['data']      	 	= $data;
		$temp['template']   	= 'layout_frontend/Vgiohang';
		$this->load->view('layout_frontend/Vlayout',$temp);
	}

	public function addToCart()
	{
		$session	= getSession('info_khachhang');
		$maSp 		= $this->input->post('maSp');
		$soLuong 	= $this->input->post('soLuong');
		$result 	= $this->Mgiohang->addToCart($maSp, $soLuong, $session['mataikhoan']);
		if($result > 0){
			echo json_encode(countCart());
		}
		else{
			echo json_encode(false);
		}
		exit();
	}

	public function removeFromCart()
	{
		$session	= getSession('info_khachhang');
		$maSp 		= $this->input->post('maSp');

		$result 	= $this->Mgiohang->removeFromCart($maSp, $session['mataikhoan']);
		if($result > 0){
			echo json_encode(countCart());
		}
		else{
			echo json_encode(false);
		}
		exit();
	}

	public function changeAmount()
	{
		$session	= getSession('info_khachhang');
		$maSp 		= $this->input->post('maSp');
		$soLuong 	= $this->input->post('soLuong');

		$result 	= $this->Mgiohang->changeAmount($maSp, $session['mataikhoan'], $soLuong);
		if($result > 0){
			echo json_encode(true);
		}
		else{
			echo json_encode(false);
		}
		exit();
	}
}
