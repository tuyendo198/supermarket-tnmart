<?php
/**
 * Created by Tuyên Đỗ Thị
 * Date: 05/04/2020
 * Time: 03:20 PM
 */

class Creportsanpham extends MY_Controller
{
	public $Mreportsanpham;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('reports/Mreportsanpham', 'Mreportsanpham');
		$this->Mreportsanpham 		= new Mreportsanpham();
	}

	public function index()
	{
		$year = $this->input->get('year');
		$month = $this->input->get('month');
		$sanpham = $this->input->get('sanpham');
		if (empty($year)) {
			$year = date('Y');
		}
		$data = array(
			'listsanpham'		=> $this->Mreportsanpham->get_sanpham($year,$month,$sanpham),
			'rangeYear' 		=> $this->Mreportsanpham->get_rangeyear(),
			'year'				=> $year,
			'month'				=> $month,
			'sanpham'			=> $sanpham
		);
		$temp['data']     		= $data;
		$temp['template'] 		= 'reports/Vreportsanpham';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
}
