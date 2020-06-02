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
	.rd input{
		height: 13px;
	}
	.error{
		color: #dc0404;
	}
	.bot input{
		height: 40px;
		padding: 0 20px;
		color: #636363;
		border-radius: 3px !important;
		border-color: #e5e5e5;
		box-shadow: none;
	}
</style>
<div class="title_chitiet_bot">
	<div class="lblChitiet">
		<ul>
			<li>
				<a href="{$url}"> Trang chủ</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
			</li>
			<li>
				<a href="">Đổi mật khẩu</a>
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
						<a href="{$url}thong-tin-don-hang">
							<i class="fa fa-file-text-o" aria-hidden="true"></i> Đơn hàng của tôi
						</a>
					</li>
					<li>
						<a href="{$url}change-pass" style="color:#ee4d2d;">
							<i class="fa fa-key" aria-hidden="true"></i> Đổi mật khẩu
						</a>
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
			<form action="" method="post" enctype="multipart/form-data">
				<p class="title_hoso">ĐỔI MẬT KHẨU</p>
				<hr style="margin-top: 0px;">
				<div class="col-md-12">
					<div class="bot col-md-12">
						<label class="thongtin col-sm-2 control-label">Họ và tên:</label>
						<div class="col-sm-10">
							<input type="text" name="hoten" value="{$info_canhan.sTenNguoiDung}" class="form-control" placeholder="Họ và tên" disabled="disabled">
						</div>
					</div>

					<div class="bot col-md-12">
						<label class="thongtin col-sm-2 control-label">Mật khẩu mới:</label>
						<div class="col-sm-10">
							<input type="password" name="new_pass" value="" class="form-control" placeholder="Mật khẩu mới" required="true">
						</div>
					</div>

					<div class="bot col-md-12">
						<label class="thongtin col-sm-2 control-label">Xác nhận mật khẩu:</label>
						<div class="col-sm-10">
							<input type="password" name="re_pass" value="" class="form-control" placeholder="Xác nhận mật khẩu mới" required="true">
						</div>
					</div>

					<div class="col-sm-4 col-sm-offset-2">
						<button type="submit" name="btnSave" value="ok" class="btn btnLogin col-md-12">Lưu thông tin</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div style="margin-bottom: 20px;"></div>
</div>
