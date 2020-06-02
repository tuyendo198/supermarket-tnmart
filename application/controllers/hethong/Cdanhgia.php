<?php

class Cdanhgia extends MY_Controller
{
	public $Mdanhgia;
	public function __construct() {
		parent::__construct();
		$this->load->model('hethong/Mdanhgia', 'Mdanhgia');
		$this->Mdanhgia 		= new Mdanhgia();
	}

	public function index(){
		$data = array(
			'danhgia'		=> $this->Mdanhgia->get_listdanhgia()
		);

		$temp['data']     		= $data;
		$temp['template'] 		= 'hethong/Vdanhgia';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
}
