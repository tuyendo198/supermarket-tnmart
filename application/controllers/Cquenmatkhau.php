<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Cquenmatkhau extends CI_Controller
{
	public $Mquenmatkhau;
	public function __construct() {
		parent::__construct();
		$this->load->model('Mquenmatkhau', 'Mquenmatkhau');
		$this->Mquenmatkhau = new Mquenmatkhau();
	}

	public function index() {
		$checkReset = false;
		if (!empty($this->input->get())) {
			$checkReset = $this->checkToken();
			if ($this->input->post('changePassword') && $checkReset){
				$this->changePass();
			}
		}

		if ($this->input->post('getBackPassword')) {
			$this->sendEmailResetPass();
		}

		$data = array(
			
		);
		if ($checkReset){
			$data['type'] = 'reset';
		}
		$temp['data']     = $data;
		$temp['template'] = 'layout_frontend/Vquenmatkhau';
		$this->load->view('layout_frontend/Vlayout', $temp);
	}

	public function checkToken()
	{
		$tenTK = $this->input->get('sid');
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$checkEmail = $this->Mquenmatkhau->checkEmail($tenTK, $email);

		if (empty($checkEmail) || $token !== sha1(md5($checkEmail['sMatKhau']))){
			setMessages('error', 'Bạn không có quyền truy cập chức năng này!');
			return redirect(base_url());
		}
		
		return true;
	}

	public function changePass()
	{
		$tenTK = $this->input->get('sid');
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$pass = $this->input->post('matkhau');
		$repass = $this->input->post('nhaplaimatkhau');

		if ($pass !== $repass){
			setMessages('error', 'Mật khẩu và mật khẩu nhập lại không khớp!');
			return redirect('quenmatkhau?sid='.$tenTK.'&email='.$email.'&token='.$token);
		}

		$rs = $this->Mquenmatkhau->updatePassword($tenTK, $pass);

		if ($rs > 0){
			setMessages('success', 'Cập nhật mật khẩu thành công. Vui lòng đăng nhập vào hệ thống để mua hàng!');
		}
		else{
			setMessages('error', 'Có lỗi xảy ra. Vui lòng thử lại!');
		}
		return redirect(base_url());
	}

	public function sendEmailResetPass()
	{
		$tenTK = $this->input->post('tenTaiKhoan');
		$email = $this->input->post('email');

		$checkEmail = $this->Mquenmatkhau->checkEmail($tenTK, $email);

		if (empty($checkEmail)){
			setMessages('error', 'Sai tên đăng nhập hoặc email. Vui lòng thử lại');
			return redirect('quenmatkhau');
		}

		$config = Array(
			'protocol' 	=> 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'nhungtuyendo@gmail.com',
			'smtp_pass' => 'nhung_tuyen_98',
			'mailtype' 	=> 'html',
			'charset' 	=> 'iso-8859-1',
			'wordwrap' 	=> TRUE,
			'mailpath' 	=> __DIR__ . '\..\..\logs\sendmail',
			'charset' 	=> 'utf8'
		);

		$this->load->library('email', $config);
		$linkReset = base_url().'quenmatkhau?sid='.$tenTK.'&email='.$email.'&token='.sha1(md5($checkEmail['sMatKhau']));
		$message = "<h2>Hệ thống siêu thị Thanh Nga Mart</h2>";
		$message .= "<p>Chúng tôi nhận được yêu cầu cập nhật mật khẩu cho tài khoản của bạn. Nếu bạn thực hiện thao tác này vui lòng cập nhật mật khẩu mới <a href='".$linkReset."'>tại đây</a>. Nếu không vui lòng bỏ qua email này!</p>";

		$this->email->set_newline("\r\n");
		$this->email->from('nhungtuyendo@gmail.com', 'Hệ thống siêu thị Thanh Nga Mart');
		$this->email->subject('[No reply] - Thay đổi mật khẩu - Hệ thống siêu thị Thanh Nga Mart');
		$this->email->message($message);
		$this->email->to($email);
		if($this->email->send()){
			setMessages('success', 'Hệ thống đã gửi yêu cầu lấy lại mật khẩu vào email của bạn. Vui lòng kiểm tra email!');
		}
		else{
			setMessages('error', 'Gửi yêu cầu lấy lại mật khẩu không thành công!');
		}
		return redirect(base_url());
	}
}
