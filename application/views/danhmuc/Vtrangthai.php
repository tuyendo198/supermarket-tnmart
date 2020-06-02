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
				<a href="">Danh mục trạng thái</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-sm-5">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Thêm trạng thái</h5>
				</div>
				<div class="ibox-content">
					<form action="" method="POST" class="form-horizontal" id="formNhomDM">
						<div class="form-group">
							<label class="col-lg-4 control-label">Tên trạng thái:</label>

							<div class="col-lg-8">
								<input type="text" name="txtTrangThai" placeholder="Tên trạng thái" class="form-control" value="{if isset($thongtin)}{$thongtin.sTenTrangThai}{/if}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								{if empty($thongtin.PK_iMaTrangThai)}
								<button type="submit" class="btn btn-primary" name="btnLuuTT" value="ok">Lưu thông tin</button>
								{else}
								<button type="submit" class="btn btn-primary" name="btnCapNhat" value="Cập nhật">Cập nhật</button>
								{/if}
								<button type="reset" class="btn btn-warning" name="huy" value="Huỷ">Huỷ</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-7">
			<div class="ibox">
				<div class="ibox-title">
					<h5>Danh sách trạng thái</h5>
				</div>
				<div class="ibox-content">
					<div class="table-responsive">
						<form action="" method="POST">
							<table class="table table-striped table-bordered table-hover datatable">
								<thead>
								<tr>
									<th>STT</th>
									<th>Tên trạng thái</th>
									<th>Tác vụ</th>
								</tr>
								</thead>
								<tbody>
								{foreach $status as $key => $value}
								<tr class="gradeX">
									<td>{$stt++}</td>
									<td class="center">{$value.sTenTrangThai}</td>
									<td class="center">
										<a href="{$url}status?ma={$value.PK_iMaTrangThai}">
											<button type="button" class="btn btn-xs btn-warning" name="btnEditTT" title="Sửa trạng thái">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											</button>
										</a>
										<button type="submit" class="btn btn-xs btn-danger" name="btnDelTT" title="Xoá trạng thái" value="{$value.PK_iMaTrangThai}" onclick="return confirm('Bạn muốn xóa trạng thái này không?')">
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
