<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THANH NGA MART</h2>
		<ol class="breadcrumb">
			<li>
				<a href="">Trang chủ</a>
			</li>
			<li>
				<a href="">Quản lý nhân viên</a>
			</li>
			<li class="active">Cấp tài khoản</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Cấp tài khoản</h5>
				</div>
				<div class="ibox-content">
					<form action="" method="POST" class="form-horizontal" id="formCapTK" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-lg-3 control-label">Chọn nhân viên:</label>
							<div class="col-lg-8">
								<select class="form-control m-b" name="ddlUser">
									<option value="">Chọn nhân viên</option>
									{foreach $nhanvien as $val}
										<option value="{$val.PK_sMaND}">{$val.sTenNguoiDung}</option>
									{/foreach}
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Chọn quyền:</label>

							<div class="col-lg-8">
								<select class="form-control m-b" name="ddlQuyen">
									<option value="">Chọn quyền</option>
									{foreach $quyen as $val}
										<option value="{$val.PK_iMaQuyen}">{$val.sTenQuyen}</option>
									{/foreach}
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Tên tài khoản:</label>

							<div class="col-lg-8">
								<input type="text" name="txtTaiKhoan" placeholder="Tên tài khoản" class="form-control" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Mật khẩu:</label>

							<div class="col-lg-8">
								<input type="password" name="txtPass" placeholder="Mật khẩu" class="form-control" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Xác nhận mật khẩu:</label>

							<div class="col-lg-8">
								<input type="password" name="txtRePass" placeholder="Xác nhận mật khẩu" class="form-control" value="">
							</div>
						</div>
						<div class="form-group text-center">
							<div class="col-sm-6 col-sm-offset-2">
								<button type="submit" class="btn btn-primary" name="btnCapTK" value="ok">Cấp tài khoản</button>
								<button type="reset" class="btn btn-danger" name="huytk" value="ok">Huỷ</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$(document).on('change', 'input[name=txtTaiKhoan]', function () {
			var tentaikhoan = $(this).val();
			regex = /^[a-zA-Z0-9]+$/;
			if (!regex.test(tentaikhoan)) {
				// console.log(tentaikhoan);
				$(this).focus();
				$(this).val("");
				toastr.error("Tên tài khoản không được nhập có dấu!");
				return false;
			}
		});
	});
</script>
