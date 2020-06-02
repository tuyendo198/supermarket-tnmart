<?php

class Cdathang extends MY_Controller_KH
{
	public $Mdathang;
	public function __construct() {
		parent::__construct();
		$this->load->model('Mdathang', 'Mdathang');
		$this->Mdathang = new Mdathang();
	}

	public function index()
	{
		$session 		= getSession('info_khachhang');

		if ($this->input->get('vnp_SecureHash')){
			$this->returnVNPay();
		}
		$this->Mdathang->checkGia($session['mataikhoan']);

		if ($this->input->post('btnThanhToan')){
			switch ($this->input->post('htThanhToan')) {
				case '2':
					$this->thanhToanVNPAY();
					break;
				
				default:
					$this->thanhToanTrucTiep();
					break;
			}
		}

		$data = array(
			'profile'			=> $this->Mdathang->getProfile($session['mauser']),
			'thongtingiaohang'	=> $this->Mdathang->getThongTinGiaoHang($session['mataikhoan']),
			'listProduct'		=> $this->Mdathang->get_product_in_cart($session['mataikhoan']),
			'listHinhThucTT'	=> $this->Mdathang->getHinhThucThanhToan(),
			'url'				=> base_url(),
			'message'			=> getMessages()
		);
		$this->parser->parse('layout_frontend/Vdathang', $data);
	}

	public function thanhToanTrucTiep()
	{
		$maDonHang = $this->input->post('btnThanhToan');
		$thongTinGiaoHang = $this->input->post('thongTinGiaoHang');
		$htThanhToan 	= $this->input->post('htThanhToan');
		$trangThaiThanhToan = 'Chưa thanh toán';
		$updateData = array(
			'dNgayLap'			=> date('Y-m-d'),
			'sThanhToan'		=> $trangThaiThanhToan,
			'FK_iMaTrangThai'	=> 2,
			'FK_iMaHinhThuc'	=> $htThanhToan,
			'FK_iMaThongTinGH'	=> $thongTinGiaoHang
		);
		$rs = $this->Mdathang->updateDonHang($maDonHang, $updateData);
		if ($rs > 0){
			setMessages('success','','Xác nhận đơn hàng thành công. Vui lòng kiểm tra trạng thái đơn hàng!');
			return redirect('thong-tin-don-hang');
		}
		else{
			setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
			return redirect('gio-hang');
		}
	}

	public function thanhToanVNPAY()
	{
		$maDonHang = $this->input->post('btnThanhToan');
		$updateData = array(
			'dNgayLap'			=> date('Y-m-d'),
			'sThanhToan'		=> 'Chưa thanh toán',
			'FK_iMaTrangThai'	=> 1,
			'FK_iMaHinhThuc'	=> $this->input->post('htThanhToan'),
			'FK_iMaThongTinGH'	=> $this->input->post('thongTinGiaoHang')
		);
		$this->Mdathang->updateDonHang($maDonHang, $updateData);

		$vnp_TmnCode = "O2KG120X"; //Mã website tại VNPAY 
		$vnp_HashSecret = "OUASEPKRENIVDUDNRFSYYUWISRRCRYTG"; //Chuỗi bí mật
		$vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
		$vnp_Returnurl = base_url().'dat-hang';
		$vnp_TxnRef = $maDonHang; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
		$vnp_OrderInfo = 'Thanh toán hoá đơn tnmart';
		$vnp_OrderType = 'billpayment';
		$vnp_Amount = $this->input->post('tongTien');
		$vnp_Locale = 'vn';
		$vnp_BankCode = 'NCB';
		$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

		$inputData = array(
		    "vnp_Version" => "2.0.0",
		    "vnp_TmnCode" => $vnp_TmnCode,
		    "vnp_Amount" => $vnp_Amount * 100,
		    "vnp_Command" => "pay",
		    "vnp_CreateDate" => date('YmdHis'),
		    "vnp_CurrCode" => "VND",
		    "vnp_IpAddr" => $vnp_IpAddr,
		    "vnp_Locale" => $vnp_Locale,
		    "vnp_OrderInfo" => $vnp_OrderInfo,
		    "vnp_OrderType" => $vnp_OrderType,
		    "vnp_ReturnUrl" => $vnp_Returnurl,
		    "vnp_TxnRef" => $vnp_TxnRef.'_'.time(),
		);
		if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
	}

	public function returnVNPay()
	{
		$vnp_SecureHash = $this->input->get('vnp_SecureHash');
		$vnp_HashSecret = "OUASEPKRENIVDUDNRFSYYUWISRRCRYTG"; //Chuỗi bí mật
		$dataReturn = $this->input->get();
        $inputData = array();
        foreach ($dataReturn as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . $key . "=" . $value;
            } else {
                $hashData = $hashData . $key . "=" . $value;
                $i = 1;
            }
        }

        //$secureHash = md5($vnp_HashSecret . $hashData);
		$secureHash = hash('sha256',$vnp_HashSecret . $hashData);
		if ($secureHash == $vnp_SecureHash) {
            if ($this->input->get('vnp_ResponseCode') == '00') {
            	$maDonHang = str_replace(substr($inputData['vnp_TxnRef'], strpos($inputData['vnp_TxnRef'], '_')),'',$inputData['vnp_TxnRef']);

            	$tienPhaiThanhToan = $this->Mdathang->getTongTienDonHang($maDonHang)['tongtien'];
            	$tienDaThanhToan = $inputData['vnp_Amount']/100;
            	if ($tienPhaiThanhToan >= $tienDaThanhToan){
            		$thanhToan = 'Đã thanh toán';
            	}
            	else{
            		$thanhToan = 'Còn thiếu '.number_format($tienPhaiThanhToan - $tienDaThanhToan, 0, ',', '.');
            	}
                $updateData = array(
					'dNgayLap'			=> date('Y-m-d'),
					'sThanhToan'		=> $thanhToan,
					'FK_iMaTrangThai'	=> 2,
				);
				$rs = $this->Mdathang->updateDonHang($maDonHang, $updateData);
				setMessages('success','','Thanh toán thành công. Vui lòng kiểm tra trạng thái đơn hàng!');
				return redirect('thong-tin-don-hang');
            }
            else {
                setMessages('error','','Giao dịch không thành công. Vui lòng thử lại!');
				return redirect('gio-hang');
            }
        }
        else {
            setMessages('error','','Chữ ký không hợp lệ. Vui lòng thử lại!');
			return redirect('gio-hang');
        }
	}
}
