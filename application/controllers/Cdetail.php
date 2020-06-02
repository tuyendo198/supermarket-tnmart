<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Cdetail extends CI_Controller {
	public $Mdetail;
	public function __construct() {
		parent::__construct();
		$this->load->model('Mdetail', 'Mdetail');
		$this->Mdetail 	= new Mdetail();
	}

	public function index() {
		$session = getSession('info_khachhang');
		if ($this->input->get('ma')){
			$masp 	= $this->input->get('ma');
		}
		$action = $this->input->post('action');
		switch ($action) {
			case 'rateProduct':
				$this->rateProduct($masp);
				break;
		}

		if ($this->input->post('comment')){
			$this->insert_comment();
		}
		$data = array(
			'chitietsp' 	=> $this->Mdetail->get_chitietsp($masp),
			'list_comment'	=> $this->Mdetail->get_listComment($masp),
			'list_sp_lq'	=> $this->Mdetail->get_listSpLienQuan($masp),
			'rating'		=> $this->Mdetail->getRating($masp),
			'isBoughtThis' 	=> $this->Mdetail->checkIsBoughtProduct($masp, $session['mataikhoan'])
		);
		$temp['data']     = $data;
		$temp['template'] = 'layout_frontend/Vdetail';
		$this->load->view('layout_frontend/Vlayout',$temp);
	}

	public function insert_comment(){
		$session = getSession('info_khachhang');
		$masp = $this->input->get('ma');
		$comment['sNoiDungBL']	= $this->input->post('txtBinhluan');
		$comment['dThoiGianBL']	= date("Y-m-d");
		$comment['FK_sMaSP']	= $masp;
		$comment['FK_iMaTaiKhoan']	= $session['mataikhoan'];

		if (empty($comment['sNoiDungBL'])){
			setMessages('error','','Vui lòng nhập nội dung bình luận!');
			return redirect('detail?ma='.$masp);
		}

		$result	= $this->Mdetail->insert_binhluan($comment);
		if($result > 0){
			setMessages('success','','Bình luận thành công!');
		}
		else{
			setMessages('error','','Bình luận không thành công!');
		}
		return redirect('detail?ma='.$masp);
	}

	public function rateProduct($masp)
	{
		$session = getSession('info_khachhang');
		if (empty($masp)){
			echo json_encode(false);
			exit();
		}
		if (!$this->Mdetail->checkIsBoughtProduct($masp, $session['mataikhoan'])){
			echo json_encode(false);
			exit();
		}
		$rate = $this->input->post('rate');
		if ($rate < 1 || $rate > 5){
			$rate = 5;
		}
		$arrRate = array(
			'sNoiDungDG' 	=> 'Đánh giá '.$rate.'*',
			'iDiemSo'		=> $rate
		);
		$row = $this->Mdetail->saveRate($arrRate, $masp, $session['mataikhoan']);
		if ($row > 0){
			echo json_encode(true);
		}
		else{
			echo json_encode(false);
		}
		exit();
	}
} // End class
