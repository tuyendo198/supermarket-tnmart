<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chome Extends CI_Controller {

	public $Mhome;
	public function __construct() {
		parent::__construct();
		$this->load->model('Mhome', 'Mhome');
		$this->Mhome = new Mhome();
	}

	/*Trang chủ*/
	public function index()
	{
		$data = array(
			'title' => 'Trang chủ | Thanh Nga Mart',
			'url' 	=> base_url()
		);
		if($this->input->post('action')){
			$action = $this->input->post('action');
			switch ($action) {
				case 'get_info_sp':
					$this->get_thongtin_sp();
					break;
			}
		}
		if($this->input->post('btnLogin')){
			$this->dangnhap();
		}
		if($this->input->post('btnDangKy')){
			$this->insert_taikhoan_khachhang();
		}
		$data = array(
			'list_product' 		=> $this->Mhome->get_listProduct(),
			'listSPKhuyenMai' 	=> $this->Mhome->getListSPKhuyenMai()
		);

		$temp['data']       = $data;
		$temp['template']   = 'layout_frontend/Vcontent';
		$this->load->view('layout_frontend/Vlayout',$temp);
	}
	public function get_thongtin_sp(){
		$masp 		= $this->input->post('PK_sMaSP');
		$data		= $this->Mhome->get_chitietsp($masp);
		
		echo json_encode($data);
		exit();
	}
	public function insert_taikhoan_khachhang(){
		$makh_max 						= $this->Mhome->get_makh_max();
		$new_makh						= generatePrimary($makh_max);
		$thongtin_kh['PK_sMaND']		= $new_makh;
		$thongtin_kh['sTenNguoiDung']	= $this->input->post('txtHoten');
		$thongtin_kh['sEmail']			= $this->input->post('txtEmail');

		$thongtin_tk['sTenTaiKhoan']	= $this->input->post('txtEmail');
		$matkhau						= $this->input->post('txtPass');
		$thongtin_tk['sMatKhau']		= sha1($matkhau);
		$xacnhanmk						= $this->input->post('txtRePass');

		$thongtin_tk['sTrangThai']		= "Bình thường";
		$thongtin_tk['FK_iMaQuyen']		= 2;
		$thongtin_tk['FK_sMaND']		= $new_makh;

		$checkEmail = $this->Mhome->checkTruncateEmail($thongtin_tk['sTenTaiKhoan']);

		if ($checkEmail > 0){
			setMessages('error','','Email đã được đăng ký với hệ thống. Vui lòng thử email khác!');
			return redirect(base_url());
		}

		if($matkhau === $xacnhanmk){
			$insert_new_maTK 			= $this->Mhome->dangky($thongtin_kh, $thongtin_tk);

			if($insert_new_maTK > 0){
				$session_data['info_khachhang'] = array(
					'mataikhoan' 	=> $insert_new_maTK,
					'tentaikhoan' 	=> $thongtin_tk['sTenTaiKhoan'],
					'tenuser' 		=> $thongtin_kh['sTenNguoiDung'],
					'mauser' 		=> $thongtin_tk['FK_sMaND'],
					'maquyen' 		=> 2
				);
				$this->session->set_userdata($session_data);
				setMessages('success','','Đăng ký tài khoản thành công! Vui lòng bổ sung thông tin giao hàng trước khi mua hàng.');
				return redirect('diachigiaohang');
			}
			else{
				setMessages('error','','Đăng ký tài khoản không thành công!');
			}
		}
		else{
			setMessages('error','','Mật khẩu và nhập lại mật khẩu không giống nhau!');
		}
		return redirect(base_url());

	}
	public function dangnhap(){
		$tentaikhoan = $this->input->post('txtEmail');
		$matkhau	 = $this->input->post('txtPass');
		$currentUrl  = $this->input->post('currentUrl');
		$login		 = $this->Mhome->dangnhap($tentaikhoan, $matkhau);

		if(!empty($login))
		{
			$session_data['info_khachhang'] = array(
				'mataikhoan' 	=> $login['PK_iMaTaiKhoan'],
				'tentaikhoan' 	=> $login['sTenTaiKhoan'],
				'tenuser' 		=> $login['sTenNguoiDung'],
				'anhuser' 		=> $login['sAnhDaiDien'],
				'mauser' 		=> $login['FK_sMaND'],
				'maquyen' 		=> $login['FK_iMaQuyen']
			);
			$this->session->set_userdata($session_data);
			setMessages('success','','Đăng nhập thành công!');
		}
		else{
			setMessages('error','','Tài khoản hoặc mật khẩu chưa chính xác!');
		}
		return redirect($currentUrl);
	}
	// đăng xuất
	public function dangxuat() {
		$this->session->userdata = array();
		$this->session->sess_destroy();
		$this->input->set_cookie('', '', time()-36000);
		redirect(base_url());
		exit();
	}
}
