<?php
/**
 * Created by Tuyên Đỗ Thị
 * Date: 09/04/2020
 * Time: 09:55 PM
 */

class Creportdoanhthu extends MY_Controller
{
	public $Mreportdoanhthu;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('reports/Mreportdoanhthu', 'Mreportdoanhthu');
		$this->Mreportdoanhthu = new Mreportdoanhthu();
	}

	public function index()
	{
		$tab = $this->input->get('tab');
		$ngay = $this->input->get('ngay');
		if (empty($ngay)){
			$ngay = date('Y-m-d');
		}
		$thang = $this->input->get('thang');
		if (empty($thang)){
			$thang = date('m');
		}
		$nam = $this->input->get('nam');
		if (empty($nam)){
			$nam = date('Y');
		}
		$data = array(
			'tongdoanhthungay'	=> $this->Mreportdoanhthu->get_tongdoanhthu($ngay),
			'doanhthunhomsp'	=> $this->Mreportdoanhthu->get_doanhthunhomsp($ngay),
			'nhomsanpham'		=> $this->Mreportdoanhthu->get_nhomsanpham(),
			'tempArr'			=> array(),
			'rangeYear'			=> $this->Mreportdoanhthu->get_rangeyear(),
			'tongdoanhthuthang'	=> $this->Mreportdoanhthu->get_tongdoanhthu($nam.'-'.$thang),
			'tongtiennhaphang'	=> $this->Mreportdoanhthu->get_tongtiennhaphang($nam.'-'.$thang),
			'tongtienhuyhang'	=> $this->Mreportdoanhthu->get_tongtienhuyhang($nam.'-'.$thang),
			'doanhthutungngay'	=> $this->Mreportdoanhthu->get_doanhthutungngay($nam.'-'.$thang),
			'tongdoanhthunam'	=> $this->Mreportdoanhthu->get_tongdoanhthu($nam),
			'tongtiennhapnam'	=> $this->Mreportdoanhthu->get_tongtiennhaphang($nam),
			'tongtienhuynam'	=> $this->Mreportdoanhthu->get_tongtienhuyhang($nam),
			'doanhthutungthang'	=> $this->Mreportdoanhthu->get_doanhthutungthang($nam),
			'tab'				=> (empty($tab) ? 'tab1' : $tab),
			'ngay'				=> $ngay,
			'thang'				=> $thang,
			'nam'				=> $nam
		);
		$temp['data']     	= $data;
		$temp['template'] 	= 'reports/Vreportdoanhthu';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
}