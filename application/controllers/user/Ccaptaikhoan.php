<?php

class Ccaptaikhoan extends MY_Controller
{
	public $Mcaptaikhoan;

	public function __construct() {
		parent::__construct();
		$this->load->model('user/Mcaptaikhoan', 'Mcaptaikhoan');
		$this->Mcaptaikhoan 	= new Mcaptaikhoan();
	}
	public function index()
	{
		if($this->input->post('btnCapTK')){
			$this->insert_taikhoan();
		}
		$data = array(
			'nhanvien'		=> $this->Mcaptaikhoan->get_nhanvien(),
			'quyen'			=> $this->Mcaptaikhoan->get_quyen()
		);

		$data['message'] 		= getMessages();
		$temp['data'] 			= $data;
		$temp['template'] 		= 'user/Vcaptaikhoan';
		$this->load->view('layout_backend/Vlayout', $temp);
	}
	public function insert_taikhoan(){
		$matkhau = $this->input->post('txtPass');
		$taikhoan['FK_sMaND']			= $this->input->post('ddlUser');
		$taikhoan['FK_iMaQuyen']		= $this->input->post('ddlQuyen');
		$taikhoan['sTenTaiKhoan']		= $this->input->post('txtTaiKhoan');
		$taikhoan['sMatKhau']			= sha1($matkhau);
		$xacnhanpass					= $this->input->post('txtRePass');
		if($xacnhanpass === $matkhau){
			$result = $this->Mcaptaikhoan->insert_tk($taikhoan);
			if($result > 0){
				setMessages('success','','Cấp tài khoản thành công!');
				return redirect(base_url().'cap-taikhoan-nhan-vien');
			}
			else{
				setMessages('error','','Cấp tài khoản không thành công!');
				return redirect(base_url().'cap-taikhoan-nhan-vien');
			}
		}
		else{
			setMessages('error','','Mật khẩu và xác nhận mật khẩu không giống nhau!');
			return redirect(base_url().'cap-taikhoan-nhan-vien');
		}
	}
}
