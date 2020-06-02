<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Cnhomdanhmuc extends MY_Controller {
	protected $_title= "Hệ thống quản lý bán hàng siêu thị";
	public $Mnhomdanhmuc;

	public function __construct() {
		parent::__construct();
		$this->load->model('danhmuc/Mnhomdanhmuc','Mnhomdanhmuc');
		$this->Mnhomdanhmuc = new Mnhomdanhmuc();
	}

	public function index() {
		// Gọi đến function thêm nhóm danh mục
		if($this->input->post('btnThemNDM')){
			$this->insert_nhomdm();
		}

		if ($this->input->get('ma')) {
			$data['thongtin'] = $this->get_thongtin_ma();
		}

		// Gọi đến function update nhóm danh mục
		if ($this->input->post('capnhat')) {
			$this->update_nhomdm();
		}
		// Gọi đến function delete thể loại
		if ($this->input->post('del')) {
			$this->delete_theloai();
		}


		$data['stt']            = 1;
		$data['theloai']        = $this->Mnhomdanhmuc->get_nhomdanhmuc();
		foreach ($data['theloai'] as $key => $value) {
			$data['theloai'][$key]['soluong']=$this->Mnhomdanhmuc->get_slnhomdm($value['PK_iMaNhomDM']);
		}
		$data['message'] 	= getMessages();
		$temp['data']     	= $data;
		$temp['template'] 	='danhmuc/Vnhomdanhmuc';
		$this->load->view('layout_backend/Vlayout',$temp);
	}

	public function insert_nhomdm()
	{
		$data['sTenNhomDM'] = $this->input->post('tennhomdm');
		$data['sTrangThai'] = $this->input->post('status');
		if(!empty($data['sTenNhomDM'])){

			$checkTenNhomDM = $this->Mnhomdanhmuc->checkTruncateTenNhomDM($data['sTenNhomDM']);
			if ($checkTenNhomDM > 0){
				setMessages('error','','Tên nhóm danh mục đã tồn tại. Vui lòng thử lại!');
				return redirect(base_url().'nhom-danh-muc');
			}

			$row 				= $this->Mnhomdanhmuc->insert_nhomdanhmuc($data);

			if ($row > 0) {
				setMessages('success','','Thêm nhóm danh mục thành công!');
			}
			else
			{
				setMessages('error','','Thêm nhóm danh mục không thành công!');
			}
			redirect(base_url().'nhom-danh-muc');
		}
		else{
			setMessages('warning','','Tên nhóm danh mục không được để trống!');
			redirect(base_url().'nhom-danh-muc');
		}

	}

	// Function lấy ra thông tin theo mã
	public function get_thongtin_ma(){
		$matheloai = $this->input->get('ma');
		// pr($matheloai);
		$thongtin = $this->Mnhomdanhmuc->get_nhomdm_ma($matheloai);
		// pr($thongtin);
		return $thongtin;
	}

	public function update_nhomdm(){
		$ma 					= $this->input->get('ma');
		$thongtin['sTenNhomDM'] = $this->input->post('tennhomdm');
		$thongtin['sTrangThai'] = $this->input->post('status');

		if(!empty($thongtin['sTenNhomDM'])){
			$result = $this->Mnhomdanhmuc->update_nhomdanhmuc($ma, $thongtin);

			// pr($result);
			if($result > 0){
				setMessages('success','','Cập nhật nhóm danh mục thành công !');
				return redirect(base_url().'nhom-danh-muc');
			}
			else{
				setMessages('error','','Cập nhật nhóm danh mục không thành công !');
				return redirect(base_url().'nhom-danh-muc');
			}
		}
		else{
			setMessages('warning','','Tên nhóm danh mục không được để trống!');
			redirect(base_url().'nhom-danh-muc');
		}

	}

	public function delete_theloai()
	{
		$matl = $this->input->post('del');
		$row = $this->Mnhomdanhmuc->delete_nhomdanhmuc($matl);
		if ($row > 0) {
			setMessages('success','','Xoá nhóm danh mục thành công !');
			return redirect(base_url().'nhom-danh-muc');
		}
		else{
			setMessages('error','','Xoá nhóm danh mục không thành công !');
			return redirect(base_url().'nhom-danh-muc');
		}
	}
}
