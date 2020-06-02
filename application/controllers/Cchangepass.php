<?php

class Cchangepass extends MY_Controller_KH
{
	public $Mchangepass;
	public function __construct() {
		parent::__construct();
		$this->load->model('Mchangepass', 'Mchangepass');
		$this->Mchangepass = new Mchangepass();
	}
	public function index(){
		$session				= getSession('info_khachhang');
		$mataikhoan				= $session['mataikhoan'];

		if($this->input->post('btnSave')){
			$this->update_pass();
		}

		$data['list_product'] 	= $this->Mchangepass->get_listProduct();
		$data['info_canhan'] 	= $this->Mchangepass->get_thongtintaikhoan($mataikhoan);

		$temp['data']      	 	= $data;
		$temp['template']   	= 'layout_frontend/Vchangepass';
		$this->load->view('layout_frontend/Vlayout',$temp);
	}
	public function update_pass(){
		$session 			= getSession('info_khachhang');
		$mataikhoan	 	    = $session['mataikhoan'];
		$passold 			= $this->Mchangepass->get_taikhoan_info($mataikhoan)['sMatKhau'];
		$pass	 			= $this->input->post('new_pass');
		$repass	 			= $this->input->post('re_pass');
		if(sha1($pass) != $passold){
			if($pass == $repass){
				$row = $this->Mchangepass->update_matkhau($mataikhoan, sha1($pass));
				if($row > 0){
					setMessages('success','','Đổi mật khẩu thành công!');
					return redirect(base_url().'change-pass');
				}
				else{
					setMessages('error','','Đổi mật khẩu không thành công!');
					return redirect(base_url().'change-pass');
				}
			}
			else{
				setMessages('error','','Mật khẩu mới và xác nhận mật khẩu không giống nhau. Vui lòng nhập lại!');
				return redirect(base_url().'change-pass');
			}
		}
		else{
			setMessages('error','','Mật khẩu mới và mật khẩu cũ giống nhau. Vui lòng nhập lại!');
			return redirect(base_url().'change-pass');
		}
	}
}
