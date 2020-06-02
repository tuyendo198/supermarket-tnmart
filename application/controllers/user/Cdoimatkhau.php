<?php

class Cdoimatkhau extends MY_Controller
{
	public $Mdoimatkhau;

	public function __construct() {
		parent::__construct();
		$this->load->model('user/Mdoimatkhau', 'Mdoimatkhau');
		$this->Mdoimatkhau = new Mdoimatkhau();
	}
	public function index(){
		if($this->input->post('doimk')){
			$this->change_pass();
		}
		$session 				= getSession();
		$data['tentk']	 		= $session['tentaikhoan'];

		$data['message'] 		= getMessages();
		$temp['data']     		= $data;
		$temp['template'] 		='user/Vdoimatkhau';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
	public function change_pass(){
		$session = getSession();
		$tentk	 = $session['tentaikhoan'];
//		pr($tentk);
		$passold = $this->Mdoimatkhau->get_taikhoan_info($tentk)['sMatKhau'];
//		pr($passold);
		$pass	 = $this->input->post('newpass');
//		pr(sha1($pass));
		$repass	 = $this->input->post('passrepeat');
		if(sha1($pass) != $passold){
			if($pass == $repass){
				$row = $this->Mdoimatkhau->update_pass($tentk, sha1($pass));
				if($row > 0){
					setMessages('success','','Đổi mật khẩu thành công');
					return redirect(base_url().'doi-mat-khau');
				}
				else{
					setMessages('error','','Đổi mật khẩu không thành công');
					return redirect(base_url().'doi-mat-khau');
				}
			}
			else{
				setMessages('error','','Mật khẩu mới và xác nhận mật khẩu không giống nhau. Vui lòng nhập lại!');
				return redirect(base_url().'doi-mat-khau');
			}
		}
		else{
			setMessages('error','','Mật khẩu mới và mật khẩu cũ giống nhau. Vui lòng nhập lại!');
			return redirect(base_url().'doi-mat-khau');
		}

	}
}
