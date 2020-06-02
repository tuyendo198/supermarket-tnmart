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
				<a href="">Huỷ sản phẩm</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-sm-12">
			<div class="tabs-container">
				<form action="" method="POST">
					<ul class="nav nav-tabs">
						<li class="{if $tab=='tab1'}active{/if}"><a data-toggle="tab" href="#tab1">Danh sách sản phẩm sắp hoặc đã hết hạn</a></li>
						<li class="{if $tab=='tab2'}active{/if}"><a data-toggle="tab" href="#tab2">Danh sách sản phẩm đã huỷ</a></li>
						<div class="pull-right m-t-xs">
							<button type="submit" class="btn btn-sm btn-danger" name="btnHuySP" value="huy">
								<i class="fa fa-ban" aria-hidden="true"></i> Huỷ sản phẩm
							</button>
						</div>
					</ul>
					<div class="tab-content">
						<div id="tab1" class="tab-pane {if $tab=='tab1'}active{/if}">
							<div class="panel-body">
								<div class="col-md-12">
									<table class="table table-bordered table-hover datatable2">
										<thead>
											<th width="4%">
												<input type="checkbox" class="i-checks" name="checkall">
											</th>
											<th>Mã SP</th>
											<th>Tên sản phẩm</th>
											<th>Số lượng</th>
											<th>Đơn giá nhập</th>
											<th>Ngày sản xuất</th>
											<th>Hạn sử dụng</th>
											<th width="7%">Tác vụ</th>
										</thead>
										<tbody>
										{if (!empty($listspsaphethan))}
											{foreach $listspsaphethan as $k => $v}
												<tr>
													<td>
														<input type="checkbox" class="i-checks" name="maChiTietPN[]" value="{$v.FK_sMaPN}|{$v.FK_sMaSP}">
													</td>
													<td>{$v.PK_sMaSP}</td>
													<td>{$v.sTenSP}</td>
													<td>{$v.iSoLuongNhap}</td>
													<td>
														{number_format($v.fDonGiaNhap, 0, ',', '.')} đ
													</td>
													<td>
														{date('d/m/Y', strtotime($v.dNgaySanXuat))}
													</td>
													<td>
														{date('d/m/Y', strtotime($v.dHanSuDung))}</td>
													<td>
														<button type="submit" class="btn btn-xs btn-danger" name="huysp" title="Huỷ sản phẩm" value="{$v.FK_sMaPN}|{$v.FK_sMaSP}" data-toggle="modal" data-target="#destroyProd">
															<i class="fa fa-ban" aria-hidden="true"></i>
														</button>
													</td>
												</tr>
											{/foreach}
										{else}
											<tr>
												<td colspan="8">Không có sản phẩm sắp hết hạn</td>
											</tr>
										{/if}
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div id="tab2" class="tab-pane {if $tab=='tab2'}active{/if}">
							<div class="panel-body">
								<div class="col-md-12">
									<table class="table table-bordered table-hover datatable2">
										<thead>
											<th>STT</th>
											<th>Mã SP</th>
											<th>Tên sản phẩm</th>
											<th>Số lượng huỷ</th>
											<th>Đơn giá nhập</th>
											<th>Ngày huỷ</th>
											<th>Ngày sản xuất</th>
											<th>Hạn sử dụng</th>
											<th>Người huỷ</th>
										</thead>
										<tbody>
											{if !empty($listspdahuy)}
												{foreach $listspdahuy as $k => $v}
													<tr>
														<td>{$k+1}</td>
														<td>{$v.PK_sMaSP}</td>
														<td>{$v.sTenSP}</td>
														<td>{$v.iSoLuongHuy}</td>
														<td>{number_format($v.fDonGiaNhap, 0, ',', '.')} đ</td>
														<td>
															{date('d/m/Y',strtotime($v.dNgayHuySP))}
														</td>
														<td>
															{date('d/m/Y',strtotime($v.dNgaySanXuat))}
														</td>
														<td>
															{date('d/m/Y',strtotime($v.dHanSuDung))}
														</td>
														<td>{$v.sNguoiHuy}</td>
													</tr>
												{/foreach}
											{else}
												<tr>
													<td colspan="8">Hiện chưa có sản phẩm nào bị huỷ</td>
												</tr>
											{/if}
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$(document).on('ifChecked','input[name=checkall]',function () {
			$('input[name^=maChiTietPN]').each(function (k,v) {
				$(v).iCheck('check');
			});
		});
		$(document).on('ifUnchecked','input[name=checkall]',function () {
			$('input[name^=maChiTietPN]').each(function (k,v) {
				$(v).iCheck('uncheck');
			});
		});
	});
</script>
