<?php

class Cmyinfo extends MY_Controller
{
	public $Mmyinfo;

	public function __construct() {
		parent::__construct();
		$this->load->model('user/Mmyinfo', 'Mmyinfo');
		$this->Mmyinfo = new Mmyinfo();
	}

	public function index() {
		if($this->input->post('save')){
			$this->update_myinfo();
		}
		$session = getSession();
		$mauser					= $session['mauser'];

		$data = array(
			'myinfo'			=> $this->Mmyinfo->get_user($mauser)
		);
		$temp['data']     		= $data;
		$temp['template'] 		='user/Vmyinfo';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
	public function update_myinfo(){
		$session = getSession();
		$mauser					= $session['mauser'];

		$myinfo['sTenNguoiDung']		= $this->input->post('hoten');
		$myinfo['dNgaySinh']	= $this->input->post('ngaysinh');
		$myinfo['sGioiTinh']	= $this->input->post('gt');
		$myinfo['sDiaChi']		= $this->input->post('diachi');
		$myinfo['sDienThoai']	= $this->input->post('dienthoai');

		// Xét lại session
		$session_data['login'] = $this->session->userdata('login');
		$session_data['login']['tenuser'] = $myinfo['sTenNguoiDung'];
		$this->session->set_userdata($session_data);

		if($_FILES["avatar"]['name']){
			$config['upload_path'] 		= 'assets/img/avatars/';
			$config['allowed_types'] 	= '*';
			$config['max_size'] 		= 100000;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$filename 			= seotag($myinfo['sTenNguoiDung']).'.'.pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
			$_FILES['filepost'] = array(
				'name' 		=> $filename,
				'type' 		=> $_FILES['avatar']['type'],
				'tmp_name' 	=> $_FILES['avatar']['tmp_name'],
				'error' 	=> $_FILES['avatar']['error'],
				'size' 		=> $_FILES['avatar']['size']
			);
			if($this->upload->do_upload("filepost")){
				$myinfo['sAnhDaiDien'] 	= 'assets/img/avatars/'.$filename;
				$result 				= $this->Mmyinfo->update_user($mauser, $myinfo);
				if($result > 0){
					$session['anhuser']	= $myinfo['sAnhDaiDien'];
					$this->session->set_userdata('login', $session);
					setMessages('success','','Cập nhật thông tin thành công!');
				}
				else{
					setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại !');
				}
				return redirect(base_url().'my-info');
			}
			else{
				$errors = $this->upload->display_errors();
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại !');
			}
			return redirect(base_url().'my-info');
		}
		else{
			$result = $this->Mmyinfo->update_user($mauser, $myinfo);

			if($result > 0){
				setMessages('success','','Cập nhật thông tin thành công!');
			}
			else{
				setMessages('error','','Thông tin không thay đổi !');
			}
			return redirect(base_url().'my-info');
		}
	}
}
