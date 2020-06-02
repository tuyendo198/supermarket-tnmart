<?php

class Ctaodonhang extends MY_Controller
{
	public $Mtaodonhang;
	public function __construct() {
		parent::__construct();
		$this->load->model('giaodich/Mtaodonhang', 'Mtaodonhang');
		$this->Mtaodonhang 		= new Mtaodonhang();
	}

	public function index() {
		$action = $this->input->post('action');
		switch ($action) {
			case 'getInfoProduct':
				$this->getInfoProduct();
				break;
		}
		if ($this->input->post('savedonhang')){
			$this->saveDonHang();
		}
		$mdh = '';
		if ($this->input->get('mdh')){
			$mdh = $this->input->get('mdh');
		}
		$data = array(
			'listProduct' => $this->Mtaodonhang->getListProduct(),
			'thongTinDon' => $this->Mtaodonhang->getChiTietDonHang($mdh)
		);
		$temp['data']     		= $data;
		$temp['template'] 		= 'giaodich/Vtaodonhang';
		$this->load->view('layout_backend/Vlayout',$temp);
	}

	public function getInfoProduct()
	{
		$masp = $this->input->post('maSP');
		$info = $this->Mtaodonhang->getInfoProduct($masp);
		echo json_encode($info);
		exit();
	}

	public function saveDonHang()
	{
		$session = getSession();
		$masp = $this->input->post('masp');
		$soluong = $this->input->post('soluong');
		$dongia = $this->input->post('dongia');
		// đơn hàng được tạo với mã tt giao hàng mặc định là 1 nên trong db phải tạo bản ghi với mã tt giao hàng là 1 của tài khoản admin
		$madonhang = $this->Mtaodonhang->createDonHang();
		$chitietdonhang = array();
		foreach ($masp as $k => $v) {
			$chitietdonhang[] = array(
				'FK_sMaDonHang' => $madonhang,
				'FK_sMaSP' 		=> $v,
				'iSoLuong' 		=> $soluong[$k],
				'fDonGia' 		=> $dongia[$k]
			);
		}
		$row = $this->Mtaodonhang->saveChiTietDonHang($chitietdonhang);
		if ($row > 0){
			setMessages('success','','Lưu đơn hàng thành công');
			return redirect('tao-don-hang?mdh='.$madonhang);
		}
		else{
			setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
			return redirect('tao-don-hang');
		}
	}
}
