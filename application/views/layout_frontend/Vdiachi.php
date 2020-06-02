<div class="title_chitiet_bot">
	<div class="lblChitiet">
		<ul>
			<li>
				<a href="{$url}"> Trang chủ</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
			</li>
			<li>
				<a href="">Thông tin giao hàng</a>
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
						<a href="{$url}diachigiaohang" style="color:#ee4d2d;">
							<i class="fa fa-location-arrow" aria-hidden="true"></i> Địa chỉ giao hàng
						</a>
					</li>
					<li>
						<a href="{$url}thong-tin-don-hang">
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
			<form action="" method="post" id="formProfile" enctype="multipart/form-data">
				<div class="row">
					<div class="title_hoso col-md-10">DANH SÁCH ĐỊA CHỈ NHẬN HÀNG</div>
					<div class="col-md-2">
						<div class="pull-right">
							<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modalAddAddress">Thêm địa chỉ</button>
						</div>
					</div>
				</div>
				<hr style="margin-top: 0px;">
				<div class="col-md-12">
					<div class="row">
						{foreach $thongTinGiaoHang as $k => $v}
							<div class="col-md-4 m-t">
								<div class="boxAddress">
									<button type="submit" name="diaChiUuTien" value="{$v.PK_iMaThongTinGH}" class="btnInAddress btn-success" title="Đặt thành địa chỉ ưu tiên" onclick="return confirm('Bạn chắc chắn muốn ưu tiên sử dụng địa chỉ này?');"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>
									<p>
										<strong>Người nhận: </strong>{$v.sHoTen}
									</p>
									<p>
										<strong>Địa chỉ nhận hàng: </strong>{$v.sDiaChiNhanHang}
									</p>
									<p>
										<strong>Số điện thoại: </strong>{$v.sSoDienThoai}
									</p>
								</div>
							</div>
						{/foreach}
					</div>
				</div>
			</form>
		</div>
	</div>
	<div style="margin-bottom: 20px;"></div>
</div>
<div class="modal fade" id="modalAddAddress" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<form action="" method="POST" class="form-horizontal">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title">Thêm địa chỉ nhận hàng</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-md-4">
									Tên người nhận
								</label>
								<div class="col-md-8">
									<input type="text" name="tenNguoiNhan" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4">
									Địa chỉ nhận hàng
								</label>
								<div class="col-md-8">
									<input type="text" name="diaChiNhanHang" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4">
									Số điện thoại
								</label>
								<div class="col-md-8">
									<input type="text" name="soDienThoai" class="form-control" required>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" name="btnAddAddress" value="ok">
						Thêm
					</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</form>
</div>
{if !empty($service)}
<script type="text/javascript">
	$(document).ready(function(){
		$('#modalAddAddress').modal('show');
	});
</script>
{/if}