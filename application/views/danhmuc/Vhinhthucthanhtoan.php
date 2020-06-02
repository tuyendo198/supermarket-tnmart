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
				<a href="">Hình thức thanh toán</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="ibox-title col-md-12">
			<div class="col-md-7" style="padding-left: 0px;">
				<h5>Danh sách hình thức thanh toán</h5>
			</div>
			<div class="col-md-5" style="padding-left: 0px; margin-top: -5px; text-align: right;">
				<button type="button" class="btn btn-sm btn-primary" name="btnAddHT" title="Thêm hình thức thanh toán" data-toggle="modal" data-target="#myModal">
					<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Thêm hình thức
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
								<th>STT</th>
								<th>Tên hình thức</th>
								<th>Mô tả</th>
								<th>Tác vụ</th>
							</tr>
							</thead>
							<tbody>
							{foreach $hinhthuc as $key => $value}
							<tr class="gradeX">
								<td>{$stt++}</td>
								<td class="center">{$value.sTenHinhThuc}</td>
								<td class="center">{$value.sMoTa}</td>
								<td class="center">
									<button type="button" class="btn btn-xs btn-warning" name="btnEditHT" value="{$value.PK_iMaHinhThuc}" title="Sửa hình thức thanh toán" data-toggle="modal" data-target="#modalSuaHT">
										<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
									</button>
									<button type="submit" class="btn btn-xs btn-danger" name="btnDelHT" title="Xoá hình thức thanh toán" value="{$value.PK_iMaHinhThuc}" onclick="return confirm('Bạn muốn xóa hình thức thanh toán này không?')">
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

<!-- Modal thêm hình thức thanh toán-->
<form method="POST" class="form-horizontal" id="formAddHT" enctype="multipart/form-data">
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

					<h3 class="modal-title">Thêm hình thức thanh toán</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-sm-3 control-label">Tên hình thức:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="txtHinhThucTT" value="" placeholder="Tên hình thức thanh toán" required="true">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Mô tả:</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="txtMoTa" placeholder="Mô tả hình thức"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btnmodal" name="btnLuuHT" value="add">Lưu thông tin</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- Modal sửa hình thức thanh toán-->
<form method="POST" class="form-horizontal" id="formEditHT" enctype="multipart/form-data">
	<div class="modal fade" id="modalSuaHT" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

					<h3 class="modal-title">Chỉnh sửa hình thức thanh toán</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-sm-3 control-label">Tên hình thức:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="txtHTTT" value="" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Mô tả:</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="mota"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btnmodal" name="btnCapNhatHT" value="capnhat">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script src="{$url}assets/js/edit_hinhthucthanhtoan.js"></script>
