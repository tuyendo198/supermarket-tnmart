<?php

class Clienhe extends CI_Controller
{
	public $Mlienhe;
	public function __construct() {
		parent::__construct();
		$this->load->model('Mlienhe', 'Mlienhe');
		$this->Mlienhe = new Mlienhe();
	}

	public function index() {
		$data = array();
		$temp['data']     = $data;
		$temp['template'] = 'layout_frontend/Vlienhe';
		$this->load->view('layout_frontend/Vlayout',$temp);
	}
}
