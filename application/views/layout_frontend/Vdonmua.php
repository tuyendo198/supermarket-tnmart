<div class="title_chitiet_bot">
	<div class="lblChitiet">
		<ul>
			<li>
				<a href="{$url}"> Trang chủ</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
			</li>
			<li>
				<a href="">Đơn hàng của tôi</a>
			</li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="left col-md-3">
			<p class="title_tk">QUẢN LÝ TÀI KHOẢN</p>
			<div class="cttk col-md-12">
				<ul>
					<li>
						<a href="{$url}profile">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i> Thông tin cá nhân
						</a>
					</li>
					<li>
						<a href="{$url}diachigiaohang">
							<i class="fa fa-location-arrow" aria-hidden="true"></i> Địa chỉ giao hàng
						</a>
					</li>
					<li>
						<a href="{$url}thong-tin-don-hang" style="color:#ee4d2d;">
							<i class="fa fa-file-text-o" aria-hidden="true"></i> Đơn hàng của tôi
						</a>
					</li>
					<li>
						<a href="{$url}change-pass"><i class="fa fa-key" aria-hidden="true"></i> Đổi mật khẩu</a>
					</li>
					<li>
						<a href="{$url}logout" class="logout">
							<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Đăng xuất
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-9">
			<form action="" method="post" id="formProfile" enctype="multipart/form-data" onsubmit="return false;">
				<div class="ibox-content">
					<div class="tabs-container">
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#tab-all">Tất cả</a>
							</li>
							{foreach $getListTrangThai as $k => $v}
								<li class="">
									<a data-toggle="tab" href="#tab-{$v.PK_iMaTrangThai}">{$v.sTenTrangThai}</a>
								</li>
							{/foreach}
						</ul>
						<div class="tab-content">
							<div id="tab-all" class="tab-pane active">
								<div class="m-t">
									{if !empty($listDonHang)}
										<table class="table table-bordered">
											<thead>
												<th class="text-center">STT</th>
												<th class="text-center">Mã đơn hàng</th>
												<th class="text-center">Ngày lập</th>
												<th class="text-center">Thanh toán</th>
												<th class="text-center">Trạng thái</th>
											</thead>
											<tbody>
												{$stt = 1}
												{foreach $listDonHang as $key => $value}
													{foreach $value as $k => $v}
													<tr>
														<td class="text-center">{$stt++}</td>
														<td class="text-center">
															<a href="thong-tin-don-hang?mdh={$v.PK_sMaDonHang}" target="_blank">
																{$v.PK_sMaDonHang}
															</a>
														</td>
														<td class="text-center">
															{date('d/m/Y', strtotime($v.dNgayLap))}
														</td>
														<td>{$v.sThanhToan}</td>
														<td>{$v.sTenTrangThai}</td>
													</tr>
													{/foreach}
												{/foreach}
											</tbody>
										</table>
									{else}
										<h3>Hiện bạn không có đơn hàng nào. Vui lòng chọn sản phẩm và đặt hàng</h3>
									{/if}
								</div>
							</div>
							{foreach $getListTrangThai as $key => $val}
								<div id="tab-{$val.PK_iMaTrangThai}" class="tab-pane">
									<div class="m-t">
										{if !empty($listDonHang[$val.PK_iMaTrangThai])}
											<table class="table table-bordered">
												<thead>
													<th class="text-center">STT</th>
													<th class="text-center">Mã đơn hàng</th>
													<th class="text-center">Ngày lập</th>
													<th class="text-center">Thanh toán</th>
													<th class="text-center">Trạng thái</th>
												</thead>
												<tbody>
													{foreach $listDonHang[$val.PK_iMaTrangThai] as $k => $v}
														<tr>
															<td class="text-center">{$k+1}</td>
															<td class="text-center">
																<a href="thong-tin-don-hang?mdh={$v.PK_sMaDonHang}" target="_blank">
																	{$v.PK_sMaDonHang}
																</a>
															</td>
															<td class="text-center">
																{date('d/m/Y', strtotime($v.dNgayLap))}
															</td>
															<td>{$v.sThanhToan}</td>
															<td class="text-center">{$v.sTenTrangThai}</td>
														</tr>
													{/foreach}
												</tbody>
											</table>
										{else}
											<h4 class="alert alert-warning" style="margin: 0px 25px 0px 25px;">Không có đơn hàng</h4>
										{/if}
									</div>
								</div>
							{/foreach}
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div style="margin-bottom: 20px;"></div>
</div>
<script>
	$(document).ready(function () {
		$(document).on('click', 'button[name=btnUpload]', function () {
			$('input[name=uploadAnh]').trigger('click');
		});
	});
	function readURL(input,doianh) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$(doianh).attr('src', e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
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
