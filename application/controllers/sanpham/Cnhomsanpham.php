<?php

class Cnhomsanpham extends MY_Controller
{
	public $Mnhomsanpham;

	public function __construct() {
		parent::__construct();
		$this->load->model('sanpham/Mnhomsanpham', 'Mnhomsanpham');
		$this->Mnhomsanpham = new Mnhomsanpham();
	}

	public function index() {
		// Gọi đến function thêm danh mục
		if($this->input->post('btnThem')){
			$this->insert_nhomsanpham();
		}
		if ($this->input->get('ma')) {
			$data['thongtin'] = $this->get_thongtin_ma();
		}
		// Gọi đến function sửa danh mục
		if($this->input->post('btnCapNhatNSP')){
			$this->update_nhomsanpham();
		}
		// Gọi đến function xoá danh mục
		if($this->input->post('btnDel')){
			$this->delete_nhomsanpham();
		}

		$data['stt']            = 1;
		// Biến lưu mảng tên thể loại có menu con
		$data['tentl'] 			= $this->Mnhomsanpham->get_tennhomdm();
		$data['danhmuc'] 		= $this->Mnhomsanpham->get_nhomsp();

		$data['message'] 		= getMessages();
		$temp['data']     		= $data;
		$temp['template'] 		='sanpham/Vnhomsanpham';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
	public function insert_nhomsanpham()
	{
		$mannhomsp_max 			= $this->Mnhomsanpham->get_manhomsp_max();
		$data['PK_sMaNhomSP']	= generatePrimary($mannhomsp_max);
		$data['sTenNhomSP'] 	= $this->input->post('txtTenloaitin');
		$data['FK_iMaNhomDM'] 	= $this->input->post('ddlTheloai');
		$data['sTrangThai'] 	= $this->input->post('tt');

		if($_FILES["file"]["size"] > 0){
			$config['upload_path'] 		= 'assets/img/slider/';
			$config['allowed_types'] 	= '*';
			$config['max_size'] 		= 100000;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$filename 					= seotag($data['sTenNhomSP']).'_'.time().'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$_FILES['filepost'] 		= array(
				'name' 			=> $filename,
				'type' 			=> $_FILES['file']['type'],
				'tmp_name' 		=> $_FILES['file']['tmp_name'],
				'error' 		=> $_FILES['file']['error'],
				'size' 			=> $_FILES['file']['size']
			);
			if($this->upload->do_upload("filepost")){
				$data['sAnhQC'] 	= 'assets/img/slider/'.$filename;

				$checkNhomSP 		= $this->Mnhomsanpham->checkNhomSP($data['sTenNhomSP']);
				if ($checkNhomSP > 0){
					setMessages('error','','Nhóm sản phẩm đã tồn tại. Vui lòng thử lại!');
					return redirect(base_url().'nhom-san-pham');
				}

				$result 			= $this->Mnhomsanpham->insert_nhomsp($data);
				if($result > 0){
					setMessages('success','','Thêm nhóm sản phẩm thành công!');
				}
				else{
					setMessages('error','','Thêm nhóm sản phẩm không thành công. Vui lòng thử lại!');
				}
			}
			else{
				$errors 			= $this->upload->display_errors();
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
			}
		}
		else{
			$checkNhomSP 		= $this->Mnhomsanpham->checkNhomSP($data['sTenNhomSP']);
			if ($checkNhomSP > 0){
				setMessages('error','','Nhóm sản phẩm đã tồn tại. Vui lòng thử lại!');
				return redirect(base_url().'nhom-san-pham');
			}

			$result 				= $this->Mnhomsanpham->insert_nhomsp($data);
			if($result > 0){
				setMessages('success','','Thêm nhóm sản phẩm thành công!');
			}
			else{
				setMessages('error','','Thêm nhóm sản phẩm không thành công. Vui lòng thử lại!');
			}
		}
		return redirect(base_url().'nhom-san-pham');
	}
	// Function lấy ra thông tin theo mã
	public function get_thongtin_ma(){
		$maloaitin = $this->input->get('ma');
		$thongtin = $this->Mnhomsanpham->get_nhomsp_ma($maloaitin);
//		 pr($thongtin);
		return $thongtin;
	}

	public function update_nhomsanpham()
	{
		$ma 						= $this->input->get('ma');
		$thongtin['sTenNhomSP'] 	= $this->input->post('txtTenloaitin');
		$thongtin['FK_iMaNhomDM'] 	= $this->input->post('ddlTheloai');
		$thongtin['sTrangThai'] 	= $this->input->post('tt');
//		pr($thongtin);
		if($_FILES["file"]["size"] > 0){
			$config['upload_path'] 		= 'assets/img/slider/';
			$config['allowed_types'] 	= '*';
			$config['max_size'] 		= 100000;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$filename = seotag($thongtin['sTenNhomSP']).'_'.time().'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$_FILES['filepost'] 		= array(
				'name' 			=> $filename,
				'type' 			=> $_FILES['file']['type'],
				'tmp_name' 		=> $_FILES['file']['tmp_name'],
				'error' 		=> $_FILES['file']['error'],
				'size' 			=> $_FILES['file']['size']
			);
			if($this->upload->do_upload("filepost")){
				$thongtin['sAnhQC'] = 'assets/img/slider/'.$filename;
				$result = $this->Mnhomsanpham->update_nhomsp($ma, $thongtin);
				if($result > 0){
					setMessages('success','','Cập nhật nhóm sản phẩm thành công!');
				}
				else{
					setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
				}
			}
			else{
				$errors = $this->upload->display_errors();
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
			}
			return redirect(base_url().'nhom-san-pham');
		}
		else{
			$result = $this->Mnhomsanpham->update_nhomsp($ma, $thongtin);
			if($result > 0){
				setMessages('success','','Cập nhật nhóm sản phẩm thành công !');
			}
			else{
				setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại !');
			}
			return redirect(base_url().'nhom-san-pham');
		}
	}
	public function delete_nhomsanpham(){
		$ma 		= $this->input->post('btnDel');
		$row 		= $this->Mnhomsanpham->delete_nhomsp($ma);

		if ($row > 0) {
			setMessages('success','','Xoá nhóm sản phẩm thành công !');
			redirect(base_url().'nhom-san-pham');
		}
		else{
			setMessages('error','','Xoá nhóm sản phẩm không thành công !');
			redirect(base_url().'nhom-san-pham');
		}
	}
}
