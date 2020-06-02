<?php

class Ctrangthai extends MY_Controller
{
	public $Mtrangthai;

	public function __construct() {
		parent::__construct();
		$this->load->model('danhmuc/Mtrangthai','Mtrangthai');
		$this->Mtrangthai = new Mtrangthai();
	}

	public function index()
	{
		if($this->input->post('btnLuuTT')){
			$this->insert_status();
		}
		if($this->input->get('ma')){
			$ma					= $this->input->get('ma');
			$data['thongtin']	= $this->Mtrangthai->get_ma_status($ma);
		}
		// Gọi đến function update nhóm danh mục
		if ($this->input->post('btnCapNhat')) {
			$this->update_status();
		}
		// Gọi đến function delete thể loại
		if ($this->input->post('btnDelTT')) {
			$this->delete_status();
		}
		$data['stt']            = 1;
		$data['message'] 		= getMessages();
		$data['status']			= $this->Mtrangthai->get_trangthai();
		$temp['data']     		= $data;
		$temp['template'] 		='danhmuc/Vtrangthai';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
	public function insert_status(){
		$data['sTenTrangThai']		= $this->input->post('txtTrangThai');
		if(!empty($data['sTenTrangThai'])){
			$checkStatus 			= $this->Mtrangthai->checkStatus($data['sTenTrangThai']);
			if ($checkStatus > 0){
				setMessages('error','','Trạng thái đã tồn tại. Vui lòng thử lại!');
				redirect(base_url().'status');
			}

			$row 				= $this->Mtrangthai->insert_trangthai($data);
			if ($row > 0) {
				setMessages('success','','Thêm trạng thái thành công!');
			}
			else
			{
				setMessages('error','','Thêm trạng thái không thành công!');
			}
			redirect(base_url().'status');
		}
		else{
			setMessages('warning','','Tên trạng thái không được để trống!');
			redirect(base_url().'status');
		}
	}
	public function update_status(){
		$ma 						= $this->input->get('ma');
		$thongtin['sTenTrangThai'] 	= $this->input->post('txtTrangThai');

		if(!empty($thongtin['sTenTrangThai'])){
			$checkStatus 			= $this->Mtrangthai->checkStatus($thongtin['sTenTrangThai']);
			if ($checkStatus > 0){
				setMessages('error','','Trạng thái đã tồn tại. Vui lòng thử lại!');
				redirect(base_url().'status');
			}
			$result = $this->Mtrangthai->update_trangthai($ma, $thongtin);

			if($result > 0){
				setMessages('success','','Cập nhật trạng thái thành công !');
				return redirect(base_url().'status');
			}
			else{
				setMessages('error','','Cập nhật trạng thái không thành công !');
				return redirect(base_url().'status');
			}
		}
		else{
			setMessages('warning','','Tên trạng thái không được để trống!');
			redirect(base_url().'status');
		}

	}
	public function delete_status()
	{
		$mastatus 		= $this->input->post('btnDelTT');
		$row 			= $this->Mtrangthai->delete_trangthai($mastatus);
		if ($row > 0) {
			setMessages('success','','Xoá trạng thái thành công !');
			return redirect(base_url().'status');
		}
		else{
			setMessages('error','','Xoá trạng thái không thành công !');
			return redirect(base_url().'status');
		}
	}
}
