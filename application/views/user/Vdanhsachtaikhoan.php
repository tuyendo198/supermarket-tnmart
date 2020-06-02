<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THANH NGA MART</h2>
		<ol class="breadcrumb">
			<li>
				<a href="">Trang chủ</a>
			</li>
			<li>
				<a href="">Quản lý hệ thống</a>
			</li>
			<li class="active">Danh sách tài khoản</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-12">
			<div class="ibox-title col-md-12">
				<div class="col-md-9" style="padding-left: 0px;">
					<h5>Danh sách tài khoản</h5>
				</div>
				<div class="col-md-3" style="padding-left: 0px; margin-top: -5px; text-align: right;">
					<button type="button" class="btn btn-sm btn-primary pull-right" name="addTK" title="Cấp tài tài khoản" style="margin-left: 15px;" data-toggle="modal" data-target="#modalCapTK">
						<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Cấp tài khoản
					</button>
				</div>
			</div>

			<div class="ibox">
				<div class="ibox-content">
					<div class="table-responsive">
						<form action="" method="POST">
							<table class="table table-striped table-bordered table-hover datatable">
								<thead>
									<th>STT</th>
									<th>Mã người dùng</th>
									<th>Tên người dùng</th>
									<th>Tên tài khoản</th>
									<th>Tên quyền</th>
									<th>Trạng thái</th>
									<th>Tác vụ</th>
								</thead>
								<tbody>
								{foreach $danhsachtaikhoan as $key => $value}
									<tr>
										<td class="text-center">{$key+1}</td>
										<td>{$value.FK_sMaND}</a></td>
										<td>{$value.sTenNguoiDung}</td>
										<td>{$value.sTenTaiKhoan}</td>
										<td>{$value.sTenQuyen}</td>
										{if $value.sTrangThai == "Bình thường"}
											<td class="center footable-visible">
												<span class="label label-primary">{$value.sTrangThai}</span>
											</td>
										{else}
											<td class="center footable-visible">
												<span class="label label-danger">{$value.sTrangThai}</span>
											</td>
										{/if}
										<td>
											{if $value.FK_iMaQuyen != 2}
											<button type="button" class="btn btn-xs btn-warning" name="btnEditTK" title="Cập nhật tài khoản" value="{$value.PK_iMaTaiKhoan}" data-toggle="modal" data-target="#modalSuaTK">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											</button>
											{/if}
											{if $value.sTrangThai == "Bình thường"}
												<button type="submit" class="btn btn-xs btn-danger" name="set_blockTK" title="Khoá tài khoản" value="{$value.PK_iMaTaiKhoan}" style="width: 25%;">
													<i class="fa fa-lock" aria-hidden="true" style="font-size: 15px;"></i>
												</button>
											{else}
												<button type="submit" class="btn btn-xs btn-danger" name="set_blockTK" title="Mở khoá tài khoản" value="{$value.PK_iMaTaiKhoan }">
													<i class="fa fa-unlock" aria-hidden="true"></i>
												</button>
											{/if}
										</td>
									</tr>
								{/foreach}
								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal cấp tài khoản nhân viên-->
<form method="POST" class="form-horizontal" id="formCapTK" enctype="multipart/form-data">
	<div class="modal fade" id="modalCapTK" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="width: 1000px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

					<h3 class="modal-title">Cấp tài khoản</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="col-lg-3 control-label">Chọn nhân viên:</label>
								<div class="col-lg-8">
									<select class="form-control m-b" name="ddlUser">
										<option value="">Chọn nhân viên</option>
										{foreach $nv_no_tk as $val}
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
										{foreach $quyennv as $val}
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
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="btnCapTK" value="ok">Cấp tài khoản</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- Modal sửa tài khoản nhân viên-->
<form method="POST" class="form-horizontal" id="formSuaTK" enctype="multipart/form-data">
	<div class="modal fade" id="modalSuaTK" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="width: 1000px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

					<h3 class="modal-title">Cập nhật tài khoản</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="col-lg-3 control-label">Tên tài khoản:</label>
								<div class="col-lg-8">
									<input type="text" name="tentaikhoan" placeholder="Tên tài khoản" disabled class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Chọn quyền:</label>

								<div class="col-lg-8">
									<select class="form-control m-b" name="quyen">
										<option value="">Chọn quyền</option>
										{foreach $quyen as $val}
											<option value="{$val.PK_iMaQuyen}">{$val.sTenQuyen}</option>
										{/foreach}
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="btnUpdateTK" value="ok">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
</form>
<script src="{$url}assets/js/edit_taikhoan.js"></script>

