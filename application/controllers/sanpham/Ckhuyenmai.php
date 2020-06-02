<?php

class Ckhuyenmai extends MY_Controller
{
	public $Mkhuyenmai;
	public function __construct() {
		parent::__construct();
		$this->load->model('sanpham/Mkhuyenmai', 'Mkhuyenmai');
		$this->Mkhuyenmai = new Mkhuyenmai();
	}

	public function index(){
		if ($this->input->post('save')){
			$this->save_khuyenMai();
		}
		if ($this->input->post('btnCapNhat')){
			$this->update_khuyenmai();
		}
		if ($this->input->post('btnDelKM')){
			$this->delete_khuyenmai();
		}
		$data = array(
			'loaiKhuyenMai' 		=> $this->Mkhuyenmai->getLoaiKhuyenMai(),
			'dsSanPham'				=> $this->Mkhuyenmai->getSpKhuyenMai(),
			'dsKhuyenMaiHienTai'	=> $this->Mkhuyenmai->getDsKhuyenMai()
		);
		$temp['data'] 			= $data;
		$temp['template'] 		= 'sanpham/Vkhuyenmai';
		$this->load->view('layout_backend/Vlayout', $temp);
	}

	public function save_khuyenMai()
	{
		$loaiHinh 	= $this->input->post('ddlLoaiHinhKM');
		$listSP 	= $this->input->post('spApDung');
		$soLuongAD 	= $this->input->post('soLuongAD');
		$tgbatdau 	= $this->input->post('tgbatdau');
		$tgketthuc 	= $this->input->post('tgketthuc');
		$arrIns 	= array();
		switch ($loaiHinh) {
			case 'MKM001': //km giảm giá
				$loaiGiamGia 	= $this->input->post('loaiGiamGia');
				$noidung 		= $this->input->post('noidungkm');
				if ($loaiGiamGia == '%'){
					$noidung .= '%';
				}
				foreach ($listSP as $k => $v) {
					$arrIns[] = array(
						'FK_sMaKM' 			=> $loaiHinh,
						'FK_sMaSP' 			=> $v,
						'dThoiGianBD' 		=> $tgbatdau,
						'dThoiGianKT' 		=> $tgketthuc,
						'sNoiDungKM' 		=> $noidung,
						'iSoLuongApDung' 	=> $soLuongAD
					);
				}
				break;

			case 'MKM002': //km tặng kèm
				$spTangKem = $this->input->post('spTangKem');
				foreach ($listSP as $k => $v) {
					$arrIns[] = array(
						'FK_sMaKM' 			=> $loaiHinh,
						'FK_sMaSP' 			=> $v,
						'dThoiGianBD' 		=> $tgbatdau,
						'dThoiGianKT' 		=> $tgketthuc,
						'sNoiDungKM' 		=> $spTangKem,
						'iSoLuongApDung' 	=> $soLuongAD
					);
				}
				break;

			default:
				setMessages('error', '', 'Vui lòng chọn loại hình khuyến mãi hợp lệ!');
				return redirect('khuyen-mai');
		}
		$rs = $this->Mkhuyenmai->insert_km($arrIns);
		if ($rs > 0){
			setMessages('success', '', 'Thêm khuyến mãi thành công');
		}
		else{
			setMessages('error', '', 'Có lỗi xảy ra. Vui lòng thử lại!');
		}
		return redirect('khuyen-mai');
	}
	// public function update_khuyenmai(){
	// 	$makm					= $this->input->get('ma');
	// 	$ttkm['dThoiGianBD']	= $this->input->post('tgbatdau');
	// 	$ttkm['dThoiGianKT']	= $this->input->post('tgketthuc');
	// 	$ttkm['FK_sMaSP']		= $this->input->post('spApDung[]');
	// 	$ttkm['iSoLuongApDung']	= $this->input->post('soLuongAD');

	// 	$result					= $this->Mkhuyenmai->update_km($makm, $ttkm);
	// 	if($result > 0){
	// 		setMessages('success','','Cập nhật khuyến mại thành công !');
	// 	}
	// 	else{
	// 		setMessages('error','','Cập nhật khuyến mại không thành công !');
	// 	}
	// 	return redirect(base_url().'khuyen-mai');
	// }
	// public function delete_khuyenmai(){
	// 	$makm 	= $this->input->post('btnDelKM');
	// 	$row 	= $this->Mkhuyenmai->del_km($makm);
	// 	if($row > 0){
	// 		setMessages('success','','Xoá khuyến mại thành công !');
	// 		return redirect(base_url().'khuyen-mai');
	// 	}
	// 	else{
	// 		setMessages('error','','Xoá khuyến mại không thành công !');
	// 		return redirect(base_url().'khuyen-mai');
	// 	}
	// }
}
