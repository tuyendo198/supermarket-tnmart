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
				<a href="">Danh sách phiếu nhập</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				<div class="ibox">
					<div class="ibox-title">
						<h5>Danh sách phiếu nhập</h5>
					</div>
					<div class="ibox-content">
						<div class="table-responsive">
							<form action="" method="POST">
								<table class="table table-striped table-bordered table-hover datatable">
									<thead>
										<tr>
											<th>STT</th>
											<th>Mã phiếu nhập</th>
											<th>Người nhập</th>
											<th>Ngày nhập</th>
											<th>Nhà cung cấp</th>
											<th>Tác vụ</th>
										</tr>
									</thead>
									<tbody>
										{foreach $tt_phieunhap as $k => $val}
											<tr class="gradeX">
												<td class="center">{$k+1}</td>
												<td class="center">
													{$val.PK_sMaPN}
												</td>
												<td class="center">{$val.sTenNguoiDung}</td>
												<td class="center">{date('d/m/Y', strtotime($val.dNgaynhap))}</td>
												<td class="center">{$val.sTenNCC}</td>
												<td class="center">
													<a href="{$url}nhap-hang?ma={$val.PK_sMaPN}&type=view" target="_blank">
														<button type="button" class="btn btn-xs btn-success" name="btnDetail" value="{$val.PK_sMaPN}" title="Xem chi tiết phiếu nhập">
															<i class="fa fa-eye" aria-hidden="true"></i>
														</button>
													</a>
													<a href="{$url}nhap-hang?ma={$val.PK_sMaPN}">
														<button type="button" class="btn btn-xs btn-warning" name="btnEditPN" value="{$val.PK_sMaPN}" title="Sửa phiếu nhập">
															<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
														</button>
													</a>
													{if ($val.FK_iMaTaiKhoan == $session.mataikhoan)}
													<button type="submit" class="btn btn-xs btn-danger" name="btnDelPN" value="{$val.PK_sMaPN}" onclick="return confirm('Bạn muốn xóa phiếu nhập này không?')" title="Xoá phiếu nhập">
														<i class="fa fa-trash" aria-hidden="true"></i>
													</button>
													{/if}
													<a href="{$url}nhap-hang?ma={$val.PK_sMaPN}&type=print" target="_blank">
														<button type="button" class="btn btn-xs btn-primary" name="btnPrint" value="{$val.PK_sMaPN}" title="In phiếu nhập">
															<i class="fa fa-print" aria-hidden="true"></i>
														</button>
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
			</div>
		</div>
	</div>
</div>
