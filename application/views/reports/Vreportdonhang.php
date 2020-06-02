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
				<a href="">Thống kê đơn hàng</a>
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
					<div class="col-md-2">
						<label class="control-label m-t-xs">Tháng:</label>
						<select class="form-control m-b" name="month">
							<option value="">Tất cả tháng</option>
							{for $i=1; $i < 13; $i++}
								<option value="{$i}" {if $i==$month}selected{/if}>Tháng {$i}</option>
							{/for}
						</select>
					</div>
					<div class="col-md-2">
						<label class="control-label m-t-xs">Năm</label>
						<select class="form-control m-b" name="year">
							{foreach $rangeYear as $v}
								<option value="{$v.nam}" {if $v.nam==$year}selected{/if}>{$v.nam}</option>
							{/foreach}
						</select>
					</div>
					<div class="col-md-4">
						<label class="control-label m-t-xs">Hình thức thanh toán:</label>
						<select class="form-control" name="hinhthuc">
							<option value="">Chọn hình thức thanh toán</option>
							{foreach $hinhthuctt as $v}
							<option value="{$v.PK_iMaHinhThuc}" {if $v.PK_iMaHinhThuc==$hinhthuc}selected{/if}>{$v.sTenHinhThuc}</option>
							{/foreach}
						</select>
					</div>
					<div class="col-md-3">
						<label class="control-label m-t-xs">Khách hàng:</label>
						<input type="text" class="form-control" name="khachhang" value="{$khachhang}" placeholder="Tên khách hàng">
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
				<table class="table table-bordered table-hover {if !empty($listdonhang)}datatable-excel{/if}">
					<thead>
						<th>STT</th>
						<th>Mã đơn hàng</th>
						<th>Khách hàng</th>
						<th>Ngày lập</th>
						<th>Hình thức thanh toán</th>
						<th>Thanh toán</th>
						<th>Trạng thái</th>
						<th>Tổng tiền</th>
						<th>Tác vụ</th>
					</thead>
					<tbody>
					{if !empty($listdonhang)}
						{foreach $listdonhang as $k => $val}
							<tr>
								<td>{$k+1}</td>
								<td>{$val.PK_sMaDonHang}</td>
								<td>{$val.sTenNguoiDung}</td>
								<td>{date('d/m/Y', strtotime($val.dNgayLap))}</td>
								<td>{$val.sTenHinhThuc}</td>
								<td>
									{$label = 'success'}
									{if ($val.sThanhToan == "Đã thanh toán")}
										{$label = 'success'}
									{elseif ($val.sThanhToan == "Chưa đặt hàng")}
										{$label = 'warning'}
									{elseif ($val.sThanhToan == "Chưa thanh toán")}
									{/if}
									<span class="text text-{$label}">{$val.sThanhToan}</span>
								</td>
								<td>
									{$label = 'primary'}
									{if ($val.FK_iMaTrangThai == 5)}
										{$label = 'danger'}
									{/if}
									<span class="label label-{$label}">{$val.sTenTrangThai}</span>
								</td>
								<td>{number_format($val.tongtien, 0, ',', '.')} đ</td>
								<td>
									<a href="danh-sach-don-hang?mdh={$val.PK_sMaDonHang}" target="_blank">
										<button type="button" class="btn btn-xs btn-primary" name="btnDetail" value="" title="Xem chi tiết đơn hàng">
											<i class="fa fa-clipboard" aria-hidden="true"></i>
										</button>
									</a>
								</td>
							</tr>
						{/foreach}
					{else}
						<tr>
							<td class="text-center" colspan="9">Không có kết quả tương ứng</td>
						</tr>
					{/if}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
