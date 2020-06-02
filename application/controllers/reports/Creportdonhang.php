<?php
/**
 * Created by Tuyên Đỗ Thị
 * Date: 01/04/2020
 * Time: 10:12 PM
 */

class Creportdonhang extends MY_Controller
{
	public $Mreportdonhang;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('reports/Mreportdonhang', 'Mreportdonhang');
		$this->Mreportdonhang 		= new Mreportdonhang();
	}

	public function index()
	{
		$year = $this->input->get('year');
		$month = $this->input->get('month');
		$hinhthuc = $this->input->get('hinhthuc');
		$khachhang = $this->input->get('khachhang');
		if (empty($year)) {
			$year = date('Y');
		}
		$data = array(
			'listdonhang'	=> $this->Mreportdonhang->get_donhang($year,$month,$hinhthuc,$khachhang),
			'hinhthuctt'	=> $this->Mreportdonhang->get_hinhthuctt(),
			'rangeYear' 	=> $this->Mreportdonhang->get_rangeyear(),
			'year'			=> $year,
			'month'			=> $month,
			'hinhthuc'		=> $hinhthuc,
			'khachhang'		=> $khachhang
		);
		$temp['data']     		= $data;
		$temp['template'] 		= 'reports/Vreportdonhang';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
}