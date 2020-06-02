<?php

class Cdanhsachtaikhoan extends MY_Controller
{
	public $Mdanhsachtaikhoan;
	public function __construct() {
		parent::__construct();
		$this->load->model('user/Mdanhsachtaikhoan', 'Mdanhsachtaikhoan');
		$this->Mdanhsachtaikhoan = new Mdanhsachtaikhoan();
	}

	public function index() {
		$session = getSession();
		if($this->input->post('action')){
			$action = $this->input->post('action');
			switch ($action) {
				case 'get_info_taikhoan':
					$this->get_info_taikhoan();
					break;
			}
		}
		if($this->input->post('btnCapTK')){
			$this->insert_taikhoan();
		}
		if($this->input->post('btnUpdateTK')){
			$this->update_taikhoan();
		}
		if($this->input->post('set_blockTK')){
			$this->lock_taikhoan();
		}
		$data['nv_no_tk']			= $this->Mdanhsachtaikhoan->get_nv_chuacoTK();
		$data['nhanvien']			= $this->Mdanhsachtaikhoan->get_nhanvien();
		$data['quyen']				= $this->Mdanhsachtaikhoan->get_quyen();
		$data['quyennv']			= $this->Mdanhsachtaikhoan->get_quyen_nhanvien();
		$data['danhsachtaikhoan']	= $this->Mdanhsachtaikhoan->get_danhsach_taikhoan($session['mataikhoan']);
		$data['stt']            	= 1;

		$data['message'] 			= getMessages();
		$temp['data']     			= $data;
		$temp['template'] 			= 'user/Vdanhsachtaikhoan';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
	public function insert_taikhoan(){
		$matkhau = $this->input->post('txtPass');
		$taikhoan['FK_sMaND']			= $this->input->post('ddlUser');
		$taikhoan['FK_iMaQuyen']		= $this->input->post('ddlQuyen');
		$taikhoan['sTenTaiKhoan']		= $this->input->post('txtTaiKhoan');
		$taikhoan['sMatKhau']			= sha1($matkhau);
		$xacnhanpass					= $this->input->post('txtRePass');
		$taikhoan['sTrangThai']			= "Bình thường";
		if($xacnhanpass === $matkhau){
			$result = $this->Mdanhsachtaikhoan->insert_tk($taikhoan);
			if($result > 0){
				setMessages('success','','Cấp tài khoản thành công!');
				return redirect(base_url().'danh-sach-tai-khoan');
			}
			else{
				setMessages('error','','Cấp tài khoản không thành công!');
				return redirect(base_url().'danh-sach-tai-khoan');
			}
		}
		else{
			setMessages('error','','Mật khẩu và xác nhận mật khẩu không giống nhau!');
			return redirect(base_url().'danh-sach-tai-khoan');
		}
	}
	public function get_info_taikhoan(){
		$matk				= $this->input->post('PK_iMaTaiKhoan');
		$data				= $this->Mdanhsachtaikhoan->get_info($matk);
//		pr($data);
		echo json_encode($data);
		exit();
	}
	public function update_taikhoan(){
		$mataikhoan				= $this->input->post('btnUpdateTK');
		$info['FK_iMaQuyen']	= $this->input->post('quyen');

		$result = $this->Mdanhsachtaikhoan->update_taikhoan($mataikhoan, $info);

		if($result > 0){
			setMessages('success','','Cập nhật tài khoản thành công !');
		}
		else{
			setMessages('error','','Cập nhật tài khoản không thành công!');
		}
		return redirect(base_url().'danh-sach-tai-khoan');
	}
	public function lock_taikhoan(){
		$mataikhoan				= $this->input->post('set_blockTK');
		$thongtin				= $this->Mdanhsachtaikhoan->get_info($mataikhoan);
		$trangthai				= $thongtin['sTrangThai'];
		if(isset($trangthai)){
			if($trangthai == "Bình thường"){
				$result				= $this->Mdanhsachtaikhoan->update_trangthai($mataikhoan, "Khoá");
				if($result > 0){
					setMessages('success','','Khoá tài khoản thành công !');
				}
				else{
					setMessages('error','','Khoá tài khoản không thành công!');
				}
				return redirect(base_url().'danh-sach-tai-khoan');
			}
			else{
				$result				= $this->Mdanhsachtaikhoan->update_trangthai($mataikhoan, "Bình thường");
				if($result > 0){
					setMessages('success','','Mở khoá tài khoản thành công !');
				}
				else{
					setMessages('error','','Mở khoá tài khoản không thành công!');
				}
				return redirect(base_url().'danh-sach-tai-khoan');
			}
		}
		else{
			setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
			return redirect(base_url().'danh-sach-tai-khoan');
		}
	}
}
