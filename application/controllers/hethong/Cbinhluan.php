<?php

class Cbinhluan extends MY_Controller
{
	public $Mbinhluan;
	public function __construct() {
		parent::__construct();
		$this->load->model('hethong/Mbinhluan', 'Mbinhluan');
		$this->Mbinhluan 		= new Mbinhluan();
	}

	public function index()
	{
		if ($this->input->post('btnDelete')) {
			$this->deleteBinhLuan();
		}

		$data = array(
			'binhluan'		=> $this->Mbinhluan->get_listbinhluan()
		);

		$temp['data']     		= $data;
		$temp['template'] 		= 'hethong/Vbinhluan';
		$this->load->view('layout_backend/Vlayout',$temp);
	}

	public function deleteBinhLuan()
	{
		$maBL = $this->input->post('btnDelete');
		$af_row = $this->Mbinhluan->deleteBinhLuan($maBL);
		if ($af_row > 0){
			setMessages('success','','Xoá bình luận thành công!');
		}
		else{
			setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
		}
		return redirect('binh-luan');
	}
}
