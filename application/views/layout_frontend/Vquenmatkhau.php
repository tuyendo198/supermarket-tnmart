<style>
	.title_chitiet_bot{
		border-bottom: 1px solid #ebebeb;
		margin-bottom: 20px;
	}
	.bot{
		margin-bottom: 10px;
		padding-left: 0px;
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
				<a href="quenmatkhau">Quên mật khẩu</a>
			</li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data">
			{if (empty($type))}
				<div class="bot col-md-12">
					<label class="thongtin col-sm-2 control-label">Tên đăng nhập:</label>
					<div class="col-sm-6">
						<input type="text" name="tenTaiKhoan" value="" class="form-control" placeholder="Nhập tên đăng nhập">
					</div>
				</div>

				<div class="bot col-md-12">
					<label class="thongtin col-sm-2 control-label">Email:</label>
					<div class="col-sm-6">
						<input type="email" name="email" value="" class="form-control" placeholder="Nhập email">
					</div>
				</div>
				<div class="col-sm-2 col-sm-offset-2">
					<button type="submit" class="btn btnLogin col-md-12" name="getBackPassword" value="ok">Lấy lại mật khẩu</button>
				</div>
			{else}
				<div class="bot col-md-12">
					<label class="thongtin col-sm-2 control-label">Mật khẩu mới:</label>
					<div class="col-sm-6">
						<input type="password" name="matkhau" value="" class="form-control" placeholder="Nhập mật khẩu">
					</div>
				</div>

				<div class="bot col-md-12">
					<label class="thongtin col-sm-2 control-label">Nhập lại mật khẩu:</label>
					<div class="col-sm-6">
						<input type="password" name="nhaplaimatkhau" value="" class="form-control" placeholder="Nhập lại mật khẩu">
					</div>
				</div>
				<div class="col-sm-2 col-sm-offset-2">
					<button type="submit" class="btn btnLogin col-md-12" name="changePassword" value="ok">Đổi mật khẩu</button>
				</div>
			{/if}
		</form>
	</div>
	<div style="margin-bottom: 20px;"></div>
</div>
