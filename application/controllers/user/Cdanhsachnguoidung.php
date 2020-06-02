<?php

class Cdanhsachnguoidung extends MY_Controller
{
	public $Mdanhsachnguoidung;

	public function __construct() {
		parent::__construct();
		$this->load->model('user/Mdanhsachnguoidung', 'Mdanhsachnguoidung');
		$this->Mdanhsachnguoidung = new Mdanhsachnguoidung();
	}
	public function index() {
		if($this->input->post('action')){
			$action = $this->input->post('action');
			switch ($action) {
				case 'get_info_user':
					$this->get_info_user();
					break;
			}
		}
		if($this->input->post('btnThemNV')){
			$this->insert_nhanvien();
		}
		if($this->input->post('btnUpdate')){
			$this->update_nhanvien();
		}
		$data = array(
			'quyen'			=> $this->Mdanhsachnguoidung->get_quyen(),
			'danhsachnv'	=> $this->Mdanhsachnguoidung->get_thongtin_nv()
		);

		$temp['data']     		= $data;
		$temp['template'] 		= 'user/Vdanhsachnguoidung';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
	public function insert_nhanvien(){
		$mauser_max 			= $this->Mdanhsachnguoidung->get_mauser_max();
		$info_nv['PK_sMaND']	= generatePrimary($mauser_max);
		$info_nv['sTenNguoiDung']	= $this->input->post('tenuser');
		$info_nv['dNgaySinh']	= $this->input->post('sinhnhat');
		$info_nv['sGioiTinh']	= $this->input->post('rdGT');
		$info_nv['sDienThoai']	= $this->input->post('phone');
		$info_nv['sDiaChi']		= $this->input->post('txtDiaChi');
		$info_nv['sCMND']		= $this->input->post('txtCMND');
		$info_nv['sEmail']		= $this->input->post('txtEmail');
		$info_nv['sQueQuan']	= $this->input->post('txtQueQuan');
		$info_nv['sHoKhau']		= $this->input->post('txtHoKhau');

		if($_FILES["anh"]){
			$config['upload_path'] 		= 'assets/img/avatars/';
			$config['allowed_types'] 	= '*';
			$config['max_size'] 		= 100000;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$name = time();

			if ($_FILES['anh']['size'] > 0) {
				$anhdaidien 		= $name.'.'.pathinfo($_FILES['anh']['name'], PATHINFO_EXTENSION);
				$_FILES['filepost'] = array(
					'name' 		=> $anhdaidien,
					'type' 		=> $_FILES['anh']['type'],
					'tmp_name' 	=> $_FILES['anh']['tmp_name'],
					'error' 	=> $_FILES['anh']['error'],
					'size'		=> $_FILES['anh']['size']
				);
				if ($this->upload->do_upload("filepost")) {
					$info_nv['sAnhDaiDien'] = 'assets/img/avatars/' . $anhdaidien;
				}
				else {
					$errors = $this->upload->display_errors();
					setMessages('error', '', 'Có lỗi xảy ra. Vui lòng thử lại!');
					return redirect(base_url() . 'danh-sach-nguoi-dung');
				}
			}
			else{
				$info_nv['sAnhDaiDien']	= 'assets/img/avatars/totoro.gif';
			}
			$result = $this->Mdanhsachnguoidung->insert_user($info_nv);
			if($result > 0){
				setMessages('success','','Thêm người dùng thành công !');
				return redirect(base_url().'danh-sach-nguoi-dung');
			}
			else{
				setMessages('error','','Thêm người dùng không thành công!');
				return redirect(base_url().'danh-sach-nguoi-dung');
			}
		}
	}
	public function get_info_user(){
		$mauser 			= $this->input->post('PK_sMaND');
		$data				= $this->Mdanhsachnguoidung->get_info($mauser);

		echo json_encode($data);
		exit();
	}
	public function update_nhanvien(){
		$mauser 			= $this->input->post('btnUpdate');
		$info['sTenNguoiDung']	= $this->input->post('hoten');
		$info['dNgaySinh']	= $this->input->post('ngaysinh');
		$info['sGioiTinh']	= $this->input->post('gt');
		$info['sDienThoai']	= $this->input->post('dienthoai');
		$info['sDiaChi']	= $this->input->post('diachi');
		$info['sCMND']		= $this->input->post('cmnd');
		$info['sEmail']		= $this->input->post('email');
		$info['sQueQuan']	= $this->input->post('quequan');
		$info['sHoKhau']	= $this->input->post('hokhau');

		if($_FILES["anhnhanvien"]){
			$config['upload_path'] 		= 'assets/img/avatars/';
			$config['allowed_types'] 	= '*';
			$config['max_size'] 		= 100000;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$ext = pathinfo($_FILES['anhnhanvien']['name'], PATHINFO_EXTENSION);
			$name = seotag(rtrim($_FILES["anhnhanvien"]["name"], '.'.$ext)).'_'.time();

			if ($_FILES['anhnhanvien']['size'] > 0) {
				$anhdaidien 		= $name.'.'.pathinfo($_FILES['anhnhanvien']['name'], PATHINFO_EXTENSION);
				$_FILES['filepost'] = array(
					'name' 		=> $anhdaidien,
					'type' 		=> $_FILES['anhnhanvien']['type'],
					'tmp_name' 	=> $_FILES['anhnhanvien']['tmp_name'],
					'error' 	=> $_FILES['anhnhanvien']['error'],
					'size'		=> $_FILES['anhnhanvien']['size']
				);
				if ($this->upload->do_upload("filepost")) {
					$info['sAnhDaiDien'] = 'assets/img/avatars/' . $anhdaidien;
				}
				else {
					$errors = $this->upload->display_errors();
					setMessages('error', '', 'Có lỗi xảy ra. Vui lòng thử lại!');
					return redirect(base_url() . 'danh-sach-nguoi-dung');
				}
			}

			$result = $this->Mdanhsachnguoidung->update_user($mauser, $info);

			if($result > 0){
				setMessages('success','','Cập nhật người dùng thành công !');
			}
			else{
				setMessages('error','','Cập nhật người dùng không thành công!');
			}
			return redirect(base_url().'danh-sach-nguoi-dung');
		}

	}
}
