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
				<a href="">Danh sách đơn hàng</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-sm-12">
			<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
				<div class="ibox col-md-12">
					<div class="ibox-title col-md-12">
						<div class="col-md-7" style="padding-left: 0px;">
							<h5>Danh sách đơn hàng</h5>
						</div>
						<div class="col-md-5" style="padding-left: 0px; margin-top: -5px; text-align: right;">
							<button type="submit" class="btn btn-sm btn-warning" name="thanhToan" title="Cập nhật thanh toán cho các đơn hàng đã chọn" value="ok">
								<i class="fa fa-yelp" aria-hidden="true"></i> Cập nhật thanh toán
							</button>
							<button type="submit" class="btn btn-sm btn-success" name="trangThaiTiep" title="Chuyển các đơn hàng đã chọn sang trạng thái tiếp theo" value="next">
								<i class="fa fa-paper-plane" aria-hidden="true"></i> Chuyển trạng thái
							</button>
							<!-- <button type="button" class="btn btn-sm btn-primary" name="daHT" title="Đã hoàn thành">
								<i class="fa fa-check" aria-hidden="true"></i> Đã hoàn thành
							</button> -->
						</div>
					</div>
					<div class="ibox-content col-sm-12">
						<div class="ttsp">
							<table class="table table-striped table-bordered table-hover datatable2">
								<thead>
									<th>
										<input type="checkbox" class="i-checks" name="checkall">
									</th>
									<th>Mã ĐH</th>
									<th>Khách hàng</th>
									<th>Ngày lập</th>
									<th width="18%">Thông tin giao hàng</th>
									<th>Số SP</th>
									<th>Tổng tiền</th>
									<th>Thanh toán</th>
									<th>Trạng thái</th>
									<th width="9.5%">Tác vụ</th>
								</thead>
								<tbody>
								{foreach $danhsachdonhang as $v}
									<tr {if (!empty($donvuachange) && in_array($v.PK_sMaDonHang,$donvuachange))}style="background-color: #98f9e5;"{/if}>
										<td>
											<input type="checkbox" class="i-checks" name="maDonHang[]" value="{$v.PK_sMaDonHang}">
										</td>
										<td>
											<a href="danh-sach-don-hang?mdh={$v.PK_sMaDonHang}" title="Xem chi tiết đơn hàng" target="_blank">{$v.PK_sMaDonHang}</a>
										</td>
										<td>{$v.sTenTaiKhoan}</td>
										<td>{date('d/m/Y', strtotime($v.dNgayLap))}</td>
										<td>{$v.sHoTen} ({$v.sSoDienThoai}) - {$v.sDiaChiNhanHang}</td>
										<td>{$v.sosp}</td>
										<td>{number_format($v.tongtien, 0, ',', '.')}đ</td>
										<td>
											{$label = 'info'}
											{if ($v.sThanhToan == "Đã thanh toán")}
												{$label = 'success'}
											{elseif ($v.sThanhToan == "Chưa đặt hàng")}
												{$label = 'warning'}
											{elseif ($v.sThanhToan == "Chưa thanh toán")}
											{/if}
											<span class="text text-{$label}">{$v.sThanhToan}</span>
										</td>
										<td class="center footable-visible">
											{$label = 'primary'}
											{if ($v.FK_iMaTrangThai == 1)}
												{$label = 'warning'}
											{elseif ($v.FK_iMaTrangThai == 2)}
												{$label = 'info'}
											{elseif ($v.FK_iMaTrangThai == 3)}
												{$label = 'success'}
											{elseif ($v.FK_iMaTrangThai == 5)}
												{$label = 'danger'}
											{/if}
											<span class="label label-{$label}">{$v.sTenTrangThai}</span>
										</td>
										<td>
											{if ($v.FK_iMaTrangThai < 4 && $v.FK_iMaTrangThai != 1)}
												<button type="submit" class="btn btn-xs btn-warning" name="chuyenTrangThai" title="Chuyển đơn hàng sang trạng thái tiếp theo" value="{$v.PK_sMaDonHang}">
													<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
												</button>
												<button type="submit" class="btn btn-xs btn-danger" name="huyDonHang" title="Huỷ đơn hàng" value="{$v.PK_sMaDonHang}" onclick="return confirm('Bạn chắc chắn muốn huỷ đơn hàng?')">
													<i class="fa fa-ban" aria-hidden="true"></i>
												</button>
											{/if}
											{if ($v.FK_iMaTrangThai == 4)}
											<a href="{$url}danh-sach-don-hang?mdh={$v.PK_sMaDonHang}&type=print" target="_blank">
												<button type="button" class="btn btn-xs btn-success" name="btnPrint" value="{$v.PK_sMaDonHang}" title="In hoá đơn">
													<i class="fa fa-print" aria-hidden="true"></i>
												</button>
											</a>
											{/if}
											{$time_diff = time() - strtotime($v.sThoiGianXuLy)}
											{$time_diff = $time_diff/60}
											{if (($v.FK_iMaTrangThai == 3 || $v.FK_iMaTrangThai == 4) && ($v.FK_iMaTaiKhoan == $session.mataikhoan) && $time_diff <= 30)}
												<button type="submit" class="btn btn-xs btn-primary" name="backTrangThai" title="Chuyển đơn hàng về trạng thái trước" value="{$v.PK_sMaDonHang}" onclick="return confirm('Bạn chắc chắn muốn chuyển đơn hàng quay lại trạng thái trước?');">
													<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
												</button>
											{/if}
										</td>
									</tr>
								{/foreach}
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$(document).on('ifChecked','input[name=checkall]',function () {
			$('input[name^=maDonHang]').each(function (k,v) {
				$(v).iCheck('check');
			});
		});
		$(document).on('ifUnchecked','input[name=checkall]',function () {
			$('input[name^=maDonHang]').each(function (k,v) {
				$(v).iCheck('uncheck');
			});
		});
	});
</script>
