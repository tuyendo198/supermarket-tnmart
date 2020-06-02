<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="{$url}">
	<title>Hệ thống siêu thị Thanh Nga Mart</title>
    <link rel="stylesheet" href="{$url}assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{$url}assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="{$url}assets/css/slider.css">
	<link href="{$url}assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
	<link href="{$url}assets/css/plugins/iCheck/custom.css" rel="stylesheet">


	<link rel="stylesheet" href="{$url}assets/css/plugins/slick/slick.css">
	<link rel="stylesheet" href="{$url}assets/css/plugins/slick/slick-theme.css">
    <link rel="stylesheet" href="{$url}assets/index.css">
	<link rel="stylesheet" href="{$url}assets/css/responsive.css">

	<script src="{$url}assets/js/jquery-3.1.1.min.js"></script>
	<script src="{$url}assets/js/bootstrap.min.js"></script>
	<!-- Jquery Validate -->
	<script src="{$url}assets/js/plugins/validate/jquery.validate.min.js"></script>
	<style>
		.error{
			color: #dc0404;
		}
	</style>
</head>
<body>
	<div class="header_top">
		<div class="topbar clearfix">
			<div class="col-lg-6 col-md-6 col-xs-5 welcome">
				Chào mừng bạn đến với Thanh Nga Mart
			</div>
			<div class="col-lg-6 col-md-6 col-xs-7 topbar-login">
				<input type="hidden" value="{if isset($session.tenuser)}true{else}false{/if}" name="session">
				<form action="{$url}" method="post">
					<ul class="account pull-right">
						{if isset($session.tenuser)}
						<li>
							<a href="{$url}profile">Xin chào {$session.tenuser}</a>
						</li>
						<li>
							<a href="{$url}logout" class="logout">
								<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Đăng xuất
							</a>
						</li>
						{else}
						<li>
							<a href="#" class="dangnhap">
								<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Đăng nhập
							</a>
						</li>
						<li>
							<a href="#" class="dangky">
								<i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Đăng ký
							</a>
						</li>
						{/if}
					</ul>
				</form>
			</div>
		</div>
		<div class="middle-header clearfix">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 logo" style="margin-top: -7px;">
				<a href="{$url}">
					<img src="assets/img/avatars/logo_mart.png" alt="" style="margin-top: -5px;">
				</a>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-5 search-box">
				<form action="{$url}tim-kiem" method="get">
					<div class="header_search search_form">
						<input type="search" name="search" value="" placeholder="Nhập từ khoá cần tìm kiếm... " class="search-text" autocomplete="off">
						<span class="search-before"></span>
						<input type="submit" value="Tìm kiếm" class="btnsearch">
					</div>
				</form>
			</div>
			<div class="col-lg-4 col-md-4 col-xs-4">
				<div class="menu-bar button-menu f-left"></div>
				<div class="top-cart-contain f-right">
					<div class="mini-cart text-xs-center">
						<div class="heading-cart">
							<a href="{$url}gio-hang" title="Giỏ hàng" onclick="return checkSession();">
								<img src="{$url}assets/icons/icon_cart.png" alt="">
								<span class="cartCount count_item_pr" id="cart-total">{$count_cart}</span>
							</a>
						</div>
					</div>
				</div>
				<div class="header-hotline f-right clearfix">
					<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
					<div class="hotline">
						<p>Đặt hàng nhanh</p>
						<a href="tel:0353924400">0353924400</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="menu col-lg-12 col-md-12">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li class="menu-has-children" style="background: #a90d0d;">
							<a href="{$url}"><i class="fa fa-home" aria-hidden="true" style="font-size: 15px;">&nbsp;&nbsp;</i>Trang chủ</a>
						</li>
						{foreach $menu as $key => $val}
						<li class="menu-active">
							{if $val.sTenNhomDM == "Liên hệ"}
								<a href="{$url}lien-he">{$val.sTenNhomDM}&nbsp;</a>
							{else}
								<a href="">{$val.sTenNhomDM}&nbsp;&nbsp;
									{if isset($val.sTenNhomSP)}
									<i class="fa fa-angle-down" aria-hidden="true"></i>
									{/if}
								</a>
							{/if}
							{if isset($val.sTenNhomSP)}
							<ul class="sub-menu">
								{foreach $val.sTenNhomSP as $k => $v}
									<li><a href="{$url}nhom-sp?ma={$v.PK_sMaNhomSP}">{$v.sTenNhomSP}</a></li>
								{/foreach}
							</ul>
							{/if}
						</li>
						{/foreach}
					</ul>
				</nav>
			</div>
		</div>
	</div>
