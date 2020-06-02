<?php

class Cnhasanxuat extends MY_Controller
{
	public $Mnhasanxuat;

	public function __construct() {
		parent::__construct();
		$this->load->model('danhmuc/Mnhasanxuat', 'Mnhasanxuat');
		$this->Mnhasanxuat 		= new Mnhasanxuat();
	}
	public function index() {
		if($this->input->post('btnAddNSX')){
			$this->insert_nhasx();
		}
		if($this->input->get('mansx')){
			$data['detailNSX']	= $this->get_chitietNSX();
//			pr($data['detailNSX']);
		}
		if($this->input->post('btnUpdateNSX')){
			$this->update_nhasx();
		}
		if($this->input->post('btnDelNSX')){
			$this->delete_nhasx();
		}
		$data['nhasx']			= $this->Mnhasanxuat->get_nhasx();
//		pr($data['nhasx']);
		$data['stt']            = 1;

		$data['message'] 		= getMessages();
		$temp['data']     		= $data;
		$temp['template'] 		= 'danhmuc/Vnhasanxuat';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
	public function insert_nhasx(){
		$mansx_max 				= $this->Mnhasanxuat->get_mansx_max();
		$dl['PK_sMaNSX']		= generatePrimary($mansx_max);
		$dl['sTenNSX '] 		= $this->input->post('tennhasx');
		$dl['sSoDienThoai'] 	= $this->input->post('sdt');
		$dl['sDiaChi'] 			= $this->input->post('diachi');
		$dl['sEmail '] 			= $this->input->post('email');

		if($_FILES["logoNSX"]['name']){
			$config['upload_path'] 		= 'assets/img/nhasanxuat/';
			$config['allowed_types'] 	= '*';
			$config['max_size'] 		= 100000;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$filename = time().'.'.pathinfo($_FILES['logoNSX']['name'], PATHINFO_EXTENSION);
			$_FILES['filepost'] 		= array(
				'name' 		=> $filename,
				'type' 		=> $_FILES['logoNSX']['type'],
				'tmp_name' 	=> $_FILES['logoNSX']['tmp_name'],
				'error'		=> $_FILES['logoNSX']['error'],
				'size' 		=> $_FILES['logoNSX']['size']
			);
			if($this->upload->do_upload("filepost")){
				$dl['sLogoNSX'] 		= 'assets/img/nhasanxuat/'.$filename;
				$checkTenNSX 			= $this->Mnhasanxuat->checkTenNSX($dl['sTenNSX ']);
				if ($checkTenNSX > 0){
					setMessages('error','','Tên nhà sản xuất đã tồn tại. Vui lòng thử lại!');
					return redirect(base_url().'nha-san-xuat');
				}

				$result 				= $this->Mnhasanxuat->insert_nhasx($dl);
				if($result > 0){
					setMessages('success','','Thêm nhà sản xuất thành công!');
				}
				else{
					setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
				}
			}else{
				$errors = $this->upload->display_errors();
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
			}
			return redirect(base_url().'nha-san-xuat');
		}
		else{
			$dl['sLogoNSX']		= "assets/img/avatars/logo.jpg";
			$checkTenNSX 			= $this->Mnhasanxuat->checkTenNSX($dl['sTenNSX ']);
			if ($checkTenNSX > 0){
				setMessages('error','','Tên nhà sản xuất đã tồn tại. Vui lòng thử lại!');
				return redirect(base_url().'nha-san-xuat');
			}

			$result 			= $this->Mnhasanxuat->insert_nhasx($dl);
			if($result > 0){
				setMessages('success','','Thêm nhà sản xuất thành công!');
			}
			else{
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
			}
			return redirect(base_url().'nha-san-xuat');
		}
	}
	public function get_chitietNSX(){
		$maNSX = $this->input->get('mansx');
		$result = $this->Mnhasanxuat->get_nsx($maNSX);
		return $result;
	}
	public function update_nhasx(){
		$mansx 							= $this->input->get('mansx');
		$chitiet['sTenNSX '] 			= $this->input->post('tennhasx');
		$chitiet['sSoDienThoai '] 		= $this->input->post('sdt');
		$chitiet['sDiaChi'] 			= $this->input->post('diachi');
		$chitiet['sEmail '] 			= $this->input->post('email');
//		pr($chitiet);
		if($_FILES["logoNSX"]['name']){
			$config['upload_path'] 		= 'assets/img/nhasanxuat/';
			$config['allowed_types'] 	= '*';
			$config['max_size'] 		= 100000;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$filename = time().'.'.pathinfo($_FILES['logoNSX']['name'], PATHINFO_EXTENSION);
			$_FILES['filepost'] 		= array(
				'name' 		=> $filename,
				'type' 		=> $_FILES['logoNSX']['type'],
				'tmp_name' 	=> $_FILES['logoNSX']['tmp_name'],
				'error'		=> $_FILES['logoNSX']['error'],
				'size' 		=> $_FILES['logoNSX']['size']
			);
			if($this->upload->do_upload("filepost")){
				$chitiet['sLogoNSX'] 		= 'assets/img/nhasanxuat/'.$filename;
				$result 					= $this->Mnhasanxuat->update_nhasx($mansx, $chitiet);
				if($result > 0){
					setMessages('success','','Cập nhật nhà sản xuất thành công!');
				}
				else{
					setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
				}
			}else{
				$errors = $this->upload->display_errors();
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
			}
			return redirect(base_url().'nha-san-xuat');
		}
		else{
			$result = $this->Mnhasanxuat->update_nhasx($mansx, $chitiet);
			if($result > 0){
				setMessages('success','','Cập nhật nhà sản xuất thành công!');
				return redirect(base_url().'nha-san-xuat');
			}
			else{
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
				return redirect(base_url().'nha-san-xuat');
			}
		}
	}
	public function delete_nhasx(){
		$ma = $this->input->post('btnDelNSX');
		$row = $this->Mnhasanxuat->delete_nhasx($ma);

		if ($row > 0) {
			setMessages('success','','Xoá nhà sản xuất thành công !');
			redirect(base_url().'nha-san-xuat');
		}
		else{
			setMessages('error','','Xoá nhà sản xuất không thành công !');
			redirect(base_url().'nha-san-xuat');
		}
	}
}
