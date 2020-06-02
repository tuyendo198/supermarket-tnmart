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
			<li class="active">Quản lý bình luận</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-12">
			<div class="ibox-title col-md-12">
				<h5>Danh sách bình luận</h5>
			</div>
			<div class="ibox">
				<div class="ibox-content">
					<div class="table-responsive">
						<form action="" method="POST">
							<table class="table table-striped table-bordered table-hover datatable">
								<thead>
									<tr>
										<th>STT</th>
										<th>Mã SP</th>
										<th width="20%">Tên sản phẩm</th>
										<th>Người bình luận</th>
										<th width="25%">Nội dung bình luận</th>
										<th>Ngày bình luận</th>
										<th>Tác vụ</th>
									</tr>
								</thead>
								<tbody>
								{foreach $binhluan as $k => $val}
									<tr>
										<td>{$k+1}</td>
										<td>
											<a href="detail?ma={$val.FK_sMaSP}" target="_blank">
												{$val.FK_sMaSP}
											</a>
										</td>
										<td>{$val.sTenSP}</td>
										<td>{$val.sTenNguoiDung}</td>
										<td>{$val.sNoiDungBL}</td>
										<td>{date("d/m/Y", strtotime({$val.dThoiGianBL}))}</td>
										<td>
											<button type="submit" class="btn btn-xs btn-danger" name="btnDelete" title="Xoá bình luận" value="{$val.PK_iMaBL}" onclick="return confirm('Bạn chắc chắn muốn xoá bình luận này?');">
												<i class="fa fa-trash" aria-hidden="true"></i>
											</button>
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
