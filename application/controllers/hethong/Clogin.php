<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Clogin extends CI_Controller
{
	protected $_title		= "Đăng nhập vào hệ thống";
	public $Mlogin;

	public function __construct() {
		parent::__construct();
		$this->load->model('hethong/Mlogin', 'Mlogin');
		$this->Mlogin 		= new Mlogin();
	}
	
	public function index() {
		$this->session->unset_userdata('login');
		$data['url']   		= base_url();
		$data['title'] 		= $this->_title;
		if($this->input->post('dangnhap')){
			$this->login();
		}
		$data['message'] 	= getMessages();
		$this->parser->parse('hethong/Vlogin', $data);
	}

	// đăng nhập
	public function login()
	{
		$taikhoan 			= $this->input->post('username');
		$matkhau 			= $this->input->post('password');
		$user 				= $this->Mlogin->dangnhap($taikhoan,$matkhau);
		if(!empty($user) && $user['FK_iMaQuyen'] !=2 && $user['sTrangThai'] == 'Bình thường')
		{
			$session_data['login'] = array(
				'mataikhoan' 	=> $user['PK_iMaTaiKhoan'],
				'tentaikhoan' 	=> $user['sTenTaiKhoan'],
				'tenuser' 		=> $user['sTenNguoiDung'],
				'anhuser' 		=> $user['sAnhDaiDien'],
				'mauser' 		=> $user['FK_sMaND'],
				'maquyen' 		=> $user['FK_iMaQuyen']
			);
			$this->session->set_userdata($session_data);
			setMessages('success','','Đăng nhập thành công !');
			return redirect(base_url().'welcome');
		}
		else{
			setMessages('error','','Tài khoản hoặc mật khẩu chưa chính xác !');
			return redirect(base_url().'login');
		}
	}
	// đăng xuất
	public function logout() {
		$this->session->userdata = array();
		$this->session->sess_destroy();
		$this->input->set_cookie('', '', time()-36000);
		redirect(base_url().'dangnhap');
		exit();
	}
} // End class

