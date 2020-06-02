<?php

class Choadon extends CI_Controller
{
	public $Mhoadon;

	public function __construct() {
		parent::__construct();
		$this->load->model('giaodich/Mhoadon', 'Mhoadon');
		$this->Mhoadon 			= new Mhoadon();
	}
	public function index() {
		$data = array();
		$temp['data']     		= $data;
		$temp['template'] 		= 'giaodich/Vhoadon';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
}
