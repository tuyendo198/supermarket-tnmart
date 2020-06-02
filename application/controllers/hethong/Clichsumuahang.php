<?php

class Clichsumuahang extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('hethong/Mlichsumuahang', 'Mlichsumuahang');
		$this->Mlichsumuahang 		= new Mlichsumuahang();
	}

	public function index()
	{
		$matk = $this->input->get('id');
		$data = array(
			'listKhachHang' => $this->Mlichsumuahang->getDanhSachKhachHang(),
			'matk'			=> $matk
		);

		if (!empty($matk)){
			$data['listDonHang'] = $this->Mlichsumuahang->getDonHangTaiKhoan($matk);
			$data['info'] = array_values(array_filter($data['listKhachHang'], function ($v){
				return ($v['PK_iMaTaiKhoan'] == $this->input->get('id'));
			}))[0];
		}

		$temp['data']     		= $data;
		$temp['template'] 		= 'hethong/Vlichsumuahang';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
}
?>
