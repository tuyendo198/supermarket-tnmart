<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THANH NGA MART</h2>
		<ol class="breadcrumb">
			<li>
				<a>Trang chủ</a>
			</li>
			<li>
				<a href="">Quản lý giao dịch</a>
			</li>
			<li class="active">
				<a href="">Tạo đơn hàng</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox">
				<div class="ibox col-md-12">
					<div class="ibox-title">
						<h5>Thông tin sản phẩm</h5>
					</div>
					<div class="ibox-content">
						<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
							<div class="ttsp">
								<select class="form-control select2_placehoder" name="filterProduct">
									<option></option>
									{foreach $listProduct as $v}
										<option value="{$v.PK_sMaSP}">{$v.PK_sMaSP} - {$v.sTenSP}</option>
									{/foreach}
								</select>

								<table class="table table-bordered m-t" id="listProduct">
									<thead>
										<th width="7%">Mã SP</th>
										<th>Tên SP</th>
										<th>Đơn vị tính</th>
										<th width="8%">Số lượng</th>
										<th>Đơn giá</th>
										<th>Thành tiền</th>
										<th class="hideprint">Tác vụ</th>
									</thead>
									<tbody>
										{$tongtien = 0}
										{if !empty($thongTinDon)}
											{foreach $thongTinDon as $k => $v}
												<tr id="{$v.FK_sMaSP}">
													<td>
														<input type="hidden" name="masp[]" value="{$v.FK_sMaSP}">
														{$v.FK_sMaSP}
													</td>
													<td>{$v.sTenSP}</td>
													<td>{$v.sDonViTinh}</td>
													<td>
														<input type="number" class="soluong" name="soluong[]" value="{$v.iSoLuong}" min="1" max="300">
													</td>
													<td data-dongia="{$v.fDonGia}">
														<input type="hidden" name="dongia[]" value="{$v.fDonGia}">
														{number_format($v.fDonGia, 0, ',', '.')}
													</td>
													<td>
														{number_format($v.iSoLuong * $v.fDonGia, 0, ',', '.')}
														{$tongtien = $tongtien + $v.iSoLuong * $v.fDonGia}
													</td>
													<td class="text-center hideprint">
														<button type="button" class="btn btn-xs btn-danger" name="btnXoaSP" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này không?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
													</td>
												</tr>
											{/foreach}
										{/if}
									</tbody>
								</table>
								<div class="thanhtoan col-md-12">
									<h4 style="font-weight: bold;float:right;">Tổng tiền thanh toán: <b style="color: #9f191f;"><span id="tongtien">{number_format($tongtien, 0, ',', '.')}</span> VNĐ</b> </h4>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12 hideprint">
									<label style="float: left; margin-top: 10px;">Tiền khách trả: </label>
									<div class="col-md-3">
										<input class="form-control" type="text" name="tienKhach" style="float: left;" width="30%;">
									</div>
									<label style="margin-top: 12px;">Tiền trả lại: </label>
									<span id="tientralai" style="font-size: 15px;font-weight: bold;color: #d00d0d;">0 VNĐ</span>
									<button type="submit" class="btn btn-primary pull-right" name="savedonhang" disabled value="ok" style="margin-top: 2px;">Lưu đơn hàng</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	@media print {
    	.hideprint{
    		display: none;
    	}
	}
</style>
<script src="assets/js/taodonhang.js"></script>
