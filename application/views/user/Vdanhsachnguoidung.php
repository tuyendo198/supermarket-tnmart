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
			<li class="active">Danh sách người dùng</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-12">
			<div class="ibox-title col-md-12">
				<div class="col-md-8" style="padding-left: 0px;">
					<h5>Danh sách người dùng</h5>
				</div>
				<div class="col-md-4" style="padding-left: 0px; margin-top: -5px; text-align: right;">
					<button type="button" class="btn btn-sm btn-primary pull-right" name="addsp" title="Thêm người dùng" data-toggle="modal" data-target="#myModal">
						<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Thêm
					</button>
				</div>
			</div>
			<div class="ibox">
				<div class="ibox-content">
					<div class="table-responsive">
						<form action="" method="POST">
							<table class="table table-striped table-bordered table-hover datatable">
								<thead>
									<tr>
										<th>Ảnh đại diện</th>
										<th>Tên người dùng</th>
										<th>Ngày sinh</th>
										<th>Giới tính</th>
										<th>Điện thoại</th>
										<th>Địa chỉ</th>
										<th>Email</th>
										<th>Quê quán</th>
										<th>Tác vụ</th>
									</tr>
								</thead>
								<tbody>
								{foreach $danhsachnv as $value}
									<tr>
										<td>
											<div class="dropdown-messages-box">
												<a href="profile.html" class="pull-left" data-gallery="">
													<img class="img-md" src="{$value.sAnhDaiDien}">
												</a>
											</div>
										</td>
										<td>
											{$value.sTenNguoiDung}
										</td>
										<td>{date('d/m/Y',strtotime($value.dNgaySinh))}</td>
										<td class="center footable-visible">
											{if $value.sGioiTinh == 'Nam'}
												{$value.sGioiTinh}
											{else}
												{$value.sGioiTinh}
											{/if}
										</td>
										<td>{$value.sDienThoai}</td>
										<td>{$value.sDiaChi}</td>
										<td>{$value.sEmail}</td>
										<td>{$value.sQueQuan}</td>
										<td>
											<button type="button" class="btn btn-xs btn-warning" name="btnEditUser" title="Sửa thông tin người dùng" value="{$value.PK_sMaND}" data-toggle="modal" data-target="#modalSuaUser">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											</button>
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

<!-- Modal thêm nhân viên-->
<form method="POST" class="form-horizontal" id="formModalUser" enctype="multipart/form-data">
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="width: 1000px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

					<h3 class="modal-title">Thêm người dùng</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-7">
							<div class="form-group">
								<label class="col-sm-3 control-label">Họ và tên:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="tenuser" value="{if isset($info_nv)}{$info_nv.sTenNguoiDung}{/if}" placeholder="Họ và tên">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Ngày sinh:</label>
								<div class="col-sm-9">
									<input type="date" class="form-control" name="sinhnhat" value="{if isset($info_nv)}{$info_nv.dNgaySinh}{/if}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="margin-right: 15px;">Giới tính:</label>
								<div class="col-sm-8 i-checks">
									<input type='radio' name='rdGT' value="Nam" checked> Nam
									<input type='radio' name='rdGT' value="Nữ" {if isset($info_nv) && ($info_nv.sGioiTinh == 'Nữ')}checked{/if}> Nữ
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Địa chỉ:</label>
								<div class="col-sm-9">
									<input type="text" name="txtDiaChi" value="{if isset($info_nv)}{$myinfo.sDiaChi}{/if}" class="form-control" placeholder="Địa chỉ">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Số điện thoại:</label>
								<div class="col-sm-9">
									<input type="text" name="phone" value="{if isset($info_nv)}{$myinfo.sDienThoai}{/if}" class="form-control" placeholder="Số điện thoại">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">CMND:</label>
								<div class="col-sm-9">
									<input type="number" name="txtCMND" value="{if isset($info_nv)}{$myinfo.sCMND}{/if}" class="form-control" placeholder="CMND">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Email:</label>
								<div class="col-sm-9">
									<input type="email" name="txtEmail" value="{if isset($info_nv)}{$myinfo.sEmail}{/if}" class="form-control" placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Quê quán:</label>
								<div class="col-sm-9">
									<input type="text" name="txtQueQuan" value="{if isset($info_nv)}{$myinfo.sQueQuan}{/if}" class="form-control" placeholder="Quê quán">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Hộ khẩu:</label>
								<div class="col-sm-9">
									<input type="text" name="txtHoKhau" value="{if isset($info_nv)}{$myinfo.sHoKhau}{/if}" class="form-control" placeholder="Hộ khẩu">
								</div>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								<input type="file" name="anh" onchange="readURL(this, '#anh');"/>
								<div class="anh_user col-sm-12 text-center">
									<img id="anh" src="{if isset($info_nv)}{$info_nv.sAnhDaiDien}{else}assets/img/avatars/totoro.gif{/if}" title="Click vào ảnh để thay đổi ảnh đại diện" width="270px">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btnmodal" name="btnThemNV" value="add_nv">Lưu thông tin</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- Modal sửa nhân viên-->
<form method="POST" class="form-horizontal" id="formModalCapNhat" enctype="multipart/form-data">
	<div class="modal fade" id="modalSuaUser" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="width: 1000px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title">Sửa thông tin người dùng</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-7">
							<div class="form-group">
								<label class="col-sm-3 control-label">Họ và tên:</label>
								<div class="col-sm-9">
									<input type="text" name="hoten" value="" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Ngày sinh:</label>
								<div class="col-sm-9">
									<input type="date" class="form-control" name="ngaysinh" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" style="margin-right: 15px;">Giới tính:</label>
								<div class="col-sm-8 i-checks">
									<input type='radio' id="nam" name="gt" value="Nam"> Nam
									<input type='radio' id="nu" name="gt" value="Nữ"> Nữ
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Địa chỉ:</label>
								<div class="col-sm-9">
									<input type="text" name="diachi" value="" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Số điện thoại:</label>
								<div class="col-sm-9">
									<input type="text" name="dienthoai" value="" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">CMND:</label>
								<div class="col-sm-9">
									<input type="number" name="cmnd" value="" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Email:</label>
								<div class="col-sm-9">
									<input type="email" name="email" value="" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Quê quán:</label>
								<div class="col-sm-9">
									<input type="text" name="quequan" value="" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Hộ khẩu:</label>
								<div class="col-sm-9">
									<input type="text" name="hokhau" value="" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								<input type="file" name="anhnhanvien" onchange="readURL(this, '#anhnv');"/>
								<div class="anh_user col-sm-12 text-center">
									<img id="anhnv" src="{if isset($info_user)}{$info_user.sAnhDaiDien}{/if}" title="Click vào ảnh để thay đổi ảnh đại diện" width="270px">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btnmodal" name="btnUpdate" value="update_nv">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
</form>
<script src="{$url}assets/js/edit_user.js"></script>
