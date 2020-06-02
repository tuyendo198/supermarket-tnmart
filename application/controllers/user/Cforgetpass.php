<?php

class Cforgetpass extends MY_Controller
{
	public $Mforgetpass;

	public function __construct() {
		parent::__construct();
		$this->load->model('user/Mforgetpass', 'Mforgetpass');
		$this->Mforgetpass = new Mforgetpass();
	}
	public function index(){
		if($this->input->post('forgetpass')){
			$this->forget_pass();
		}
		$session 				= getSession();
		$data['tentk']	 		= $session['tentaikhoan'];

		$data['message'] 		= getMessages();
		$temp['data']     		= $data;
		$temp['template'] 		='user/Vforgetpass';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
	public function forget_pass(){

	}
}
