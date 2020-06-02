<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THANH NGA MART</h2>
		<ol class="breadcrumb">
			<li>
				<a>Trang chủ</a>
			</li>
			<li>
				<a href="">Báo cáo thống kê</a>
			</li>
			<li class="active">
				<a href="">Thống kê nhập hàng</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="ibox-content m-b-sm border-bottom">
		<div class="row">
			<form action="" method="GET">
				<div class="form-group col-md-12" style="padding: 0px; margin-bottom: 0px;">
					<div class="col-md-3">
						<label class="control-label m-t-xs">Ngày nhập:</label>
						<input type="date" class="form-control" name="ngaynhap" value="{$ngaynhap}">
					</div>
					<div class="col-md-3">
						<label class="control-label" style="margin-top: 5px;">Nhà cung cấp:</label>
						<select class="form-control m-b select2" name="nhacc">
							<option value="">Chọn nhà cung cấp</option>
							{foreach $nhacungcap as $v}
							<option value="{$v.PK_sMaNCC}" {if $v.PK_sMaNCC==$nhacc}selected{/if}>{$v.sTenNCC}</option>
							{/foreach}
						</select>
					</div>
					<div class="col-md-3">
						<label class="control-label m-t-xs">Mặt hàng:</label>
						<select class="form-control select2" name="sanpham">
							<option value="">Chọn mặt hàng</option>
							{foreach $sp as $v}
							<option value="{$v.PK_sMaSP}" {if $v.PK_sMaSP==$sanpham}selected{/if}>{$v.sTenSP}</option>
							{/foreach}
						</select>
					</div>
					<div class="col-md-2">
						<label class="control-label m-t-xs">Người nhập:</label>
						<input type="text" class="form-control" name="nguoinhap" value="{$nguoinhap}" placeholder="Tên người nhập">
					</div>
					<div style="margin-top: 27px;">
						<button type="submit" class="btn btn-success">Tìm kiếm</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="ibox">
		<div class="ibox-content">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover {if !empty($listphieunhap)}datatable-excel{/if}">
					<thead>
						<th>STT</th>
						<th>Mã phiếu nhập</th>
						<th>Người nhập</th>
						<th>Ngày nhập</th>
						<th>Nhà cung cấp</th>
						<th>Tổng tiền</th>
						<th>Tác vụ</th>
					</thead>
					<tbody>
					{if !empty($listphieunhap)}
						{foreach $listphieunhap as $k => $val}
							<tr>
								<td>{$k+1}</td>
								<td class="center">{$val.PK_sMaPN}</td>
								<td class="center">{$val.sTenNguoiDung}</td>
								<td class="center">{date('d/m/Y', strtotime($val.dNgaynhap))}</td>
								<td class="center">{$val.sTenNCC}</td>
								<td class="center">{number_format($val.tongtien, 0, ',', '.')} đ</td>
								<td class="center">
									<a href="nhap-hang?ma={$val.PK_sMaPN}&type=view" target="_blank">
										<button type="button" class="btn btn-xs btn-primary" name="btnDetail" value="" title="Xem chi tiết phiếu nhập">
											<i class="fa fa-clipboard" aria-hidden="true"></i>
										</button>
									</a>
								</td>
							</tr>
						{/foreach}
					{else}
						<tr>
							<td colspan="7" class="text-center">Không có kết quả tương ứng</td>
						</tr>
					{/if}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
