<div class="title_chitiet_bot">
	<div class="lblChitiet">
		<ul>
			<li>
				<a href="{$url}"> Trang chủ</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
			</li>
			<li>
				<a href="">Giỏ hàng</a>
			</li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data">
			<table class="table">
				<thead>
					<th width="12%">Ảnh sản phẩm</th>
					<th>Tên sản phẩm</th>
					<th>Đơn giá</th>
					<th>Số lượng</th>
					<th>Đơn vị tính</th>
					<th width="9%" class="text-center">Số tiền</th>
					<th class="text-center">Tác vụ</th>
				</thead>
				<tbody>
					{$tongtien = 0}
					{foreach $product_in_cart as $k => $v}
					<tr>
						<td>
							<a href="{$url}detail?ma={$v.PK_sMaSP}" target="_blank" class="pull-left">
								<img class="img-md" src="{$url}{$v.sAnhDaiDien}" height="100px">
							</a>
						</td>
						<td>{$v.sTenSP}</td>
						<td data-gia="{$v.fDonGia}">{number_format($v.fDonGia, 0, ',', '.')}đ</td>
						<td>
							<button type="button" class="btnMinus" onclick="minus(this)">
								<i class="fa fa-minus" aria-hidden="true"></i>
							</button>
							<input class="soluong" type="text" name="txtSoluong" max="{$v.soluongcon}" value="{$v.iSoLuong}" maxlength="3" onchange="calculator(this)"/>
							<button type="button" class="btnAdd" onclick="add(this)">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</button>
						</td>
						<td>{$v.sDonViTinh}</td>
						<td data-thanhtien="{$v.iSoLuong * $v.fDonGia}" style="text-align: center;">
							{number_format($v.iSoLuong * $v.fDonGia, 0, ',', '.')}đ
						</td>
						<td style="text-align: center;">
							<button type="button" class="btn btn-xs btn-danger" name="remove_from_cart" value="{$v.PK_sMaSP}">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</button>
						</td>
						{$tongtien = $tongtien + $v.iSoLuong * $v.fDonGia}
					</tr>
					{/foreach}
				</tbody>
			</table>
			<div class="col-md-12" style="font-size: 18px;">
				<div class="pull-right">
					<strong>Tổng thanh toán: </strong>
					<span class="tongtien" data-tongtien="{$tongtien}" style="font-weight: bold; color: #a90d0d;">
						{number_format($tongtien, 0, ',', '.')}đ
					</span>
				</div>
			</div>
			<div class="col-md-8" style="font-size: 18px; margin-top: 20px;">

			</div>
			<div class="col-md-4" style="font-size: 18px; margin-top: 20px;">
				<div>
					<button type="button" name="continue" value="" class="btn addtocart col-md-6">Tiếp tục mua hàng</button>
				</div>
				<div class="col-md-4">
					<a href="{$url}dat-hang">
						<button type="button" class="btn btnSubmit" {(count($product_in_cart) == 0) ? 'disabled' : ''} name="dathang" value="ok" style="width: 200px;">Tiến hành đặt hàng</button>
					</a>
				</div>
			</div>
		</form>
	</div>
	<div style="margin-bottom: 20px;"></div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$(document).on('click', 'button[name=continue]', function() {
			window.location.href = '{$url}';
		});
	});
</script>
<style>
	.title_chitiet_bot{
		border-bottom: 1px solid #ebebeb;
		margin-bottom: 20px;
	}
	.title_tk{
		font-size: 22px;
		font-weight: bold;
		color: #ce0c0c;
		margin-left: 2px;
	}
	.cttk{
		padding: 0px;
		border: 1px solid #CCCCCC;
	}
	.title_hoso{
		font-size: 18px;
		font-weight: 500;
	}
	.left{
		padding-left: 0px;
	}
	.left ul{
		padding-left: 10px;
		margin-top: 10px;
	}
	.left ul li{
		display: block;
	}
	.left ul li a{
		color: rgba(0,0,0,.8);
		display: block;
		margin-bottom: 10px;
	}
	.thongtin{
		color: rgba(19, 19, 19, 0.8);
		padding: 0px;
		font-weight: normal;
		font-size: 15px;
		margin-top: 5px;
	}
	.btn-light{
		background: #fff;
		color: #555;
		border: 1px solid rgba(0,0,0,.09);
		box-shadow: 0 1px 1px 0 rgba(0,0,0,.03);
	}
	.bot{
		margin-bottom: 10px;
		padding-left: 0px;
	}
	.bot input{
		height: 40px;
	}
	.rd input{
		height: 13px;
	}
	.error{
		color: #dc0404;
	}
	.nav-tabs{
		border-bottom: 0px;
		font-size: 16px;
	}
	.nav-tabs>li>a{
		padding-left: 26px;
		padding-right: 26px;
	}
	.nav-tabs>li>a:hover {
		border-color: white;
		color: #ee4d2d;
	}
	.nav>li>a:hover{
		background: white;
	}
	.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
		color: #ee4d2d;
		border: 0px;
		border-bottom: 2px solid #ee4d2d;
	}
	.nav-tabs>li>a{
		color: rgba(0,0,0,.8);
	}
</style>