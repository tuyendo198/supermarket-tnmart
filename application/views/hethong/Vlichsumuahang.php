<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THANH NGA MART</h2>
		<ol class="breadcrumb">
			<li>
				<a href="">Trang chủ</a>
			</li>
			<li>
				<a href="">Quản lý hệ thống</a>
			</li>
			<li class="active">Lịch sử mua hàng</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-12">
			{if (empty($matk))}
				<div class="ibox-title col-md-12">
					<h5>Danh sách khách hàng trên hệ thống</h5>
				</div>
				<div class="ibox">
					<div class="ibox-content">
						<div class="table-responsive">
							<form action="" method="POST">
								<table class="table table-striped table-bordered table-hover datatable">
									<thead>
										<th>STT</th>
										<th>Tên người dùng</th>
										<th>Ngày sinh</th>
										<th>Giới tính</th>
										<th>Số điện thoại</th>
										<th>Số đơn hàng</th>
										<th>Tổng số tiền</th>
										<th>Tác vụ</th>
									</thead>
									<tbody>
									{foreach $listKhachHang as $k => $v}
										<tr>
											<td>{$k+1}</td>
											<td>{$v.sTenNguoiDung}</td>
											<td>{date('d/m/Y', strtotime($v.dNgaySinh))}</td>
											<td>{$v.sGioiTinh}</td>
											<td>{$v.sDienThoai}</td>
											<td>{$v.sodonhang}</td>
											<td>{number_format($v.tongtien, 0, ',', '.')}</td>
											<td>
												{if ($v.sodonhang > 0)}
												<a href="lichsumuahang?id={$v.PK_iMaTaiKhoan}">
													<button type="button" class="btn btn-xs btn-primary" title="Chi tiết lịch sử">
														<i class="fa fa-file-text-o" aria-hidden="true"></i>
													</button>
												</a>
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
			{else}
				<div class="ibox-title col-md-12">
					<h5>Lịch sử mua hàng của khách hàng {$info.sTenNguoiDung} ({$info.sDienThoai})</h5>
				</div>
				<div class="ibox">
					<div class="ibox-content">
						<div class="table-responsive">
							<form action="" method="POST">
								<table class="table table-striped table-bordered table-hover datatable">
									<thead>
										<th>STT</th>
										<th>Mã đơn hàng</th>
										<th>Ngày lập</th>
										<th>Thanh toán</th>
										<th>Trạng thái</th>
										<th>Số sản phẩm</th>
										<th>Tổng tiền</th>
										<th>Tác vụ</th>
									</thead>
									<tbody>
									{foreach $listDonHang as $k => $v}
										<tr>
											<td>{$k+1}</td>
											<td>
												<a href="danh-sach-don-hang?mdh={$v.PK_sMaDonHang}" target="_blank">
													{$v.PK_sMaDonHang}
												</a>
											</td>
											<td>{date('d/m/Y', strtotime($v.dNgayLap))}</td>
											<td>{$v.sThanhToan}</td>
											<td>{$v.sTenTrangThai}</td>
											<td>{$v.sosp}</td>
											<td>{number_format($v.tongtien, 0, ',', '.')}</td>
											<td>
												<a href="danh-sach-don-hang?mdh={$v.PK_sMaDonHang}" target="_blank">
													<button type="button" class="btn btn-xs btn-success">Chi tiết</button>
												</a>
											</td>
										</tr>
									{/foreach}
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
			{/if}
		</div>
	</div>
</div>

