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
				<a href="">Danh sách sản phẩm</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-12">
			<div class="ibox-title col-md-12">
				<div class="col-md-7" style="padding-left: 0px;">
					<h5>Danh sách sản phẩm</h5>
				</div>
				<div class="col-md-5" style="padding-left: 0px; margin-top: -5px; text-align: right;">
					<button type="button" class="btn btn-sm btn-primary" name="addsp" title="Thêm sản phẩm" data-toggle="modal" data-target="#myModal">
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
										<th>Mã SP</th>
										<th width="15%;">Tên sản phẩm</th>
										<th>Giá sản phẩm</th>
										<th width="18%;">Mô tả</th>
										<th>SL còn</th>
										<th>ĐVT</th>
										<th>Nhóm sản phẩm</th>
										<th width="5%;">Trạng thái</th>
										<th>Tác vụ</th>
									</tr>
								</thead>
								<tbody>
								{foreach $danhsachsp as $value}
									<tr>
										<td>
											<a href="{$url}detail?ma={$value.PK_sMaSP}" target="_blank">
												{$value.PK_sMaSP}
											</a>
										</td>
										<td>{$value.sTenSP}</td>
										<td>{number_format({$value.fGiaSP})} VNĐ</td>
										<td>
											<span>{$value.sMoTa}</span>
										</td>
										<td>
											{if isset($soluongcon[$value.PK_sMaSP])}
												{$soluongcon[$value.PK_sMaSP]}
											{else}
												0
											{/if}
										</td>
										<td>{$value.sDonViTinh}</td>
										<td>{$value.sTenNhomSP}</td>
										<td class="center footable-visible">
											{if isset($soluongcon[$value.PK_sMaSP]) && $soluongcon[$value.PK_sMaSP] > 0}
												<span class="label label-primary">Còn hàng</span>
											{else}
												<span class="label label-danger">Hết hàng</span>
											{/if}
										</td>
										<td>
											<button type="button" class="btn btn-xs btn-warning" name="btnEdit" title="Sửa sản phẩm" value="{$value.PK_sMaSP}" data-toggle="modal" data-target="#modalSua">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											</button>
											{if ($session['maquyen']==1)}
											<button type="button" class="btn btn-xs btn-danger" name="set_km" title="Thiết lập khuyến mại sản phẩm" value="{$value.PK_sMaSP}" data-toggle="modal" data-target="#mySale">
												<i class="fa fa-wrench" aria-hidden="true"></i>
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

<!-- Modal thêm sản phẩm-->
<form method="POST" class="form-horizontal" id="formAddSP" enctype="multipart/form-data">
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="width: 1000px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

					<h3 class="modal-title">Thêm sản phẩm</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label class="col-sm-4 control-label">Nhóm sản phẩm:</label>
								<div class="col-sm-8">
									<select class="form-control m-b" name="ddlNhomSP" required>
										<option value="">Chọn nhóm sản phẩm</option>
										{foreach $danhmuc as $v}
											<option value="{$v.PK_sMaNhomSP}">{$v.sTenNhomSP}</option>
										{/foreach}
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Tên sản phẩm:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="txtTenSP" value="" placeholder="Tên sản phẩm">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Giá bán:</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" name="txtGia" value="" placeholder="Giá bán">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Mô tả:</label>
								<div class="col-sm-8">
									<textarea rows="6" class="form-control" name="txtMota" placeholder="Mô tả sản phẩm"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Đơn vị tính:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="txtDVT" value="" placeholder="Đơn vị tính">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Nhà sản xuất:</label>
								<div class="col-sm-8">
									<select class="form-control m-b" name="ddlNSX" required>
										<option value="">Chọn nhà sản xuất</option>
										{foreach $nhasx as $v}
											<option value="{$v.PK_sMaNSX}">{$v.sTenNSX}</option>
										{/foreach}
									</select>
								</div>
							</div>
						</div>
						<div class="form-group col-md-5">
							<input type="file" name="anhdaidien" onchange="readURL(this, '.imgLT');"/>
							<div class="imgLT img-responsive">
								<img src="{if isset($tt)}{$tt.sAnhDaiDien}{else}assets/img/avatars/logo.jpg{/if}" class="imgLT" title="Chọn ảnh đại diện" alt="" width="100%" height="auto;">
							</div>
							<div class="col-md-12 anh_sp">
								<div class="col-md-3 anh">
									<div class="fallback" style="height: 85px;">
										<input type="file" name="anhsp_1" onchange="readURL(this, '.anh1');"/>
									</div>
									<div class="imgLT-parent">
										<img src="{if isset($album)}{$album.sLink}{/if}" class="anh1" title="Chọn ảnh" width="96%" height="110px;">
									</div>
								</div>
								<div class="col-md-3 anh">
									<div class="fallback" style="height: 85px;">
										<input type="file" name="anhsp_2" onchange="readURL(this, '.anh2');"/>
									</div>
									<div class="imgLT-parent">
										<img src="{if isset($album)}{$album.sLink}{/if}" class="anh2" title="Chọn ảnh" width="96%" height="110px;">
									</div>
								</div>
								<div class="col-md-3 anh">
									<div class="fallback" style="height: 85px;">
										<input type="file" name="anhsp_3" onchange="readURL(this, '.anh3');"/>
									</div>
									<div class="imgLT-parent">
										<img src="{if isset($album)}{$album.sLink}{/if}" class="anh3" title="Chọn ảnh" width="96%" height="110px;">
									</div>
								</div>
								<div class="col-md-3 anh">
									<div class="fallback" style="height: 85px;">
										<input type="file" name="anhsp_4" onchange="readURL(this, '.anh4');"/>
									</div>
									<div class="imgLT-parent">
										<img src="{if isset($album)}{$album.sLink}{/if}" class="anh4" title="Chọn ảnh" width="96%" height="110px;">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<label class="col-sm-2 control-label"style="margin-left: 18px;">Thông tin SP:</label>
							<div class="col-md-10" style="margin-left: -18px; padding-left: 30px;">
								<textarea class="form-control" name="chitietsp" rows="8" required="required"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btnmodal" name="btnThem" value="add">Thêm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- Modal sửa sản phẩm-->
<form method="POST" class="form-horizontal" id="formModalUpdate" enctype="multipart/form-data">
	<div class="modal fade" id="modalSua" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="width: 1000px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

					<h3 class="modal-title">Cập nhật sản phẩm</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label">Nhóm sản phẩm:</label>
								<div class="col-sm-8">
									<select class="form-control m-b" name="nhomsp" required>
										<option>Chọn nhóm sản phẩm</option>
										{foreach $danhmuc as $v}
											<option value="{$v.PK_sMaNhomSP}">{$v.sTenNhomSP}</option>
										{/foreach}
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Tên sản phẩm:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="tensp" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Giá bán:</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" name="giasp" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Mô tả:</label>
								<div class="col-sm-8">
									<textarea rows="10" class="form-control" name="mota"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Đơn vị tính:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="donvitinh" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Nhà sản xuất:</label>
								<div class="col-sm-8">
									<select class="form-control m-b" name="nhasx" required>
										<option>Chọn nhà sản xuất</option>
										{foreach $nhasx as $v}
										<option value="{$v.PK_sMaNSX}">{$v.sTenNSX}</option>
										{/foreach}
									</select>
								</div>
							</div>
						</div>
						<div class="form-group col-md-6">
							<input type="file" name="anhdaidien" onchange="readURL(this, '.imgLT');"/>
							<div class="imgLT img-responsive">
								<img src="{if isset($tt)}{$tt.sAnhDaiDien}{/if}" class="imgLT" name="anhdaidien" alt="" width="100%" height="auto;">
							</div>
							<div class="col-md-12 anh_sp">
								<div class="col-md-3 anh">
									<div class="fallback" style="height: 85px;">
										<input type="file" name="anhsp_1" onchange="readURL(this, '.anh1');"/>
									</div>
									<div class="imgLT-parent">
										<img src="{if isset($album)}{$album.sLink}{/if}" class="anh1" name="anhsp_01" title="Chọn ảnh" width="96%" height="110px;">
									</div>
								</div>
								<div class="col-md-3 anh">
									<div class="fallback" style="height: 85px;">
										<input type="file" name="anhsp_2" onchange="readURL(this, '.anh2');"/>
									</div>
									<div class="imgLT-parent">
										<img src="{if isset($album)}{$album.sLink}{/if}" class="anh2" name="anhsp_02" title="Chọn ảnh" width="96%" height="110px;">
									</div>
								</div>
								<div class="col-md-3 anh">
									<div class="fallback" style="height: 85px;">
										<input type="file" name="anhsp_3" onchange="readURL(this, '.anh3');"/>
									</div>
									<div class="imgLT-parent">
										<img src="{if isset($album)}{$album.sLink}{/if}" class="anh3" name="anhsp_03" title="Chọn ảnh" width="96%" height="110px;">
									</div>
								</div>
								<div class="col-md-3 anh">
									<div class="fallback" style="height: 85px;">
										<input type="file" name="anhsp_4" onchange="readURL(this, '.anh4');"/>
									</div>
									<div class="imgLT-parent">
										<img src="{if isset($album)}{$album.sLink}{/if}" class="anh4" name="anhsp_04" title="Chọn ảnh" width="96%" height="110px;">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<label class="col-sm-2 control-label" style="margin-left: -10px;">Thông tin SP:</label>
							<div class="col-md-10" style="padding-left: 15px;">
								<textarea name="detail_sp" id="detail_sp" rows="8" required class="form-control"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btnmodal" name="btnCapnhat" value="add">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- Modal thiết lập khuyến mại-->
<form method="POST" class="form-horizontal" id="formModalSale" enctype="multipart/form-data">
	<div class="modal fade" id="mySale" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="width: 1000px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

					<h3 class="modal-title">Thiết lập khuyến mại sản phẩm</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-sm-4 control-label">Thời gian bắt đầu:</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" name="tgbatdau" value="{date('Y-m-d')}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Số lượng áp dụng:</label>
									<div class="col-sm-8">
										<input type="number" class="form-control" name="sl_apdung" value="1" placeholder="Số lượng áp dụng">
									</div>
								</div>

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-sm-4 control-label">Thời gian kết thúc:</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" name="tgketthuc" value="{date('Y-m-d', strtotime('next week'))}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Loại khuyến mại:</label>
									<div class="col-sm-8">
										<select class="form-control" name="ddlLoaiHinhKM">
											<option>Chọn loại khuyến mãi</option>
											{foreach $loaiKhuyenMai as $k => $v}
											<option value="{$v.PK_sMaKM}" data-form="{$k+1}">{$v.sTenKM}</option>
											{/foreach}
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btnmodal" name="btnThietLap" value="add">Thiết lập</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
</form>
<div class="hidden" id="form1">
	<div class="form-group">
		<label class="col-sm-4 control-label">Loại giảm giá</label>
		<div class="col-sm-8">
			<label class="checkbox-inline i-checks">
				<input type="radio" value="%" name="loaiGiamGia" required> Theo phần trăm
			</label>
			<label class="checkbox-inline i-checks">
				<input type="radio" value="-" name="loaiGiamGia" required> Trừ tiền
			</label>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Giá trị:</label>
		<div class="col-sm-8">
			<input type="number" name="noidungkm" min="0" class="form-control" required="">
		</div>
	</div>
</div>
<div class="hidden" id="form2">
	<div class="form-group">
		<label class="col-sm-2 control-label">Sản phẩm tặng kèm</label>
		<div class="col-sm-10">
			<select class="form-control" name="spTangKem" required="">
				<option>Chọn sản phẩm tặng kèm</option>
				{foreach $dsSanPham as $k => $v}
				<option value="{$v.PK_sMaSP}">{$v.sTenSP}</option>
				{/foreach}
			</select>
		</div>
	</div>
</div>
<script src="{$url}assets/js/edit_sp.js"></script>
<script type="text/javascript" src="{$url}assets/js/khuyenmai.js"></script>
