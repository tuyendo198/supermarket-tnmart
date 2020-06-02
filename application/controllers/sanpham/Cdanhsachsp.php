<?php

class Cdanhsachsp extends MY_Controller
{
	public $Mdanhsachsp;

	public function __construct() {
		parent::__construct();
		$this->load->model('sanpham/Mdanhsachsp', 'Mdanhsachsp');
		$this->Mdanhsachsp = new Mdanhsachsp();
	}

	public function index() {
		if($this->input->post('action')){
			$action = $this->input->post('action');
			switch ($action) {
				case 'get_info_sp':
					$this->get_thongtin_sp();
					break;
			}
		}

		if($this->input->post('btnThem')){
			$this->insert_sanpham();
		}
		if($this->input->post('btnCapnhat')){
			$this->update_sanpham();
		}
		if ($this->input->post('btnThietLap')){
			$this->setup_km();
		}

		$data = array(
			'danhsachsp'		=> $this->Mdanhsachsp->get_sanpham(),
			'soluongcon'		=> $this->Mdanhsachsp->get_soluongcon(),
			'danhmuc'			=> $this->Mdanhsachsp->get_danhmuc(),
			'nhasx'				=> $this->Mdanhsachsp->get_nhasx(),
			'loaiKhuyenMai' 	=> $this->Mdanhsachsp->getLoaiKhuyenMai()
		);

		$data['stt']            = 1;

		$temp['data']     		= $data;
		$temp['template'] 		='sanpham/Vdanhsachsp';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
	public function insert_sanpham(){
		$masp_max 				= $this->Mdanhsachsp->get_masp_max();
		$newMaSP 				= generatePrimary($masp_max);
		$tt['PK_sMaSP']			= $newMaSP;
		$tt['sTenSP']			= $this->input->post('txtTenSP');
		$tt['fGiaSP']			= $this->input->post('txtGia');
		$tt['sMoTa']			= $this->input->post('txtMota');
		$tt['sThongTinSP']		= $this->input->post('chitietsp');
		$tt['sDonViTinh']		= $this->input->post('txtDVT');
		$tt['FK_sMaNhomSP']		= $this->input->post('ddlNhomSP');
		$tt['FK_sMaNSX']		= $this->input->post('ddlNSX');

		if($_FILES["anhdaidien"] || $_FILES("anhsp_1") || $_FILES("anhsp_2") || $_FILES("anhsp_3") || $_FILES("anhsp_4")){
			$config['upload_path'] 		= 'assets/anhsanpham/';
			$config['allowed_types'] 	= '*';
			$config['max_size'] 		= 100000;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$name = seotag($tt['sTenSP']).'_'.time();

			if ($_FILES['anhdaidien']['size'] > 0) {
				$anhdaidien 		= $name.'.'.pathinfo($_FILES['anhdaidien']['name'], PATHINFO_EXTENSION);
				$_FILES['filepost'] = array(
					'name' 		=> $anhdaidien,
					'type' 		=> $_FILES['anhdaidien']['type'],
					'tmp_name' 	=> $_FILES['anhdaidien']['tmp_name'],
					'error' 	=> $_FILES['anhdaidien']['error'],
					'size'		=> $_FILES['anhdaidien']['size']
				);
				if ($this->upload->do_upload("filepost")) {
					$tt['sAnhDaiDien'] = 'assets/anhsanpham/' . $anhdaidien;
				} else {
					$errors = $this->upload->display_errors();
					setMessages('error', '', 'Có lỗi xảy ra. Vui lòng thử lại!');
					return redirect(base_url() . 'danh-sach-san-pham');
				}
			}
			else{
				$tt['sAnhDaiDien']	= 'assets/img/avatars/logo.jpg';
			}

			for($i = 1; $i <= 4; $i++){
				if (($_FILES['anhsp_'.$i]['size'] <= 0)){
					$album[$i-1]['sLink'] = '';
					$album[$i-1]['FK_sMaSP'] = $newMaSP;
					continue;
				}
				$_FILES['filepost'.$i] = array(
					'name' 		=> $name.$i.'.'.pathinfo($_FILES['anhsp_'.$i]['name'], PATHINFO_EXTENSION),
					'type' 		=> $_FILES['anhsp_'.$i]['type'],
					'tmp_name' 	=> $_FILES['anhsp_'.$i]['tmp_name'],
					'error' 	=> $_FILES['anhsp_'.$i]['error'],
					'size' 		=> $_FILES['anhsp_'.$i]['size']
				);

				if($this->upload->do_upload("filepost".$i)){
					$uploadData = $this->upload->data();
					$album[$i-1]['sLink']		= 'assets/anhsanpham/'.$uploadData['file_name'];
					$album[$i-1]['FK_sMaSP'] 	= $newMaSP;
				}
				else{
					$errors = $this->upload->display_errors();
					setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
					return redirect(base_url().'danh-sach-san-pham');
				}
			}
			$checkSP 		= $this->Mdanhsachsp->checksp($tt['sTenSP']);
			if ($checkSP > 0){
				setMessages('error','','Sản phẩm đã tồn tại. Vui lòng thử lại!');
				return redirect(base_url().'danh-sach-san-pham');
			}

			$result = $this->Mdanhsachsp->insert_sp($tt, $album);
			if($result > 0){
				setMessages('success','','Thêm sản phẩm thành công !');
				return redirect(base_url().'danh-sach-san-pham');
			}
			else{
				setMessages('error','','Thêm sản phẩm không thành công!');
				return redirect(base_url().'danh-sach-san-pham');
			}
		}
	}
	public function get_thongtin_sp(){
		$masp = $this->input->post('PK_sMaSP');

		$data['tt'] 		= $this->Mdanhsachsp->get_tt_sp($masp);
		$data['album'] 		= $this->Mdanhsachsp->get_link_sp($masp);

		echo json_encode($data);
		exit();
	}

	public function update_sanpham(){
		$masp 						= $this->input->post('btnCapnhat');
		$thongtinsp['sTenSP']		= $this->input->post('tensp');
		$thongtinsp['fGiaSP']		= $this->input->post('giasp');
		$thongtinsp['sMoTa']		= $this->input->post('mota');
		$thongtinsp['sThongTinSP']	= $this->input->post('detail_sp');
		$thongtinsp['sDonViTinh']	= $this->input->post('donvitinh');
		$thongtinsp['FK_sMaNhomSP']	= $this->input->post('nhomsp');
		$thongtinsp['FK_sMaNSX']	= $this->input->post('nhasx');

		if($_FILES["anhdaidien"] || $_FILES("anhsp_1") || $_FILES("anhsp_2") || $_FILES("anhsp_3") || $_FILES("anhsp_4")){
			$config['upload_path'] 		= 'assets/anhsanpham/';
			$config['allowed_types'] 	= '*';
			$config['max_size'] 		= 100000;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$name = seotag($thongtinsp['sTenSP']).'_'.time();

			if ($_FILES['anhdaidien']['size'] > 0) {
				$anhdaidien = $name . '.' . pathinfo($_FILES['anhdaidien']['name'], PATHINFO_EXTENSION);
				$_FILES['filepost'] = array(
					'name' => $anhdaidien,
					'type' => $_FILES['anhdaidien']['type'],
					'tmp_name' => $_FILES['anhdaidien']['tmp_name'],
					'error' => $_FILES['anhdaidien']['error'],
					'size' => $_FILES['anhdaidien']['size']
				);
				if ($this->upload->do_upload("filepost")) {
					$thongtinsp['sAnhDaiDien'] = 'assets/anhsanpham/' . $anhdaidien;
				} else {
					$errors = $this->upload->display_errors();
					setMessages('error', '', '1. Có lỗi xảy ra. Vui lòng thử lại!');
					return redirect(base_url() . 'danh-sach-san-pham');
				}
			}

			for($i = 1; $i <= 4; $i++){
				if (($_FILES['anhsp_'.$i]['size'] <= 0)){
					continue;
				}
				$_FILES['filepost'.$i] = array(
					'name' 		=> $name.$i.'.'.pathinfo($_FILES['anhsp_'.$i]['name'], PATHINFO_EXTENSION),
					'type' 		=> $_FILES['anhsp_'.$i]['type'],
					'tmp_name' 	=> $_FILES['anhsp_'.$i]['tmp_name'],
					'error' 	=> $_FILES['anhsp_'.$i]['error'],
					'size' 		=> $_FILES['anhsp_'.$i]['size']
				);

				if($this->upload->do_upload("filepost".$i)){
					$uploadData = $this->upload->data();
					$album[$i]['sLink']		= 'assets/anhsanpham/'.$uploadData['file_name'];
				}
				else{
					$errors = $this->upload->display_errors();
					setMessages('error','','2. Có lỗi xảy ra. Vui lòng thử lại!');
					return redirect(base_url().'danh-sach-san-pham');
				}
			}

			$arrAnh 			= $this->Mdanhsachsp->get_link_sp($masp);
			$sl_anhsp			= count($arrAnh);
			foreach ($album as $k => $v){
				if ($k <= $sl_anhsp){
					$result = $this->Mdanhsachsp->update_anh_sp($arrAnh[$k-1]['PK_iMaAnh'], $album[$k]);
				}
				else{
					$arrAnhIns = array(
						'sLink' => $v['sLink'],
						'FK_sMaSP' => $masp
					);
					$result += $this->Mdanhsachsp->insert_anhsp($arrAnhIns);
				}
			}
			$checkSP 		= $this->Mdanhsachsp->checksp($thongtinsp['sTenSP'], $masp);
			if ($checkSP > 0){
				setMessages('error','','Sản phẩm đã tồn tại. Vui lòng thử lại!');
				return redirect(base_url().'danh-sach-san-pham');
			}

			$result += $this->Mdanhsachsp->update_sp($masp, $thongtinsp);

			if($result > 0){
				setMessages('success','','Cập nhật sản phẩm thành công!');
				return redirect(base_url().'danh-sach-san-pham');
			}
			else{
				setMessages('error','','Cập nhật sản phẩm không thành công!');
				return redirect(base_url().'danh-sach-san-pham');
			}
		}
	}
	public function setup_km(){
		$loaiHinh 	= $this->input->post('ddlLoaiHinhKM');
	}
}
