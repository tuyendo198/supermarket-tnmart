<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Thanh Nga Mart | Tuyên Đỗ</title>

    <link href="{$url}assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$url}assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{$url}assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="{$url}assets/css/animate.css" rel="stylesheet">
    <link href="{$url}assets/css/style.css" rel="stylesheet">
</head>
<body class="gray-bg" style='background: url("{$url}assets/img/115.jpg") no-repeat center center fixed; background-size: cover;'>
	<div class="loginColumns animated fadeInDown">
		<div class="row">
			<div class="col-md-6">
				<h2 class="font-bold">Welcome to TNMART</h2>

				<p style="text-align: justify">
					TNMART là siêu thị tư nhân chủ yếu kinh doanh bán lẻ các mặt hàng dân dụng, mặt hàng tiện lợi…phục vụ cho người dân.
				</p>

				<p style="text-align: justify">
					Với sứ mệnh phát triển hướng tới phương châm “Khách hàng là trên hết”. TNMART luôn nỗ lực đáp ứng đầy đủ yêu cầu mua sắm của khách hàng, cam kết chất lượng khi sử dụng sản phẩm, giao hàng nhanh chóng, nâng cao giá trị cuộc sống của người tiêu dùng trong xã hội hiện đại.
				</p>

				<p style="text-align: justify">
					<small>TNMART đã và đang nỗ lực không ngừng để hoàn thành sứ mệnh của mình cho mọi nhà, đáp ứng đầy đủ yêu cầu của khách hàng.</small>
				</p>

			</div>
			<div class="col-md-6">
				<div class="ibox-content">
					<form class="m-t" role="form" action="" method="POST">
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Username" required="">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password" required="">
						</div>
						<button type="submit" class="btn btn-primary block full-width m-b" name="dangnhap" value="ok">Login</button>

						<div class="form-group col-md-12">
							<a class="btn btn-link" href="{$url}forget-pass" style="float: right">
								<small>Forgot password?</small>
							</a>
						</div>
					</form>
					<p class="m-t">
						<small>TNMART - Thanh Nga Mart &copy; 2020</small>
					</p>
				</div>
			</div>
		</div>
	</div>

    <script src="{$url}assets/js/jquery-3.1.1.min.js"></script>
    <script src="{$url}assets/js/bootstrap.min.js"></script>
    <script src="{$url}assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{$url}assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="{$url}assets/js/validateForm.js"></script>

    <!-- Toastr -->
    <script src="{$url}assets/js/plugins/toastr/toastr.min.js"></script>
    {if !empty($message)}
		<script type="text/javascript">
			setTimeout(function() {
				toastr.options = {
					top: 500,
					closeButton: true,
					progressBar: true,
					showMethod: 'slideDown',
					timeOut: 5000
				};
				toastr.{$message.type}("{$message.title}","{$message.message}");
			}, 200);
		</script>
    {/if}
</body>
</html>
