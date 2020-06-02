<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THANH NGA MART</h2>
		<ol class="breadcrumb">
			<li>
				<a>Trang chủ</a>
			</li>
			<li>
				<a href="">Quản lý danh mục</a>
			</li>
			<li class="active">
				<a href="">Nhà cung cấp</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Thêm nhà cung cấp</h5>
				</div>
				<div class="ibox-content col-sm-12" style="margin-bottom: 25px;">
					<form action="" method="POST" id="formNCC" class="form-horizontal" enctype="multipart/form-data">
						<div class="col-sm-8">
							<div class="form-group">
								<label class="col-sm-3 control-label">Tên nhà cung cấp:</label>
								<div class="col-sm-8">
									<input type="text" name="tennhacc" placeholder="Tên nhà cung cấp" class="form-control" value="{if isset($thongtin)}{$thongtin.sTenNCC}{/if}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Số điện thoại:</label>
								<div class="col-sm-8">
									<input type="number" name="sdt" placeholder="Số điện thoại" class="form-control" value="{if isset($thongtin)}{$thongtin.sSoDienThoai}{/if}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Địa chỉ:</label>
								<div class="col-sm-8">
									<input type="text" name="diachi" placeholder="Địa chỉ" class="form-control" value="{if isset($thongtin)}{$thongtin.sDiaChi}{/if}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Email:</label>
								<div class="col-sm-8">
									<input type="email" name="email" placeholder="Email" class="form-control" value="{if isset($thongtin)}{$thongtin.sEmail}{/if}">
								</div>
							</div>

							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									{if empty($thongtin.PK_sMaNCC)}
									<button type="submit" class="btn btn-primary" name="themnhacc" value="ok">Lưu thông tin</button>
									{else}
									<button type="submit" class="btn btn-primary" name="capnhat" value="capnhat">Cập nhật</button>
									{/if}
									<button type="reset" class="btn btn-warning" name="huy" value="huy">Huỷ</button>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-sm-12">Logo NCC:</label>
								<div class="col-sm-12">
									<input type="file" name="logoNCC" value="" onchange="readURL(this, '.imgLT');"/>
									<div class="imgLT-parent" style="height: auto; width: 70%;">
										<img src="{if isset($thongtin)}{$thongtin.sLogoNCC}{else}assets/img/avatars/logo.jpg{/if}" class="imgLT img-lg" alt="">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="ibox">
				<div class="ibox">
					<div class="ibox-title col-md-12">
						<h5>Danh sách nhà cung cấp</h5>
					</div>
					<div class="ibox-content">
						<div class="table-responsive">
							<form action="" method="POST">
								<table class="table table-striped table-bordered table-hover datatable">
									<thead>
									<tr>
										<th>STT</th>
										<th>Logo NCC</th>
										<th>Tên nhà cung cấp</th>
										<th>Số điện thoại</th>
										<th width="17%;">Địa chỉ</th>
										<th>Email</th>
										<th>Tác vụ</th>
									</tr>
									</thead>
									<tbody>
									{foreach $nhacc as $value}
										<tr class="gradeX">
											<td>{$stt++}</td>
											<td class="center">
												<div class="dropdown-messages-box">
													<a href="#" class="pull-left" data-gallery="">
														<img class="img-md" src="{$value.sLogoNCC}">
													</a>
												</div>
											</td>
											<td class="center">{$value.sTenNCC}</td>
											<td class="center">{$value.sSoDienThoai}</td>
											<td class="center">{$value.sDiaChi}</td>
											<td class="center">{$value.sEmail}</td>
											<td class="center">
												<a href="{$url}nha-cung-cap?mancc={$value.PK_sMaNCC}">
													<button type="button" class="btn btn-xs btn-warning" name="suanhacc" value="{$value.PK_sMaNCC}" title="Sửa nhà cung cấp">
														<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
													</button>
												</a>
												<button type="submit" class="btn btn-xs btn-danger" name="btnDelNCC" value="{$value.PK_sMaNCC}" title="Xoá nhà cung cấp" onclick="return confirm('Bạn muốn xóa nhà cung cấp này không?')">
													<i class="fa fa-trash" aria-hidden="true"></i>
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
</div>

