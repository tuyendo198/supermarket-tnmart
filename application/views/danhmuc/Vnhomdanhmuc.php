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
				<a href="">Nhóm danh mục</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-sm-4">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Thêm nhóm danh mục</h5>
				</div>
				<div class="ibox-content">
					<form action="" method="POST" class="form-horizontal" id="formNhomDM">
						<div class="form-group">
							<label class="col-lg-5 control-label">Tên nhóm DM:</label>

							<div class="col-lg-7">
								<input type="text" name="tennhomdm" placeholder="Tên nhóm danh mục" class="form-control" value="{if isset($thongtin)}{$thongtin.sTenNhomDM}{/if}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-5 control-label">Trạng thái:</label>
							<div class="col-lg-7">
								<select class="form-control m-b" name="status">
									<option {(isset($thongtin) && $thongtin.sTrangThai == 'Có menu con') ? 'selected' : ''}>Có menu con</option>
									<option {(isset($thongtin) && $thongtin.sTrangThai == 'Không có menu con') ? 'selected' : ''}>Không có menu con</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								{if empty($thongtin.PK_iMaNhomDM)}
								<button type="submit" class="btn btn-primary" name="btnThemNDM" value="Thêm">Lưu thông tin</button>
								{else}
								<button type="submit" class="btn btn-primary" name="capnhat" value="Cập nhật">Cập nhật</button>
								{/if}
								<button type="reset" class="btn btn-warning" name="huy" value="Huỷ">Huỷ</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="ibox">
				<div class="ibox-title">
					<h5>Danh sách nhóm danh mục</h5>
				</div>
				<div class="ibox-content">
					<div class="table-responsive">
						<form action="" method="POST">
							<table class="table table-striped table-bordered table-hover datatable">
								<thead>
								<tr>
									<th>STT</th>
									<th>Tên nhóm danh mục</th>
									<th>Trạng thái</th>
									<th>Tác vụ</th>
								</tr>
								</thead>
								<tbody>
								{foreach $theloai as $key => $value}
								<tr class="gradeX">
									<td>{$stt++}</td>
									<td class="center">{$value.sTenNhomDM}</td>
									{if $value.sTrangThai == 'Có menu con'}
									<td class="center footable-visible">
										<span class="label label-primary">{$value.sTrangThai}</span>
									</td>
									{else}
									<td class="center footable-visible">
										<span class="label label-danger">{$value.sTrangThai}</span>
									</td>
									{/if}
									<td class="center">
										<a href="{$url}nhom-danh-muc?ma={$value.PK_iMaNhomDM}">
											<button type="button" class="btn btn-xs btn-warning" name="edit" title="Sửa nhóm danh mục">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											</button>
										</a>
										<button type="submit" class="btn btn-xs btn-danger" name="del" title="Xoá nhóm danh mục" value="{$value.PK_iMaNhomDM}" onclick="return confirm('Bạn muốn xóa nhóm danh mục này không?')">
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
