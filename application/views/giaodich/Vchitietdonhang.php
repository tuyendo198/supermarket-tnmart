<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Hoá đơn</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<style>
		.thongtin{
			border: hidden !important;
		}
		.thongtin th{
			border: hidden !important;
		}
		.title_center{
			text-align: center;
			border-bottom: 1px solid #454545;
		}
		h2{
			font-weight: bold;
		}
		.title_center span{
			font-size: 18px;
		}
		h3{
			text-align: center;
			font-weight: bold;
		}
	</style>
</head>
<body {if ($type==print)}onload="window.print();"{/if}>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox col-md-12">
				<div class="ibox-content col-sm-12">
					<div class="title_center">
						<h2>SIÊU THỊ THANH NGA MART</h2>
						<span>230 ĐỊNH CÔNG - HOÀNG MAI - HÀ NỘI</span>
						<p>Điện thoại: 0353924400</p>
					</div>
					<h3>HOÁ ĐƠN BÁN LẺ</h3>
					<table class="thongtin table table-bordered">
						<tr>
							<th>Mã hoá đơn: {$maHD}</th>
							<th>Thời gian: {date('d/m/Y H:i:s')}</th>
						</tr>
						<tr>
							<th>Người lập hoá đơn: {$thongTinDon.sTenNguoiDung}</th>
							<th>Ngày lập hoá đơn: {date('d/m/Y', strtotime($thongTinDon.dNgayLap))}</th>
						</tr>
					</table>
				</div>
				<div class="chitiet col-md-12">
					<table class="table table-bordered">
						<thead>
							<th>STT</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Đơn giá</th>
							<th>Thành tiền</th>
						</thead>
						<tbody>
							{$tongtien = 0}
							{foreach $thongTinDon.chitiet as $k => $v}
								<tr>
									<td>{$k+1}</td>
									<td>{$v.sTenSP}</td>
									<td>{$v.iSoLuong}</td>
									<td>{number_format($v.fDonGia, 0, ',', '.')}</td>
									<td>{number_format($v.iSoLuong * $v.fDonGia, 0, ',', '.')}</td>
								</tr>
								{$tongtien = $tongtien + $v.iSoLuong * $v.fDonGia}
							{/foreach}
						</tbody>
					</table>
				</div>
				<div class="form-group col-md-12">
					<div class="col-md-9"></div>
					<label class="col-sm-2 control-label">Tổng tiền:</label><b>{number_format($tongtien, 0, ',', '.')}đ</b>
				</div>
				<div class="form-group col-md-12">
					<div class="col-md-9"></div>
					<label class="col-sm-2 control-label">Tổng phải trả:</label><b>{number_format($tongtien, 0, ',', '.')}đ</b>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>