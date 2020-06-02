<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THANH NGA MART</h2>
		<ol class="breadcrumb">
			<li>
				<a>Trang chủ</a>
			</li>
			<li>
				<a href="">Quản lý nhập hàng</a>
			</li>
			<li class="active">
				<a href="">Nhập hàng</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox-title col-md-12 text-center">
				<h5>Nhập hàng</h5>
			</div>
			<div class="ibox">
				<div class="ibox-content">
					<div class="row">
						<div class="col-md-12">
							<form action="" method="POST" autocomplete="off" id="formnhaphang">
								<div class="form-group col-md-12">
									<label class="col-sm-2 control-label" style="margin-top: 5px;">Ngày nhập:</label>
									<div class="col-sm-4">
										<input type="date" class="form-control" name="tgiannhap" value="{(empty($chitietphieu)) ? date('Y-m-d') : $chitietphieu.dNgaynhap}">
									</div>
									<label class="col-sm-2 control-label" style="margin-top: 5px;">Nhà cung cấp:</label>
									<div class="col-sm-4">
										<select class="form-control m-b select2" name="ddlNhaCC">
											<option value="">Chọn nhà cung cấp</option>
											{foreach $nhacungcap as $v}
												<option value="{$v.PK_sMaNCC}" {if (!empty($chitietphieu) && $v.PK_sMaNCC==$chitietphieu.FK_sMaNCC)}selected{/if}>{$v.sTenNCC}</option>
											{/foreach}
										</select>
									</div>
								</div>

								<table class="table table-bordered" style="margin-bottom: 5px;">
									<thead>
										<th width="20%">Tên mặt hàng</th>
										<th width="8%">Ngày sản xuất</th>
										<th width="8%">Hạn sử dụng</th>
										<th>Số lượng nhập</th>
										<th>Đơn giá nhập</th>
										<th>Thành tiền</th>
										<th width="5%;">Tác vụ</th>
									</thead>
									<tbody class="themsp">
										{if empty($chitietphieu)}
											<tr>
												<td>
													<select class="form-control select2" name="ddlMatHang[]">
														<option value="">Chọn mặt hàng</option>
														{foreach $sp as $val}
															<option value="{$val.PK_sMaSP}" data-giasp="{$val.fGiaSP}">{$val.sTenSP}</option>
														{/foreach}
													</select>
												</td>
												<td>
													<input type="date" class="form-control" autocomplete="off" name="ngaysanxuat[]" required>
												</td>
												<td>
													<input type="date" class="form-control" autocomplete="off" name="hansudung[]" required>
												</td>
												<td>
													<input type="text" class="form-control" name="soluong[]" autocomplete="off" required>
												</td>
												<td>
													<input type="text" class="form-control" name="dongia[]" autocomplete="off" required>
												</td>
												<td>
													<input type="text" class="form-control" name="thanhtien[]" value="" disabled>
												</td>
												<td class="text-center">
													<button type="button" class="btn btn-xs btn-danger" name="btnDel" onclick="return confirm('Bạn muốn xóa sản phẩm nhập này không?')">
														<i class="fa fa-trash" aria-hidden="true"></i>
													</button>
												</td>
											</tr>
										{else}
											{foreach $chitietphieu.chitiet as $k => $v}
											<tr>
												<td>
													<select class="form-control select2" name="ddlMatHang[]">
														<option value="">Chọn mặt hàng</option>
														{foreach $sp as $val}
															<option value="{$val.PK_sMaSP}" data-giasp="{$val.fGiaSP}" {if ($val.PK_sMaSP==$v.FK_sMaSP)}selected{/if}>{$val.sTenSP}</option>
														{/foreach}
													</select>
												</td>
												<td>
													<input type="date" class="form-control" autocomplete="off" name="ngaysanxuat[]" value="{$v.dNgaySanXuat}">
												</td>
												<td>
													<input type="date" class="form-control" autocomplete="off" name="hansudung[]" value="{$v.dHanSuDung}">
												</td>
												<td>
													<input type="text" class="form-control" autocomplete="off" name="soluong[]" value="{$v.iSoLuongNhap}">
												</td>
												<td>
													<input type="text" class="form-control" autocomplete="off" name="dongia[]" value="{$v.fDonGiaNhap}">
												</td>
												<td>
													<input type="text" class="form-control" name="thanhtien[]" value="{number_format($v.iSoLuongNhap * $v.fDonGiaNhap, 0, ',', '.')}" disabled>
												</td>
												<td class="text-center">
													<button type="button" class="btn btn-xs btn-danger" name="btnDel" onclick="return confirm('Bạn muốn xóa sản phẩm nhập này không?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
												</td>
											</tr>
											{/foreach}
										{/if}
									</tbody>
								</table>
								<button type="button" class="btn btn-xs btn-primary pull-right" name="btnAdd" title="Thêm mặt hàng">
									<i class="fa fa-plus" aria-hidden="true"></i>
								</button>

								<div class="col-sm-6" style="margin-top: 20px; padding-left: 0px;">
									{if !empty($mapn)}
										<button type="submit" class="btn btn-primary" name="btnCapNhat" value="{$mapn}">Cập nhật</button>
									{else}
										<button type="submit" class="btn btn-primary" name="btnLuu" value="ok">Lưu thông tin</button>
									{/if}
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hidden" id="addSelect">
	<select class="form-control chosen" name="ddlMatHang[]">
		<option value="">Chọn mặt hàng</option>
		{foreach $sp as $val}
		<option value="{$val.PK_sMaSP}" data-giasp="{$val.fGiaSP}">{$val.sTenSP}</option>
		{/foreach}
	</select>
</div>

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cảnh báo</h4>
			</div>
			<div class="modal-body">
				<h3 id="modal-warning" class="text-center" style="line-height: 1.5; padding: 0 15px;"></h3>
			</div>
			<div class="modal-footer">
				<button type="button" name="agree" value="ok" class="btn btn-primary">Cập nhật</button>
				<button type="button" name="disAgree" value="ok" class="btn btn-default" data-dismiss="modal">Không thay đổi</button>
			</div>
		</div>
	</div>
</div>
<div id="modalGiaMoi" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Thông báo</h4>
			</div>
			<div class="modal-body">
				<h4 id="modal-notice" style="line-height: 1.5;"></h4>
				<div class="form-group">
					<input type="text" name="giabanmoi" class="form-control" placeholder="Giá mới">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" name="confirm" value="ok" class="btn btn-primary">Xác nhận</button>
			</div>
		</div>
	</div>
</div>
<script src="{$url}assets/js/edit_phieunhap.js"></script>
