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
				<a href="">Thiết lập khuyến mãi</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-12">
			<div class="ibox-title col-md-12">
				<h5>Thiết lập khuyến mãi</h5>
			</div>
			<div class="ibox">
				<div class="ibox-content col-sm-12" style="margin-bottom: 25px;">
					<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data" id="formKhuyenMai">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="col-md-6">
									<label class="col-sm-4 control-label">Thời gian bắt đầu:</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" name="tgbatdau" value="{date('Y-m-d')}">
									</div>
								</div>
								<div class="col-md-6">
									<label class="col-sm-4 control-label">Thời gian kết thúc:</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" name="tgketthuc" value="{date('Y-m-d', strtotime('next week'))}">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Sản phẩm áp dụng</label>
								<div class="col-sm-10">
									<select class="form-control select2" name="spApDung[]" multiple="multiple" required="">
										{foreach $dsSanPham as $k => $v}
											<option value="{$v.PK_sMaSP}">{$v.sTenSP} ({$v.sDonViTinh})</option>
										{/foreach}
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Số lượng áp dụng</label>
								<div class="col-sm-10">
									<input type="number" value="1" min="1" class="form-control" name="soLuongAD" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Loại khuyến mãi:</label>
								<div class="col-sm-10">
									<select class="form-control" name="ddlLoaiHinhKM">
										<option>Chọn loại khuyến mãi</option>
										{foreach $loaiKhuyenMai as $k => $v}
											<option value="{$v.PK_sMaKM}" data-form="{$k+1}">{$v.sTenKM}</option>
										{/foreach}
									</select>
								</div>
							</div>
							<div id="insertForm"></div>
							<div id="errorPlace"></div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<div class="col-sm-12 col-sm-offset-2">
									{if empty($thongtin.PK_sMaKM)}
									<button type="submit" class="btn btn-primary" name="save" value="ok">Lưu thông tin</button>
									{else}
									<button type="submit" class="btn btn-primary" name="btnCapNhat" value="Cập nhật">Cập nhật</button>
									{/if}
									<button type="reset" class="btn btn-warning" name="btnHuy">Huỷ</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="ibox">
				<div class="ibox">
					<div class="ibox-title">
						<h5>Danh sách chương trình khuyến mãi hiện tại</h5>
					</div>
					<div class="ibox-content">
						<div class="table-responsive">
							<form action="" method="POST">
								<table class="table table-striped table-bordered table-hover datatable">
									<thead>
										<th class="text-center">STT</th>
										<th class="text-center">Tên sản phẩm</th>
										<th class="text-center" width="13%">Áp dụng KM khi mua</th>
										<th class="text-center">Thời gian áp dụng</th>
										<th class="text-center">Nội dung</th>
										<th class="text-center">Tác vụ</th>
									</thead>
									{if !empty($dsKhuyenMaiHienTai)}
									<tbody>
										{foreach $dsKhuyenMaiHienTai as $k => $v}
											<tr>
												<td class="text-center">{$k+1}</td>
												<td>{$v.sTenSP}</td>
												<td>{$v.iSoLuongApDung} {$v.sDonViTinh}</td>
												<td>
													{date('d/m/Y', strtotime($v.dThoiGianBD))} - {date('d/m/Y', strtotime($v.dThoiGianKT))}
												</td>
												<td>
													{if ($v.FK_sMaKM == 'MKM001')}
														- {$v.sNoiDungKM}
													{else}
														Tặng kèm 1 {$dsSanPham[$v.sNoiDungKM]['sTenSP']}
													{/if}
												</td>
												<td>
													<a href="{$url}khuyen-mai?ma={$v.PK_sMaKM}">
														<button type="button" class="btn btn-xs btn-warning" name="btnEditKM" title="Sửa khuyến mại">
															<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
														</button>
													</a>
													<button type="submit" class="btn btn-xs btn-danger" name="btnDelKM" title="Xoá khuyến mại" value="{$v.PK_sMaKM}" onclick="return confirm('Bạn muốn xóa khuyến mại này không?')">
														<i class="fa fa-trash" aria-hidden="true"></i>
													</button>
												</td>
											</tr>
										{/foreach}
									</tbody>
									{/if}
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hidden" id="form1">
	<div class="form-group">
		<label class="col-sm-2 control-label">Loại giảm giá</label>
		<div class="col-sm-10">
			<label class="checkbox-inline i-checks">
				<input type="radio" value="%" name="loaiGiamGia" required> Theo phần trăm
			</label>
			<label class="checkbox-inline i-checks">
				<input type="radio" value="-" name="loaiGiamGia" required> Trừ tiền
			</label>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Giá trị:</label>
		<div class="col-sm-10">
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
<script type="text/javascript" src="assets/js/khuyenmai.js"></script>
