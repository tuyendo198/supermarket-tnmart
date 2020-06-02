<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Cnhomsanpham extends CI_Controller {
	public $Mnhomsanpham;
	public function __construct() {
		parent::__construct();
		$this->load->model('Mnhomsanpham', 'Mnhomsanpham');
		$this->Mnhomsanpham 	= new Mnhomsanpham();
	}

	public function index() {
		if($this->input->get('ma')){
			$manhomsp 			= $this->input->get('ma');
		}
		$data['thongTinNhomSP'] = $this->Mnhomsanpham->getInfoNhomSp($manhomsp);
		$data['list_product'] 	= $this->Mnhomsanpham->getProductByCategory($manhomsp);
		$temp['data']     = $data;
		$temp['template'] = 'layout_frontend/Vnhomsanpham';
		$this->load->view('layout_frontend/Vlayout',$temp);
	}
}
