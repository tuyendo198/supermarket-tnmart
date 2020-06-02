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
				<a href="">Thống kê sản phẩm</a>
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
					<div class="col-md-3">
						<label class="control-label m-t-xs">Sản phẩm:</label>
						<input type="text" class="form-control" name="sanpham" value="{$sanpham}" placeholder="Tên sản phẩm">
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
				<table class="table table-bordered table-hover {if !empty($listsanpham)}datatable-excel{/if}">
					<thead>
						<th>STT</th>
						<th>Tên sản phẩm</th>
						<th>Giá bán hiện tại</th>
						<th>Giá nhập cao nhất</th>
						<th>Đơn vị tính</th>
						<th>Số lượng nhập</th>
						<th>Số lượng bán</th>
						<th>Số lượng huỷ</th>
						<th>Số lượng còn</th>
					</thead>
					<tbody>
					{if !empty($listsanpham)}
						{foreach $listsanpham as $k => $val}
							<tr>
								<td>{$k+1}</td>
								<td>{$val.sTenSP}</td>
								<td>{number_format($val.fGiaSP, 0, ',', '.')} đ</td>
								<td>{number_format($val.maxGiaNhap, 0, ',', '.')} đ</td>
								<td>{$val.sDonViTinh}</td>
								<td>{$val.soLuongNhap}</td>
								<td>{$val.soLuongBan}</td>
								<td>{$val.soLuongHuy}</td>
								<td>{$val.soLuongCon}</td>
							</tr>
						{/foreach}
					{else}
						<tr>
							<td class="text-center" colspan="8">Không có sản phẩm</td>
						</tr>
					{/if}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
