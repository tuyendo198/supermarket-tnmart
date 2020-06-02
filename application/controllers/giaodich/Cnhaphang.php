<?php

class Cnhaphang extends MY_Controller
{
	public $Mnhaphang;
	public function __construct() {
		parent::__construct();
		$this->load->model('giaodich/Mnhaphang', 'Mnhaphang');
		$this->Mnhaphang = new Mnhaphang();
	}
	public function index(){
		if($this->input->post('action')){
			$action = $this->input->post('action');
			switch ($action) {
				case 'get_info_phieu':
					$this->get_thongtinphieu();
					break;
			}
		}

		if($this->input->post('btnLuu')){
			$this->insert_phieunhap();
		}
		if($this->input->post('btnCapNhat')){
			$this->update_phieunhap();
		}
		$ma 					= $this->input->get('ma');
		$type 					= $this->input->get('type');
		if($ma && ($type == 'print' || $type == 'view')){
			$data = array(
				'type'			=> $type,
				'chitietphieu'	=> $this->Mnhaphang->get_chitietphieunhap($ma),
				'message' 		=> getMessages()
			);
			$this->parser->parse('giaodich/Vchitietphieunhap', $data);
		}
		else{
			$phieunhap				= $this->Mnhaphang->get_maphieunhap_max();
			$data = array(
				'maphieu'		=> generatePrimary($phieunhap),
				'sp'			=> $this->Mnhaphang->get_sanpham(),
				'dsnv'			=> $this->Mnhaphang->get_dsnhanvien(),
				'nhacungcap'	=> $this->Mnhaphang->get_nhacungcap()
			);
			if ($ma){
				$data['chitietphieu'] = $this->Mnhaphang->get_chitietphieunhap($ma);
				$data['mapn'] = $ma;
			}

			$temp['data']     		= $data;
			$temp['template'] 		='giaodich/Vnhaphang';
			$this->load->view('layout_backend/Vlayout',$temp);
		}
	}
	public function insert_phieunhap(){
		$session 						= getSession();
		$maphieunhap					= $this->Mnhaphang->get_maphieunhap_max();
		$ma 							= generatePrimary($maphieunhap);
		$phieunhap['PK_sMaPN']			= $ma;
		$phieunhap['dNgaynhap']			= $this->input->post('tgiannhap');
		$phieunhap['FK_iMaTaiKhoan']	= $session['mataikhoan'];
		$phieunhap['FK_sMaNCC']			= $this->input->post('ddlNhaCC');

		$ddlMatHang						= $this->input->post('ddlMatHang');
		$ddlNgaySX						= $this->input->post('ngaysanxuat');
		$ddlHanSD						= $this->input->post('hansudung');
		$soluong						= $this->input->post('soluong');
		$dongia							= $this->input->post('dongia');

		if(empty($phieunhap['FK_sMaNCC'])){
			setMessages('error','','Vui lòng chọn nhà cung cấp');
			return redirect(base_url().'nhap-hang');
		}
		$listgiabanmoi = $this->input->post('giabanmoi');
		$arrUdtGiaBan = array();
		if (!empty($listgiabanmoi)){
			foreach ($listgiabanmoi as $k => $v) {
				$arrUdtGiaBan[] = array(
					'PK_sMaSP' 	=> $k,
					'fGiaSP'	=> $v
				);
			}
		}

		$ctphieunhap = array();
		foreach ($ddlMatHang as $k => $v){
			if (!empty($v) && $soluong[$k] > 0){
				$ctphieunhap[] = array(
					'FK_sMaPN' 		=> $ma,
					'FK_sMaSP' 		=> $v,
					'dNgaySanXuat' 	=> $ddlNgaySX[$k],
					'dHanSuDung'	=> $ddlHanSD[$k],
					'iSoLuongNhap' 	=> $soluong[$k],
					'fDonGiaNhap'	=> $dongia[$k]
				);
			}
		}
		$result = $this->Mnhaphang->insert_ctphieunhap($phieunhap, $ctphieunhap);
		if (!empty($arrUdtGiaBan)){
			$af_row = $this->Mnhaphang->update_giabanmoi($arrUdtGiaBan);
		}

		if($result > 0){
			setMessages('success','','Thêm phiếu nhập thành công!');
		}
		else{
			setMessages('error','','Thêm phiếu nhập không thành công!');
		}
		return redirect(base_url().'danh-sach-phieu-nhap');
	}
	
	public function update_phieunhap(){
		$maphieu					= $this->input->post('btnCapNhat');
		$phieu['dNgaynhap']			= $this->input->post('tgiannhap');
		$phieu['FK_sMaNCC']			= $this->input->post('ddlNhaCC');
		$FK_sMaSP					= $this->input->post('ddlMatHang');
		$dNgaySanXuat				= $this->input->post('ngaysanxuat');
		$dHanSuDung					= $this->input->post('hansudung');
		$iSoLuongNhap				= $this->input->post('soluong');
		$fDonGiaNhap				= $this->input->post('dongia');


		$listgiabanmoi = $this->input->post('giabanmoi');
		$arrUdtGiaBan = array();
		if (!empty($listgiabanmoi)){
			foreach ($listgiabanmoi as $k => $v) {
				$arrUdtGiaBan[] = array(
					'PK_sMaSP' 	=> $k,
					'fGiaSP'	=> $v
				);
			}
		}

		$ctphieu = array();
		foreach ($FK_sMaSP as $k => $v){
			$ctphieu[] = array(
				'FK_sMaSP' => $v,
				'dNgaySanXuat'	=> $dNgaySanXuat[$k],
				'dHanSuDung'	=> $dHanSuDung[$k],
				'iSoLuongNhap'	=> $iSoLuongNhap[$k],
				'fDonGiaNhap'	=> $fDonGiaNhap[$k],
				'FK_sMaPN'	=> $maphieu
			);
		}

		$result		= $this->Mnhaphang->update_phieunhap($maphieu, $phieu, $ctphieu);
		if (!empty($arrUdtGiaBan)){
			$af_row = $this->Mnhaphang->update_giabanmoi($arrUdtGiaBan);
		}

		if($result > 0){
			setMessages('success','','Cập nhật phiếu nhập thành công!');
		}
		else{
			setMessages('error','','Cập nhật phiếu nhập không thành công!');
		}
		return redirect(base_url().'danh-sach-phieu-nhap');
	}
}
