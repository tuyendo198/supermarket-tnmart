<?php

class Cnhacungcap extends MY_Controller
{
	public $Mnhacungcap;

	public function __construct() {
		parent::__construct();
		$this->load->model('danhmuc/Mnhacungcap', 'Mnhacungcap');
		$this->Mnhacungcap 		= new Mnhacungcap();
	}
	public function index() {
		if($this->input->post('themnhacc')){
			$this->insert_nhacc();
		}
		if ($this->input->get('mancc')) {
			$data['thongtin'] 	= $this->get_nhacungcap();
		}

		if($this->input->post('capnhat')){
			$this->update_nhacc();
		}

		if($this->input->post('btnDelNCC')){
			$this->del_nhacc();
		}

		$data['nhacc']			= $this->Mnhacungcap->get_nhacc();
//		pr($data['nhacc']);
		$data['stt']            = 1;

		$data['message'] 		= getMessages();
		$temp['data']     		= $data;
		$temp['template'] 		= 'danhmuc/Vnhacungcap';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
	public function insert_nhacc(){
		$mancc_max 				= $this->Mnhacungcap->get_mancc_max();
		$dl['PK_sMaNCC']		= generatePrimary($mancc_max);
		$dl['sTenNCC'] 			= $this->input->post('tennhacc');
		$dl['sSoDienThoai'] 	= $this->input->post('sdt');
		$dl['sDiaChi'] 			= $this->input->post('diachi');
		$dl['sEmail'] 			= $this->input->post('email');

		if($_FILES["logoNCC"]['name']){
			$config['upload_path'] 		= 'assets/img/nhacungcap/';
			$config['allowed_types'] 	= '*';
			$config['max_size'] 		= 100000;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$filename = time().'.'.pathinfo($_FILES['logoNCC']['name'], PATHINFO_EXTENSION);
			$_FILES['filepost'] 		= array(
				'name' 		=> $filename,
				'type' 		=> $_FILES['logoNCC']['type'],
				'tmp_name' 	=> $_FILES['logoNCC']['tmp_name'],
				'error'		=> $_FILES['logoNCC']['error'],
				'size' 		=> $_FILES['logoNCC']['size']
			);
			if($this->upload->do_upload("filepost")){
				$dl['sLogoNCC'] 		= 'assets/img/nhacungcap/'.$filename;
				$checkTenNCC 		= $this->Mnhacungcap->checkTenNCC($dl['sTenNCC']);
				if ($checkTenNCC > 0){
					setMessages('error','','Tên nhà cung cấp đã tồn tại. Vui lòng thử lại!');
					return redirect(base_url().'nha-cung-cap');
				}

				$result 				= $this->Mnhacungcap->insert_nhacc($dl);
				if($result > 0){
					setMessages('success','','Thêm nhà cung cấp thành công!');
					return redirect(base_url().'nha-cung-cap');
				}
				else{
					setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
					return redirect(base_url().'nha-cung-cap');
				}
			}
			else{
				$errors = $this->upload->display_errors();
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
				return redirect(base_url().'nha-cung-cap');
			}
		}
		else{
			$dl['sLogoNCC'] 	= "assets/img/avatars/logo.jpg";
			$checkTenNCC 		= $this->Mnhacungcap->checkTenNCC($dl['sTenNCC']);
			if ($checkTenNCC > 0){
				setMessages('error','','Tên nhà cung cấp đã tồn tại. Vui lòng thử lại!');
				return redirect(base_url().'nha-cung-cap');
			}

			$result 			= $this->Mnhacungcap->insert_nhacc($dl);
			if($result > 0){
				setMessages('success','','Thêm nhà cung cấp thành công!');
				return redirect(base_url().'nha-cung-cap');
			}
			else{
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
				return redirect(base_url().'nha-cung-cap');
			}
		}
	}

	// Function lấy ra thông tin theo mã
	public function get_nhacungcap(){
		$maNCC = $this->input->get('mancc');
		$thongtin = $this->Mnhacungcap->get_ncc($maNCC);
//		 pr($thongtin);
		return $thongtin;
	}

	public function update_nhacc(){
		$ma 						= $this->input->get('mancc');
		$thongtin['sTenNCC'] 		= $this->input->post('tennhacc');
		$thongtin['sSoDienThoai'] 	= $this->input->post('sdt');
		$thongtin['sDiaChi'] 		= $this->input->post('diachi');
		$thongtin['sEmail'] 		= $this->input->post('email');

		if($_FILES["logoNCC"]['name']){
			$config['upload_path'] = 'assets/img/nhacungcap/';
			$config['allowed_types'] = '*';
			$config['max_size'] = 100000;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$filename = time().'.'.pathinfo($_FILES['logoNCC']['name'], PATHINFO_EXTENSION);
			$_FILES['filepost'] = array(
				'name' => $filename,
				'type' => $_FILES['logoNCC']['type'],
				'tmp_name' => $_FILES['logoNCC']['tmp_name'],
				'error' => $_FILES['logoNCC']['error'],
				'size' => $_FILES['logoNCC']['size']
			);
			if($this->upload->do_upload("filepost")){
				$thongtin['sLogoNCC'] = 'assets/img/nhacungcap/'.$filename;
				$result = $this->Mnhacungcap->update_nhacc($ma, $thongtin);
				if($result > 0){
					setMessages('success','','Cập nhật nhà cung cấp thành công!');
					return redirect(base_url().'nha-cung-cap');
				}
				else{
					setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
					return redirect(base_url().'nha-cung-cap');
				}
			}else{
				$errors = $this->upload->display_errors();
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
				return redirect(base_url().'nha-cung-cap');
			}
		}
		else{
			$result = $this->Mnhacungcap->update_nhacc($ma, $thongtin);
			if($result > 0){
				setMessages('success','','Cập nhật nhà cung cấp thành công!');
				return redirect(base_url().'nha-cung-cap');
			}
			else{
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
				return redirect(base_url().'nha-cung-cap');
			}
		}
	}
	public function del_nhacc(){
		$ma = $this->input->post('btnDelNCC');
		$row = $this->Mnhacungcap->delete_nhacc($ma);

		if ($row > 0) {
			setMessages('success','','Xoá nhà cung cấp thành công !');
			redirect(base_url().'nha-cung-cap');
		}
		else{
			setMessages('error','','Xoá nhà cung cấp không thành công !');
			redirect(base_url().'nha-cung-cap');
		}
	}
}
