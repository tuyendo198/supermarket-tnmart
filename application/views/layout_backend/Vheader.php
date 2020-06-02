<!DOCTYPE html>
<html>
<head>
    <base href="{$url}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TnMart | Thanh Nga Mart</title>
    <link href="{$url}assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$url}assets/font-awesome/css/font-awesome.css" rel="stylesheet">

	<link href="{$url}assets/css/plugins/summernote/summernote.css" rel="stylesheet">
	<link href="{$url}assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
	<link href="{$url}assets/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

	<link href="{$url}assets/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    <link href="{$url}assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{$url}assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="{$url}assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="{$url}assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
	<link href="{$url}assets/css/plugins/footable/footable.core.css" rel="stylesheet">
	<link href="{$url}assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
	<link href="{$url}assets/css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="{$url}assets/css/animate.css" rel="stylesheet">
    <link href="{$url}assets/css/style.css" rel="stylesheet">

    <script src="{$url}assets/js/jquery-3.1.1.min.js"></script>
	<script src="{$url}assets/js/bootstrap.min.js"></script>
	<!-- Jquery Validate -->
	<script src="assets/js/plugins/validate/jquery.validate.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
	<script src="ckfinder/ckfinder.js"></script>
</head>
<body>
    <div id="wrapper">
    	<nav class="navbar-default navbar-static-side" role="navigation">
        	<div class="sidebar-collapse">
            	<ul class="nav metismenu" id="side-menu">
                	<li class="nav-header noactive">
                    	<div class="dropdown profile-element">
							<span>
								<img alt="image" class="img-circle" src="{$session.anhuser}" style="width: 25%;"/>
							</span>
							<a data-toggle="dropdown" class="dropdown-toggle" href="">
								<span class="clear">
									<span class="block m-t-xs">
										<strong class="font-bold">TNMART - Thanh Nga Mart</strong>
									</span>
									<span class="text-muted text-xs block">{$session.tenuser} <b class="caret"></b></span>
								</span>
							</a>
							<ul id="id_noactive" class="dropdown-menu animated fadeInRight m-t-xs">
								<li><a href="{$url}my-info">Thông tin cá nhân</a></li>
								<li><a href="{$url}doi-mat-khau">Đổi mật khẩu</a></li>
								<li><a href="{$url}login">Đăng xuất</a></li>
							</ul>
                    	</div>
                    	<div class="logo-element">TN</div>
                	</li>
					<li>
						<a href="">
							<i class="fa fa-shopping-basket" aria-hidden="true"></i>
							<span class="nav-label">Quản lý sản phẩm</span>
							<span class="fa arrow"></span>
						</a>
						<ul class="nav nav-second-level">
							{if ($session['maquyen']==1)}
							<li><a href="{$url}nhom-san-pham">Nhóm sản phẩm</a></li>
							{/if}
							<li><a href="{$url}danh-sach-san-pham">Danh sách sản phẩm</a></li>
							{if ($session['maquyen']==1)}
							<li><a href="{$url}khuyen-mai">Thiết lập khuyến mãi</a></li>
							<li><a href="{$url}huysanpham">Huỷ sản phẩm</a></li>
							{/if}
						</ul>
					</li>
					{if ($session['maquyen']==1)}
						<li>
							<a href="">
								<i class="fa fa-th-large"></i>
								<span class="nav-label">Quản lý danh mục</span>
								<span class="fa arrow"></span>
							</a>
							<ul class="nav nav-second-level">
								<li><a href="{$url}nhom-danh-muc">Nhóm danh mục</a></li>
								<li><a href="{$url}nha-cung-cap">Nhà cung cấp</a></li>
								<li><a href="{$url}nha-san-xuat">Nhà sản xuất</a></li>
								<li><a href="{$url}slide">Danh mục slide</a></li>
								<li><a href="{$url}status">Danh mục trạng thái</a></li>
								<li><a href="{$url}hinhthucthanhtoan">Hình thức thanh toán</a></li>
							</ul>
						</li>
					{/if}
					<li>
						<a href="">
							<i class="fa fa-users" aria-hidden="true"></i>
							<span class="nav-label">Quản lý hệ thống</span>
							<span class="fa arrow"></span>
						</a>
						<ul class="nav nav-second-level">
							{if ($session['maquyen']==1)}
							<li><a href="{$url}danh-sach-tai-khoan">Danh sách tài khoản</a></li>
							<li><a href="{$url}danh-sach-nguoi-dung">Danh sách người dùng</a></li>
							{/if}
							<li><a href="{$url}lichsumuahang">Lịch sử mua hàng</a></li>
						</ul>
					</li>
					<li>
						<a href="">
							<i class="fa fa-comments" aria-hidden="true"></i>
							<span class="nav-label">Bình luận/đánh giá</span>
							<span class="fa arrow"></span>
						</a>
						<ul class="nav nav-second-level">
							<li><a href="{$url}binh-luan">Quản lý bình luận</a></li>
							<li><a href="{$url}danh-gia">Quản lý đánh giá</a></li>
						</ul>
					</li>
					<li>
						<a href="">
							<i class="fa fa-file-text-o" aria-hidden="true"></i>
							<span class="nav-label">Quản lý đơn hàng</span>
							<span class="fa arrow"></span>
						</a>
						<ul class="nav nav-second-level collapse">
							<li><a href="{$url}tao-don-hang">Tạo đơn hàng</a></li>
							<li><a href="{$url}danh-sach-don-hang">Danh sách đơn hàng</a></li>
						</ul>
					</li>
					{if ($session['maquyen']==1 || $session['maquyen']==4)}
					<li>
						<a href="">
							<i class="fa fa-list-alt" aria-hidden="true"></i>
							<span class="nav-label">Quản lý nhập hàng</span>
							<span class="fa arrow"></span>
						</a>
						<ul class="nav nav-second-level collapse">
							<li><a href="{$url}nhap-hang">Nhập hàng</a></li>
						</ul>
						<ul class="nav nav-second-level collapse">
							<li><a href="{$url}danh-sach-phieu-nhap">Danh sách phiếu nhập</a></li>
						</ul>
					</li>
					{/if}
					<li>
						<a href="">
							<i class="fa fa-calendar"></i>
							<span class="nav-label">Báo cáo thống kê</span>
							<span class="fa arrow"></span>
						</a>
						<ul class="nav nav-second-level collapse">
							<li><a href="{$url}reportnhaphang">Thống kê nhập hàng</a></li>
							{if ($session['maquyen']==1 || $session['maquyen']==4)}
							<li><a href="{$url}reportdonhang">Thống kê đơn hàng</a></li>
							{/if}
							<li><a href="{$url}reportsanpham">Thống kê sản phẩm</a></li>
							{if ($session['maquyen']==1 || $session['maquyen']==4)}
								<li><a href="{$url}reportdoanhthu">Thống kê doanh thu</a></li>
							{/if}
						</ul>
					</li>
            	</ul>
        	</div>
    	</nav>

        <div id="page-wrapper" class="gray-bg">
        	<div class="row border-bottom">
        		<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<div class="navbar-minimalize minimalize-styl-2 btn btn-primary">
							<i class="fa fa-bars"></i>
						</div>
						<form role="search" class="navbar-form-custom" action="">
							<div class="form-group">
								<input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
							</div>
						</form>
					</div>
					<ul class="nav navbar-top-links navbar-right">
						<li>
							<span class="m-r-sm text-muted welcome-message">Welcome to TNMART - Thanh Nga Mart</span>
						</li>

						<li>
							<a href="{$url}login">
								<i class="fa fa-sign-out"></i> Đăng xuất
							</a>
						</li>
					</ul>
        		</nav>
        	</div>
