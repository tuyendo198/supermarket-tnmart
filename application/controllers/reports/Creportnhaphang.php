<?php
/**
 * Created by Tuyên Đỗ Thị
 * Date: 30/03/2020
 * Time: 10:36 AM
 */

class Creportnhaphang extends MY_Controller
{
	public $Mreportnhaphang;
	public function __construct() {
		parent::__construct();
		$this->load->model('reports/Mreportnhaphang', 'Mreportnhaphang');
		$this->Mreportnhaphang 		= new Mreportnhaphang();
	}

	public function index()
	{
		$ngaynhap = $this->input->get('ngaynhap');
		$nhacc = $this->input->get('nhacc');
		$sanpham = $this->input->get('sanpham');
		$nguoinhap = $this->input->get('nguoinhap');
		$data = array(
			'listphieunhap'	=> $this->Mreportnhaphang->get_phieunhap($ngaynhap,$nhacc,$sanpham,$nguoinhap),
			'nhacungcap'	=> $this->Mreportnhaphang->get_nhacungcap(),
			'sp' 			=> $this->Mreportnhaphang->get_sanpham(),
			'ngaynhap'		=> $ngaynhap,
			'nhacc'			=> $nhacc,
			'sanpham'		=> $sanpham,
			'nguoinhap'		=> $nguoinhap
		);
		$temp['data']     		= $data;
		$temp['template'] 		= 'reports/Vreportnhaphang';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
}
