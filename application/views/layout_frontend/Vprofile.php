<div class="title_chitiet_bot">
	<div class="lblChitiet">
		<ul>
			<li>
				<a href="{$url}"> Trang chủ</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
			</li>
			<li>
				<a href="">Thông tin cá nhân</a>
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
						<a href="{$url}profile" style="color:#ee4d2d;">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i> Thông tin cá nhân
						</a>
					</li>
					<li>
						<a href="{$url}diachigiaohang">
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
				<p class="title_hoso">HỒ SƠ CỦA TÔI</p>
				<hr style="margin-top: 0px;">
				<div class="col-md-8">
					<div class="bot col-md-12">
						<label class="thongtin col-sm-2 control-label">Họ và tên:</label>
						<div class="hs col-sm-10">
							<input type="text" name="hoten" value="{$info_canhan.sTenNguoiDung}" class="form-control" placeholder="Họ và tên">
						</div>
					</div>
					<div class="bot col-md-12">
						<label class="thongtin col-sm-2 control-label">Ngày sinh:</label>
						<div class="hs col-sm-10">
							<input type="date" name="ngaysinh" value="{$info_canhan.dNgaySinh}" class="form-control" placeholder="dd/mm/yyyy">
						</div>
					</div>
					<div class="bot col-md-12">
						<label class="thongtin col-sm-2 control-label">Giới tính:</label>
						<div class="rd col-sm-10">
							<input type='radio' name='gt' class="i-checks" value="Nam" checked> Nam
							<input type='radio' name='gt' class="i-checks" value="Nữ" {if isset($info_canhan.sGioiTinh) && ($info_canhan.sGioiTinh == 'Nữ')}checked{/if}> Nữ
						</div>
					</div>
					<div class="bot col-md-12">
						<label class="thongtin col-sm-2 control-label">Email:</label>
						<div class="hs col-sm-10">
							<input type="email" name="email" value="{$info_canhan.sEmail}" class="form-control" placeholder="email">
						</div>
					</div>
					<div class="bot col-md-12">
						<label class="thongtin col-sm-2 control-label">Địa chỉ:</label>
						<div class="hs col-sm-10">
							<input type="text" name="diachi" value="{$info_canhan.sDiaChi}" class="form-control" placeholder="Địa chỉ">
						</div>
					</div>
					<div class="bot col-md-12">
						<label class="thongtin col-sm-2 control-label">Điện thoại:</label>
						<div class="hs col-sm-10">
							<input type="text" name="dienthoai" value="{$info_canhan.sDienThoai}" class="form-control" placeholder="Điện thoại">
						</div>
					</div>
					<div class="col-sm-4 col-sm-offset-2">
						<button type="submit" name="btnSave" value="ok" class="btn btnLogin col-md-12">Lưu thông tin</button>
					</div>
				</div>
				<div class="col-md-4" style="text-align: center;">
					<img src="{if isset($info_canhan.sAnhDaiDien)}{$info_canhan.sAnhDaiDien}{/if}" class="anhKH" alt="Chọn ảnh đại diện" height="200px;">
					<input type="file" class="avatar-uploader__file-input" name="uploadAnh" accept=".jpg,.jpeg,.png" style="display: none;" onchange="readURL(this, '.anhKH');"/>
					<button type="button" class="btn btn-light btn--m btn--inline" name="btnUpload">Chọn ảnh</button>
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
