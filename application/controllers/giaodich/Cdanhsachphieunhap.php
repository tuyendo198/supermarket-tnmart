<?php

class Cdanhsachphieunhap extends MY_Controller
{
	public $Mdanhsachphieunhap;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('giaodich/Mdanhsachphieunhap', 'Mdanhsachphieunhap');
		$this->Mdanhsachphieunhap = new Mdanhsachphieunhap();
	}

	public function index()
	{
		if($this->input->post('btnDelPN')){
			$this->delete_phieunhap();
		}
		$data = array(
			'tt_phieunhap'	=> $this->Mdanhsachphieunhap->get_mathangdanhap()
		);

		$temp['data']     		= $data;
		$temp['template'] 		='giaodich/Vdanhsachphieunhap';
		$this->load->view('layout_backend/Vlayout',$temp);
	}

	public function delete_phieunhap(){
		$maphieu 	= $this->input->post('btnDelPN');
		$result		= $this->Mdanhsachphieunhap->del_phieu($maphieu);

		if($result > 0){
			setMessages('success','','Xoá phiếu nhập thành công!');
		}
		else{
			setMessages('error','','Xoá phiếu nhập không thành công!');
		}
		return redirect(base_url().'danh-sach-phieu-nhap');
	}
}
?>
