<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THANH NGA MART</h2>
		<ol class="breadcrumb">
			<li>
				<a href="">Trang chủ</a>
			</li>
			<li>
				<a href="">Bình luận/Đánh giá</a>
			</li>
			<li class="active">Quản lý đánh giá</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-12">
			<div class="ibox-title col-md-12">
				<h5>Danh sách đánh giá</h5>
			</div>
			<div class="ibox">
				<div class="ibox-content">
					<div class="table-responsive">
						<form action="" method="POST">
							<table class="table table-striped table-bordered table-hover datatable">
								<thead>
									<th>STT</th>
									<th>Mã sản phẩm</th>
									<th>Tên sản phẩm</th>
									<th>Đơn giá</th>
									<th>Đơn vị tính</th>
									<th>Đánh giá</th>
								</thead>
								<tbody>
								{foreach $danhgia as $k => $val}
									<tr class="{if ($val.rate['trungbinh'] < 2.5 && $val.rate['soluong'] != 0)}text-danger{elseif ($val.rate['trungbinh'] >= 4)}text-navy{/if}">
										<td>{$k+1}</td>
										<td>
											<a href="detail?ma={$val.PK_sMaSP}" target="_blank">{$val.PK_sMaSP}</a>
										</td>
										<td>{$val.sTenSP}</td>
										<td>{$val.fGiaSP}</td>
										<td>{$val.sDonViTinh}</td>
										<td>
											{$val.rate['trungbinh']}/5 ({$val.rate['soluong']} lượt đánh giá)
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

