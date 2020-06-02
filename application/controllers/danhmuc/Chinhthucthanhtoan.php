<?php

class Chinhthucthanhtoan extends MY_Controller
{
	public $Mhinhthucthanhtoan;

	public function __construct() {
		parent::__construct();
		$this->load->model('danhmuc/Mhinhthucthanhtoan','Mhinhthucthanhtoan');
		$this->Mhinhthucthanhtoan = new Mhinhthucthanhtoan();
	}

	public function index()
	{
		if($this->input->post('action')){
			$action = $this->input->post('action');
			switch ($action) {
				case 'get_hinhthuc':
					$this->get_HTTT();
					break;
			}
		}

		if($this->input->post('btnLuuHT')){
			$this->insert_hinhthuc();
		}

		if($this->input->post('btnCapNhatHT')){
			$this->update_hinhthuc();
		}

		if($this->input->post('btnDelHT')){
			$this->delete_hinhthuc();
		}
		$data['stt']            = 1;
		$data['message'] 		= getMessages();
		$data['hinhthuc']		= $this->Mhinhthucthanhtoan->get_hinhthucthanhtoan();
		$temp['data']     		= $data;
		$temp['template'] 		='danhmuc/Vhinhthucthanhtoan';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
	public function insert_hinhthuc(){
		$hinhthuc['sTenHinhThuc']		= $this->input->post('txtHinhThucTT');
		$hinhthuc['sMoTa']				= $this->input->post('txtMoTa');

		$checkHinhThuc 					= $this->Mhinhthucthanhtoan->checkHTTT($hinhthuc['sTenHinhThuc']);
		if ($checkHinhThuc > 0){
			setMessages('error','','Hình thức thanh toán này đã tồn tại. Vui lòng thử lại!');
			return redirect(base_url().'hinhthucthanhtoan');
		}
		$result 	= $this->Mhinhthucthanhtoan->insert_hinhthucthanhtoan($hinhthuc);
		if($result > 0){
			setMessages('success','','Thêm hình thức thanh toán thành công !');
			return redirect(base_url().'hinhthucthanhtoan');
		}
		else{
			setMessages('error','','Thêm hình thức thanh toán không thành công!');
			return redirect(base_url().'hinhthucthanhtoan');
		}

	}
	public function get_HTTT(){
		$mahinhthuc 		= $this->input->post('PK_iMaHinhThuc');
		$thongtinHT			= $this->Mhinhthucthanhtoan->get_hinhthucTT($mahinhthuc);
		echo json_encode($thongtinHT);
		exit();
	}
	public function update_hinhthuc(){
		$mahinhthuc					= $this->input->post('btnCapNhatHT');
		$hinhthuc['sTenHinhThuc']	= $this->input->post('txtHTTT');
		$hinhthuc['sMoTa']			= $this->input->post('mota');

		$row  = $this->Mhinhthucthanhtoan->update_hinhthucTT($mahinhthuc, $hinhthuc);
		if ($row > 0) {
			setMessages('success','','Cập nhật hình thức thanh toán thành công !');
			return redirect(base_url().'hinhthucthanhtoan');
		}
		else{
			setMessages('error','','Cập nhật hình thức thanh toán không thành công !');
			return redirect(base_url().'hinhthucthanhtoan');
		}
	}
	public function delete_hinhthuc(){
		$maHT 			= $this->input->post('btnDelHT');
		$row 			= $this->Mhinhthucthanhtoan->delete_hinhthucthanhtoan($maHT);
		if ($row > 0) {
			setMessages('success','','Xoá hình thức thanh toán thành công !');
			return redirect(base_url().'hinhthucthanhtoan');
		}
		else{
			setMessages('error','','Xoá hình thức thanh toán không thành công !');
			return redirect(base_url().'hinhthucthanhtoan');
		}
	}
}
