<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="{$url}">
	<title>Hệ thống siêu thị Thanh Nga Mart</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="assets/css/slider.css">
	<link href="assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
	<link href="assets/css/plugins/iCheck/custom.css" rel="stylesheet">


	<link rel="stylesheet" href="assets/css/plugins/slick/slick.css">
	<link rel="stylesheet" href="assets/css/plugins/slick/slick-theme.css">
	<link rel="stylesheet" href="assets/css/plugins/toastr/toastr.min.css">
	<link rel="stylesheet" href="assets/index.css">
	<link rel="stylesheet" href="assets/css/responsive.css">

	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Jquery Validate -->
	<script src="assets/js/plugins/validate/jquery.validate.min.js"></script>
	<style>
		body{
			font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
			color: black;
		}
		h1, h2, h3, h4, h5{
			font-weight: bold;
			color: black;
		}
		h4{
			margin: 10px;
		}
		hr{
			margin: 10px;
		}
		.group_contact input{
			height: 40px;
			padding: 0 20px;
			color: #636363;
			border-radius: 3px !important;
			border-color: #e5e5e5;
			box-shadow: none;
			margin-bottom: 15px;
		}
		.group_contact textarea{
			min-height: 130px;
			padding: 10px 15px;
			border-radius: 3px !important;
			resize: none;
			border-color: #e5e5e5;
			box-shadow: none;
		}
		.info_dathang{
			padding-left: 10px;
			padding-right: 10px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			margin-bottom: 10px;
		}
		.list_sp, .sanpham, .cach, .lb{
			padding: 0px;
		}
		.gia{
			color: #1c2d3f;
			padding-top: 25px;
			padding-right: 10px;
			float: right;
		}
		.tinhtien{
			padding-right: 0px;
		}
		.tt, .phivanchuyen .tt{
			color: #1c2d3f;
			float: right;
			padding-right: 10px;
		}
		.phivanchuyen div{
			padding: 1px;
		}
		.tongcong{
			font-size: 20px;
			color: #e22405;
			float: right;
			padding-right: 10px;
		}
		.thanhtoan{
			margin-top: 15px;
			padding-right: 0px;
		}
		.right{
			margin-bottom: 60px;
		}
		.border-circle{
			padding: 3px;
			border: 2px solid #908d8d;
			border-radius: 20px;
			font-size: 15px;
    		margin-top: 25px;
    		color: #908d8d;
		}
	</style>
</head>
<body>
	<form method="post" action="">
		<div class="info_dathang">
			<h1>TN Mart</h1>
			<div class="left col-md-7">
				<h4>THÔNG TIN THANH TOÁN</h4>
				<hr>
				<div class="group_contact col-md-12">
					<div class="col-md-6" style="padding-left: 0px;">
						<label class="lbl">Họ tên<span class="lbl text-danger">&nbsp;*</span></label>
						<input type="text" name="hoten" class="form-control" value="{$profile.sTenNguoiDung}" disabled>
					</div>
					<div class="col-md-6">
						<label class="lbl">Số điện thoại<span class="lbl text-danger">&nbsp;*</span></label>
						<input type="text" name="sdt" class="form-control" value="{$profile.sDienThoai}" disabled>
					</div>
					<div class="col-md-12" style="padding-left: 0px;">
						<label class="lbl">Địa chỉ Email<span class="lbl text-danger">&nbsp;*</span></label>
						<input type="email" name="email" class="form-control" value="{$profile.sEmail}" disabled>
					</div>
					<div class="col-md-11" style="padding-left: 0px;">
						<label class="lbl">Địa chỉ giao hàng:<span class="lbl text-danger">&nbsp;*</span></label>
						<select class="form-control" name="thongTinGiaoHang">
							{foreach $thongtingiaohang as $k => $v}
								<option value="{$v.PK_iMaThongTinGH}">{$v.sHoTen} - {$v.sDiaChiNhanHang} - {$v.sSoDienThoai}</option>
							{/foreach}
						</select>
					</div>
					<div class="col-md-1">
						<a href="{$url}diachigiaohang?service=dat-hang" class="text-center" title="Thêm địa chỉ giao hàng khác">
							<div class="border-circle">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</div>
						</a>
					</div>
					<div class="col-md-12" style="padding-left: 0px; margin-top: 10px;">
						<label class="lbl" style="margin-bottom: 15px;">Chọn hình thức thanh toán:<span class="lbl text-danger">&nbsp;*</span></label>
						<div class="col-md-12" style="padding-left: 0px;">
							{foreach $listHinhThucTT as $k => $v}
								<div class="col-md-6">
									<input type="radio" value="{$v.PK_iMaHinhThuc}" name="htThanhToan" id="ht{$k}" style="height: 13px;" required>&nbsp;
									<label title="{$v.sMoTa}" for="ht{$k}" style="font-weight: 500;">{$v.sTenHinhThuc}</label>
								</div>
							{/foreach}
						</div>
					</div>
				</div>
			</div>
			<div class="right col-md-5">
				<h4>ĐƠN HÀNG CỦA BẠN ({count($listProduct)} sản phẩm)</h4>
				<hr>
				<div class="list_sp col-md-12">
					{$tongtien = 0}
					{foreach $listProduct as $k => $v}
						<div class="sanpham col-md-12">
							<div class="col-md-2" style="padding: 0px;">
								<img class="img-md" src="{$url}{$v.sAnhDaiDien}">
							</div>
							<div class="col-md-5" style="padding-top: 25px;">
								<a href="{$url}detail?ma={$v.PK_sMaSP}">{$v.sTenSP}</a>
								<br>
								{number_format($v.fDonGia, 0, ',', '.')} x {$v.iSoLuong}
							</div>
							<div class="gia" data-gia="{$v.fDonGia}">
								{number_format($v.iSoLuong * $v.fDonGia, 0, ',', '.')}đ
							</div>
						</div>
						{$tongtien = $tongtien + $v.iSoLuong * $v.fDonGia}
					{/foreach}
				</div>
				<div class="cach col-md-12">
					<hr>
				</div>
				<div class="tinhtien col-md-12">
					<div class="tamtinh">
						<div class="lb col-md-8">Tạm tính</div>
						<div class="tt">
							{number_format($tongtien, 0, ',', '.')}đ
						</div>
					</div>
					<!-- <div class="phivanchuyen">
						<div class="col-md-8">Phí vận chuyển</div>
						<div class="tt">
							{$shipCost = 25000}
							{number_format($shipCost, 0, ',', '.')}đ
							
						</div>
					</div> -->
				</div>
				<div class="cach col-md-12">
					<hr>
				</div>
				<div class="tinhtien col-md-12">
					<div class="lb col-md-8">Tổng cộng</div>
					<div class="tongcong">
						<input type="hidden" name="tongTien" value="{$tongtien}">
						{number_format($tongtien, 0, ',', '.')}đ
					</div>
				</div>
				<div class="thanhtoan col-md-12">
					<a href="{$url}gio-hang">
						<button type="button" name="btnBack" value="back" class="btn col-md-6" style="color: #565050; background: #deded3;">Quay về giỏ hàng</button>
					</a>
					<button type="submit" class="btn btnSubmit" name="btnThanhToan" value="{(!empty($listProduct)) ? $listProduct[0]['FK_sMaDonHang'] : ''}" style="width: 220px; float: right;">Thanh toán</button>
				</div>
			</div>
		</div>
	</form>
</body>
<!-- Toastr -->
<script src="{$url}assets/js/plugins/toastr/toastr.min.js"></script>
{if !empty($message)}
<script type="text/javascript">
	setTimeout(function() {
		toastr.options = {
			closeButton: true,
			progressBar: true,
			showMethod: 'slideDown',
			timeOut: 5000
		};
		toastr.{$message.type}("{$message.title}","{$message.message}");
	}, 500);
</script>
{/if}
