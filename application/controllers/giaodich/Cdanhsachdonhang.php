<?php

class Cdanhsachdonhang extends MY_Controller
{
	public $Mdanhsachdonhang;
	public function __construct() {
		parent::__construct();
		$this->load->model('giaodich/Mdanhsachdonhang', 'Mdanhsachdonhang');
		$this->Mdanhsachdonhang 	= new Mdanhsachdonhang();
	}

	public function index() {
		if($this->input->get('mdh')){
			$madh = $this->input->get('mdh');
			$type = $this->input->get('type');
			$data = array(
				'type'			=> $type,
				'thongTinDon' 	=> $this->Mdanhsachdonhang->getChiTietDonHang($madh),
				'maHD'			=> $madh
			);
			$this->parser->parse('giaodich/Vchitietdonhang', $data);
		}
		else{
			if ($this->input->post('chuyenTrangThai')){
				$madh = $this->input->post('chuyenTrangThai');
				$this->chuyenTrangThaiTiepTheo($madh);
			}
			if ($this->input->post('backTrangThai')){
				$madh = $this->input->post('backTrangThai');
				$this->chuyenTrangThaiTruoc($madh);
			}
			if ($this->input->post('huyDonHang')){
				$madh = $this->input->post('huyDonHang');
				$this->huyDonHang($madh);
			}
			if ($this->input->post('trangThaiTiep')){
				$this->chuyenNhieuDonHang();
			}
			if ($this->input->post('thanhToan')){
				$this->capNhatDaThanhToan();
			}

			$data = array(
				'danhsachdonhang'	=> $this->Mdanhsachdonhang->get_danhsachdonhang(),
				'donvuachange'		=> $this->session->flashdata('donhang')
			);

			$temp['data']     			= $data;
			$temp['template'] 			= 'giaodich/Vdanhsachdonhang';
			$this->load->view('layout_backend/Vlayout',$temp);
		}
	}

	public function chuyenTrangThaiTiepTheo($madh)
	{
		$af_row = $this->Mdanhsachdonhang->chuyenTrangThai($madh);
		if ($af_row > 0){
			$donhang[] = $madh;
			$this->session->set_flashdata('donhang',$donhang);
			setMessages('success','','Chuyển đơn hàng sang trạng thái tiếp theo thành công');
		}
		else{
			setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
		}
		return redirect('danh-sach-don-hang');
	}

	public function chuyenTrangThaiTruoc($madh)
	{
		$af_row = $this->Mdanhsachdonhang->chuyenTrangThaiTruoc($madh);
		if ($af_row > 0){
			$donhang[] = $madh;
			$this->session->set_flashdata('donhang',$donhang);
			setMessages('success','','Chuyển đơn hàng về trạng thái trước thành công');
		}
		else{
			setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
		}
		return redirect('danh-sach-don-hang');
	}

	public function chuyenNhieuDonHang()
	{
		$listDon = $this->input->post('maDonHang');
		$af_row = 0;
		foreach ($listDon as $k => $v) {
			$af_row += $this->Mdanhsachdonhang->chuyenTrangThai($v);
		}
		if ($af_row > 0){
			$donhang = $listDon;
			$this->session->set_flashdata('donhang',$donhang);
			setMessages('success','','Chuyển các đơn hàng đã chọn sang trạng thái tiếp theo thành công');
		}
		else{
			setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
		}
		return redirect('danh-sach-don-hang');
	}

	public function huyDonHang($madh)
	{
		$af_row = $this->Mdanhsachdonhang->chuyenTrangThai($madh, 5);
		if ($af_row > 0){
			$donhang[] = $madh;
			$this->session->set_flashdata('donhang',$donhang);
			setMessages('success','','Huỷ đơn hàng thành công');
		}
		else{
			setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
		}
		return redirect('danh-sach-don-hang');
	}

	public function capNhatDaThanhToan()
	{
		$listDon = $this->input->post('maDonHang');$af_row = 0;
		foreach ($listDon as $k => $v) {
			$af_row += $this->Mdanhsachdonhang->capNhatDaThanhToan($v);
		}
		if ($af_row > 0){
			setMessages('success','','Chuyển các đơn hàng đã chọn thành đã thanh toán thành công');
		}
		else{
			setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
		}
		return redirect('danh-sach-don-hang');
	}
}
