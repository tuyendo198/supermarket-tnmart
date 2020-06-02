<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THANH NGA MART</h2>
		<ol class="breadcrumb">
			<li>
				<a>Trang chủ</a>
			</li>
			<li>
				<a href="">Quản lý sản phẩm</a>
			</li>
			<li class="active">
				<a href="">Nhóm sản phẩm</a>
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
					<h5>Thêm nhóm sản phẩm</h5>
				</div>
				<div class="ibox-content">
					<form action="" method="POST" id="formNhomSP" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-lg-2 control-label">Tên nhóm sản phẩm:</label>

							<div class="col-lg-9">
								<input type="text" name="txtTenloaitin" placeholder="Tên nhóm sản phẩm" class="form-control" value="{if isset($thongtin)}{$thongtin.sTenNhomSP}{/if}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Nhóm danh mục:</label>

							<div class="col-lg-9">
								<select class="form-control m-b" name="ddlTheloai">
									{foreach $tentl as $val}
									<option value="{$val.PK_iMaNhomDM}" {if isset($thongtin) && ($thongtin.FK_iMaNhomDM == $val.PK_iMaNhomDM)}selected{/if}>{$val.sTenNhomDM}</option>
									{/foreach}
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label" style="padding-top: 0px;">Trạng thái menu:</label>

							<div class="col-lg-9">
								<div class="i-checks">
									<label>
										<input type="radio" value="show" name="tt" checked>
										<i></i>Hiện
									</label>
									<label>
										<input type="radio" value="hidden" name="tt" {if isset($thongtin) && ($thongtin.sTrangThai == 'hidden')}checked{/if}>
										<i></i>Ẩn
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Chọn ảnh:</label>

							<div class="col-lg-9">
								<div class="fallback">
									<div class="text-file">
										<strong>Drop files here or click to upload.</strong>
									</div>
								</div>
								<input type="file" name="file" onchange="readURL(this, '.imgLT');"/>
								<div class="imgLT-parent">
									<img src="{if isset($thongtin)}{$thongtin.sAnhQC}{/if}" class="imgLT" alt="" width="100%" height="110px;">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-12">
								{if empty($thongtin.PK_sMaNhomSP)}
									<button type="submit" class="btn btn-primary" name="btnThem" value="save">Lưu thông tin</button>
								{else}
									<button class="btn btn-primary" type="submit" name="btnCapNhatNSP" value="Cập nhật">Cập nhật</button>
								{/if}
								<button type="reset" class="btn btn-warning" name="btnHuy">Huỷ</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="ibox">
				<div class="ibox">
					<div class="ibox-title">
						<h5>Danh sách nhóm sản phẩm</h5>
					</div>
					<div class="ibox-content">
						<div class="table-responsive">
							<form action="" method="POST">
								<table class="table table-striped table-bordered table-hover datatable">
									<thead>
									<tr>
										<th>STT</th>
										<th>Tên nhóm sản phẩm</th>
										<th>Tên nhóm danh mục</th>
										<th>Ảnh slide</th>
										<th>Trạng thái</th>
										<th>Tác vụ</th>
									</tr>
									</thead>
									<tbody>
									{foreach $danhmuc as $val}
									<tr class="gradeX">
										<td>{$stt++}</td>
										<td class="center">{$val.sTenNhomSP}</td>
										<td class="center">{$val.sTenNhomDM}</td>
										<td class="center">{$val.sAnhQC}</td>
										{if $val.sTrangThai == 'show'}
										<td class="center footable-visible">
											<span class="label label-primary">Hiện</span>
										</td>
										{else}
										<td class="center footable-visible">
											<span class="label label-danger">Ẩn</span>
										</td>
										{/if}
										<td class="center">
											<a href="{$url}nhom-san-pham?ma={$val.PK_sMaNhomSP}">
												<button type="button" class="btn btn-xs btn-warning" name="btnEdit" value="{$val.PK_sMaNhomSP}" title="Sửa nhóm sản phẩm">
													<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
												</button>
											</a>
											<button type="submit" class="btn btn-xs btn-danger" name="btnDel" value="{$val.PK_sMaNhomSP}" onclick="return confirm('Bạn muốn xóa nhóm sản phẩm này không?')" title="Xoá nhóm sản phẩm">
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
