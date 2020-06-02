<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>TnMart | Phiếu nhập hàng</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<style>
		@media screen, print{
			.tenst{
				font-weight: bold;
				font-size: 18px;
			}
			.mau{
				font-weight: bold;
			}
			.nghieng{
				font-style: italic;
			}
			.nopadding{
				padding: 0px !important;
			}
			.lblPhieu{
				font-size: 22px;
			}
			.boidam{
				font-weight: bold;
			}

			.thongtin{
				border: hidden !important;
			}
			.thongtin tr{
				border: hidden;
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
		}
	</style>
</head>
<body {if ($type==print)}onload="window.print();"{/if}>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox col-md-12">
				<div class="ibox-content col-sm-12">
					<table class="thongtin table">
						<tr>
							<td class="tenst nopadding text-center">Siêu thị Thanh Nga</td>
							<td class="mau nopadding text-center">Mẫu số 01</td>
						</tr>
						<tr>
							<td class="nopadding text-center">230 Định Công - Hoàng Mai - Hà Nội</td>
							<td class="nopadding text-center">Mã phiếu: {$chitietphieu.PK_sMaPN}</td>
						</tr>
						<tr>
							<td></td>
							<td class="nghieng nopadding text-center">Ngày {date("d/m/Y", strtotime({$chitietphieu.dNgaynhap}))}</td>
						</tr>
					</table>
					<h3 class="lblPhieu text-center">PHIẾU NHẬP HÀNG</h3>
				</div>
				<div class="chitiet col-md-12">
					<p>Nhà cung cấp: <b>{$chitietphieu.sTenNCC}</b></p>
					<p>Nhân viên nhập: <b>{$chitietphieu.sTenNguoiDung}</b></p>
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
						{foreach $chitietphieu.chitiet as $k => $v}
							{$thanhtien = $v.iSoLuongNhap * $v.fDonGiaNhap}
							{$tongtien = $tongtien + $thanhtien}
							<tr>
								<td>{$k+1}</td>
								<td>{$v.sTenSP}</td>
								<td>{$v.iSoLuongNhap}</td>
								<td>{number_format($v.fDonGiaNhap, 0, ',', '.')}</td>
								<td>{number_format($thanhtien, 0, ',', '.')}</td>
							</tr>
						{/foreach}
						</tbody>
					</table>
				</div>
				<div class="form-group col-md-12">
					<label class="control-label">Tổng số tiền:</label><b> {number_format($tongtien, 0, ',', '.')} VNĐ</b>
				</div>
				<div class="ibox-content col-sm-12">
					<table class="thongtin table">
						<tr>
							<td class="ext-center"></td>
							<td class="text-center">Ngày {date('d')} tháng {date('m')} năm {date('Y')}</td>
						</tr>
						<tr>
							<td class="boidam text-center">Người lập phiếu</td>
							<td class="boidam text-center">Kế toán</td>
						</tr>
						<tr>
							<td class="nghieng text-center">(Ký và ghi rõ họ tên)</td>
							<td class="nghieng text-center">(Ký và ghi rõ họ tên)</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

