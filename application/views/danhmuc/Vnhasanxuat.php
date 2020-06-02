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
				<a href="">Nhà sản xuất</a>
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
					<h5>Thêm nhà sản xuất</h5>
				</div>
				<div class="ibox-content col-sm-12" style="margin-bottom: 25px;">
					<form action="" method="POST" id="formNSX" class="form-horizontal" enctype="multipart/form-data">
						<div class="col-sm-8">
							<div class="form-group">
								<label class="col-sm-3 control-label">Tên nhà sản xuất:</label>
								<div class="col-sm-8">
									<input type="text" name="tennhasx" placeholder="Tên nhà sản xuất" class="form-control" value="{if isset($detailNSX)}{$detailNSX.sTenNSX}{/if}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Số điện thoại:</label>
								<div class="col-sm-8">
									<input type="number" name="sdt" placeholder="Số điện thoại" class="form-control" value="{if isset($detailNSX)}{$detailNSX.sSoDienThoai}{/if}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Địa chỉ:</label>
								<div class="col-sm-8">
									<input type="text" name="diachi" placeholder="Địa chỉ" class="form-control" value="{if isset($detailNSX)}{$detailNSX.sDiaChi}{/if}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Email:</label>
								<div class="col-sm-8">
									<input type="email" name="email" placeholder="Email" class="form-control" value="{if isset($detailNSX)}{$detailNSX.sEmail}{/if}">
								</div>
							</div>

							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									{if empty($detailNSX.PK_sMaNSX)}
										<button type="submit" class="btn btn-primary" name="btnAddNSX" value="ok">Lưu thông tin</button>
									{else}
										<button type="submit" class="btn btn-primary" name="btnUpdateNSX" value="capnhat">Cập nhật</button>
									{/if}
									<button type="reset" class="btn btn-warning" name="btnHuy" value="huy">Huỷ</button>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-sm-12">Logo NSX:</label>
								<div class="col-sm-12">
									<input type="file" name="logoNSX" value="" onchange="readURL(this, '.imgLT');"/>
									<div class="imgLT-parent" style="height: auto; width: 70%;">
										<img src="{if isset($detailNSX)}{$detailNSX.sLogoNSX}{else}assets/img/avatars/logo.jpg{/if}" class="imgLT img-lg" alt="">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="ibox">
				<div class="ibox-title col-md-12">
					<h5>Danh sách nhà sản xuất</h5>
				</div>
				<div class="ibox-content">
					<div class="table-responsive">
						<form action="" method="POST">
							<table class="table table-striped table-bordered table-hover datatable" >
								<thead>
									<tr>
										<th>STT</th>
										<th>Logo NSX</th>
										<th>Tên nhà sản xuất</th>
										<th>Số điện thoại</th>
										<th width="15%;">Địa chỉ</th>
										<th>Email</th>
										<th>Tác vụ</th>
									</tr>
								</thead>
								<tbody>
								{foreach $nhasx as $val}
									<tr class="gradeX">
										<td>{$stt++}</td>
										<td class="center">
											<div class="dropdown-messages-box">
												<a href="#" class="pull-left" data-gallery="">
													<img class="img-md" src="{$val.sLogoNSX}">
												</a>
											</div>
										</td>
										<td class="center">{$val.sTenNSX}</td>
										<td class="center">{$val.sSoDienThoai}</td>
										<td class="center">{$val.sDiaChi}</td>
										<td class="center">{$val.sEmail}</td>
										<td class="center">
											<a href="{$url}nha-san-xuat?mansx={$val.PK_sMaNSX}">
												<button type="button" class="btn btn-xs btn-warning" name="btnEditNSX" value="{$val.PK_sMaNSX}" title="Sửa nhà sản xuất">
													<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
												</button>
											</a>
											<button type="submit" class="btn btn-xs btn-danger" name="btnDelNSX" value="{$val.PK_sMaNSX}" title="Xoá nhà sản xuất" onclick="return confirm('Bạn muốn xóa nhà sản xuất này không?')">
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

