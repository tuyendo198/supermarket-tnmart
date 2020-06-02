<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THÔNG TIN CÁ NHÂN</h2>
		<ol class="breadcrumb">
			<li>
				<a>Trang chủ</a>
			</li>
			<li class="active">
				<a href="">Thông tin cá nhân</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Thông tin cá nhân</h5>
				</div>
				<div class="ibox-content col-sm-12">
					<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data" id="formMyInfo">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-sm-4 control-label">Họ và tên:</label>
								<div class="col-sm-8">
									<input type="text" name="hoten" value="{if isset($myinfo)}{$myinfo.sTenNguoiDung}{/if}" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Ngày sinh:</label>
								<div class="col-sm-8">
									<input type="date" class="form-control" name="ngaysinh" value="{if isset($myinfo)}{$myinfo.dNgaySinh}{/if}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" style="margin-right: 15px;">Giới tính:</label>
								<div class="col-sm-7 i-checks">
									<input type='radio' name='gt' value="Nam" checked> Nam
									<input type='radio' name='gt' value="Nữ" {if isset($myinfo) && ($myinfo.sGioiTinh == 'Nữ')}checked{/if}> Nữ
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Địa chỉ:</label>
								<div class="col-sm-8">
									<input type="text" name="diachi" value="{if isset($myinfo)}{$myinfo.sDiaChi}{/if}" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Số điện thoại:</label>
								<div class="col-sm-8">
									<input type="text" name="dienthoai" value="{if isset($myinfo)}{$myinfo.sDienThoai}{/if}" class="form-control">
								</div>
							</div>
							<div id="errorPlace"></div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<div class="col-sm-6 col-sm-offset-4">
									<button type="submit" class="btn btn-primary" name="save" value="ok">Lưu thông tin</button>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="col-sm-12 text-center">
									<img  id="anh" src="{if isset($myinfo)}{$myinfo.sAnhDaiDien}{/if}" title="Click vào ảnh để thay đổi ảnh đại diện" width="270px">
								</div>
								<div class="col-sm-12">
									<input type="file" hidden="true" class="sr-only" name="avatar" id="avatar">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
