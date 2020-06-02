<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Ctimkiem extends CI_Controller
{
	public $Mtimkiem;
	public function __construct() {
		parent::__construct();
		$this->load->model('Mtimkiem', 'Mtimkiem');
		$this->Mtimkiem = new Mtimkiem();
	}

	public function index() {
		$text 	= $this->input->get('search');
		if(empty($text)){
			return redirect(base_url());
		}
		$data = array(
			'searchtext'	=> $text,
			'list_product' 	=> $this->Mtimkiem->getSearchProduct($text)
		);
		$temp['data']     = $data;
		$temp['template'] = 'layout_frontend/Vtimkiem';
		$this->load->view('layout_frontend/Vlayout',$temp);
	}
} // End class
