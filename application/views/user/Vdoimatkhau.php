<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THANH NGA MART</h2>
		<ol class="breadcrumb">
			<li>
				<a href="">Trang chủ</a>
			</li>
			<li>
				<a href="">Thông tin cá nhân</a>
			</li>
			<li class="active">Đổi mật khẩu</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Thay đổi mật khẩu</h5>
				</div>
				<div class="ibox-content">
					<form action="" method="POST" id="formDMK" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">Tên tài khoản:</label>
							<div class="col-sm-10">
								<input type="text" name="tentaikhoan" value="{if isset($tentk)}{$tentk}{/if}" class="form-control" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Mật khẩu mới:</label>
							<div class="col-sm-10">
								<input type="password" name="newpass" value="{if isset($pass)}{$pass}{/if}" class="form-control" placeholder="Nhập mật khẩu mới">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Xác nhận mật khẩu:</label>
							<div class="col-sm-10">
								<input type="password" name="passrepeat" value="{if isset($pass)}{$repass}{/if}" class="form-control" placeholder="Nhập xác nhận mật khẩu mới">
							</div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								<button type="submit" class="btn btn-primary" name="doimk" value="ok">Đổi mật khẩu</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('keyup', 'input[name=passrepeat]', function(){
			passnew = $('input[name=newpass]').val();
			passrepeat = $('input[name=passrepeat]').val();
			if (passnew!=passrepeat){
				$('input[name=passrepeat]').parent().addClass('has-error');
			}
			else{
				$('input[name=passrepeat]').parent().removeClass('has-error');
			}
		});
	});
</script>
