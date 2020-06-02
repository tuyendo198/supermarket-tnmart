<?php

class Cprofile extends MY_Controller_KH
{
	public $Mprofile;
	public function __construct() {
		parent::__construct();
		$this->load->model('Mprofile', 'Mprofile');
		$this->Mprofile = new Mprofile();
	}
	public function index(){
		$session				= getSession('info_khachhang');
		if($this->input->post('btnSave')){
			$this->update_info();
		}

		$data['info_canhan'] 	= $this->Mprofile->get_thongtintaikhoan($session['mauser']);

		$temp['data']      	 	= $data;
		$temp['template']   	= 'layout_frontend/Vprofile';
		$this->load->view('layout_frontend/Vlayout',$temp);
	}
	public function update_info(){
		$session			= getSession('info_khachhang');
		$mauser 			= $session['mauser'];
		$info['sTenNguoiDung']	= $this->input->post('hoten');
		$info['dNgaySinh']	= $this->input->post('ngaysinh');
		$info['sGioiTinh']	= $this->input->post('gt');
		$info['sEmail']		= $this->input->post('email');
		$info['sDiaChi']	= $this->input->post('diachi');
		$info['sDienThoai']	= $this->input->post('dienthoai');

		if($_FILES["uploadAnh"]['name']){
			$config['upload_path'] 		= 'assets/img/avatars/';
			$config['allowed_types'] 	= '*';
			$config['overwrite'] 		= TRUE;
			$config['max_size'] 		= 100000;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$filename 			= seotag($info['sTenNguoiDung']).'.'.pathinfo($_FILES['uploadAnh']['name'], PATHINFO_EXTENSION);
			$_FILES['filepost'] = array(
				'name' 		=> $filename,
				'type' 		=> $_FILES['uploadAnh']['type'],
				'tmp_name' 	=> $_FILES['uploadAnh']['tmp_name'],
				'error' 	=> $_FILES['uploadAnh']['error'],
				'size' 		=> $_FILES['uploadAnh']['size']
			);
			if($this->upload->do_upload("filepost")){
				$info['sAnhDaiDien'] 	= 'assets/img/avatars/'.$filename;
				$result 				= $this->Mprofile->update_info($mauser, $info);
				if($result > 0){
					$session['anhuser']	= $info['sAnhDaiDien'];
					$this->session->set_userdata('info_khachhang', $session);
				}
				setMessages('success','','Cập nhật thông tin thành công!');
				return redirect(base_url().'profile');
			}
			else{
				$errors = $this->upload->display_errors();
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
			}
			return redirect(base_url().'profile');
		}
		else{
			$result = $this->Mprofile->update_info($mauser, $info);

			if($result > 0){
				setMessages('success','','Cập nhật thông tin thành công!');
			}
			else{
				setMessages('error','','Thông tin không thay đổi');
			}
			return redirect(base_url().'profile');
		}
	}
}
