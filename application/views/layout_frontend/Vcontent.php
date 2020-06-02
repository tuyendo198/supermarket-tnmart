<!-- Slider -->
<div class="sliders col-lg-12 col-md-12 col-sm-12" style="padding-left: 0px; padding-right: 0px;">
	<ul class="slider--buttons">
		<li>
			<button class="slider--previous"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
		</li>
		<li>
			<button class="slider--next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
		</li>
	</ul>
	<ul class="slider--slides">
		<li class="slider--slide">
			<img src="assets/img/slider/slider1.png?v={time()}" class="imgslider" alt="">
		</li>
		<li class="slider--slide">
			<img src="assets/img/slider/slider2.png?v={time()}" class="imgslider" alt="">
		</li>
		<li class="slider--slide">
			<img src="assets/img/slider/slider3.png?v={time()}" class="imgslider" alt="">
		</li>
	</ul>
</div>
<!-- End slider -->
	
<!-- Content -->
<div class="container">
	<div class="row">
		<div class="awe-section-2">
			<section class="section_banner">
				<div class="container">
					<div class="row">
						<div class="qc_sp col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="banner-hover">
								<a href=""></a>
								<img src="assets/img/slider/blog-img-4.jpg" alt="">
							</div>
						</div>
						<div class="qc_sp col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="banner-hover">
								<a href=""></a>
								<img src="assets/img/slider/blog-img-7.jpg" alt="">
							</div>
						</div>
						<div class="qc_sp col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="banner-hover">
								<a href=""></a>
								<img src="assets/img/slider/blog-img-6.jpg" alt="">
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<form action="" class="form-horizontal" method="POST">
			{if !empty($listSPKhuyenMai)}
			<div class="hot col-md-12">
				<h2>
					<a href="">
						KHUYẾN MÃI
					</a>
				</h2>
			</div>
			<div class="sanpham col-md-12">
				<div class="carousel slidecarou" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarouselsKM">
					<div class="carousel-inner">
						{foreach $listSPKhuyenMai as $k => $v}
							<div class="item {($k==0) ? 'active' : ''}">
								<div class="sp col-md-3 col-sm-6"><!--  style="{($k==3) ? 'border-right: 1px solid #ebebeb;' : ''}" -->
									<img src="{$v.sAnhDaiDien}" alt="{$v.sTenSP}">
									<!-- <a class="kbdt" href="" title="{$v.sTenSP}"></a> -->
									<h3 class="product-name">
										<a href="{$url}detail?ma={$v.PK_sMaSP}">{$v.sTenSP|truncate:35}</a>
									</h3>
									<div class="vote">
										<i class="fa fa-star-o" aria-hidden="true"></i>
										<i class="fa fa-star-o" aria-hidden="true"></i>
										<i class="fa fa-star-o" aria-hidden="true"></i>
										<i class="fa fa-star-o" aria-hidden="true"></i>
										<i class="fa fa-star-o" aria-hidden="true"></i>
									</div>
									<div class="product-item-price price-box">
										{if ($v.FK_sMaKM == 'MKM001')}
											{if (strpos($v.sNoiDungKM, '%')!==false)}
												{$heSo = rtrim($v.sNoiDungKM, '%')}
												{$giaChietKhau = $v.fGiaSP - $v.fGiaSP*$heSo/100}
											{else}
												{$giaChietKhau = $v.fGiaSP-$v.sNoiDungKM}
											{/if}
											<strong>Giá: {number_format($giaChietKhau, 0, ',', '.')}đ</strong>
											<p class="giagoc right">{number_format($v.fGiaSP, 0, ',', '.')}đ</p>
										{else}
											<strong>Giá: {number_format($v.fGiaSP, 0, ',', '.')}đ</strong>
										{/if}
									</div>
									<div class="tag-sale">
										{if ($v.FK_sMaKM == 'MKM001')}
											{if (strpos($v.sNoiDungKM, '%')!==false)}
												<div class="money">- {$v.sNoiDungKM}</div>
											{else}
												<div class="money">- {number_format($v.sNoiDungKM, 0, ',', '.')}đ</div>
											{/if}
										{else}
											<div class="tangkem">Tặng kèm</div>
										{/if}
									</div>
									<div class="detail">
										<button type="button" name="add_cart" value="{$v.PK_sMaSP}" class="btn btn-danger cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
										<button type="button" name="detail" value="{$v.PK_sMaSP}" class="btn btn-danger cart" data-toggle="modal" data-target="#xemsp"><i class="fa fa-eye" aria-hidden="true"></i></button>
									</div>
								</div>
							</div>
						{/foreach}
					</div>
					<button type="button" class="slider--previous back" href="#myCarouselsKM" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
					<button type="button" class="slider--next continue" href="#myCarouselsKM" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
				</div>
			</div>
			{/if}

			{foreach $list_product as $key => $val}
				{if $val.sTrangThai == 'show'}
				<div class="title_module_main col-md-12">
					<h2>
						<a href="{$url}nhom-sp?ma={$val.PK_sMaNhomSP}">
							{$val.sTenNhomSP}
						</a>
					</h2>
					<div class="border_bottom_title clearfix"></div>
				</div>
				<div class="awe-section-3 col-md-12">
					<img src="{$val.sAnhQC}" alt="">
				</div>
				<div class="sanpham col-md-12">
					{if !empty($val.sp)}
						<div class="carousel slidecarou" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel{$key}">
							<div class="carousel-inner">
								{foreach $val.sp as $k => $v}
									<div class="item {($k==0) ? 'active' : ''}">
										<div class="sp col-md-3 col-sm-6">
											<img src="{$v.sAnhDaiDien}" alt="{$v.sTenSP}">
											<!-- <a class="kbdt" href="" title="{$v.sTenSP}"></a> -->
											<h3 class="product-name">
												<a href="{$url}detail?ma={$v.PK_sMaSP}">{$v.sTenSP|truncate:35}</a>
											</h3>
											<div class="vote">
												{for $i=1; $i < 6; $i++}
												<div class="rating-stars">
													<div class="rating-stars-bg" style="width: {if ($i < $v.rating.trungbinh)}100{else}{if ($i-$v.rating.trungbinh < 1)}{($v.rating.trungbinh-$i+1)*100}{else}0{/if}{/if}%;">
														<svg class="svg-icon" enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0">
															<polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
														</svg>
													</div>
													<svg class="svg-icon-border" enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0">
														<polygon fill="none" points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
													</svg>
												</div>
												{/for}
												<div class="count-rating">({if ($v.rating.trungbinh == 0)}0{else}{$v.rating.soluong}{/if})</div>
											</div>
											<div class="product-item-price price-box">
												<strong>Giá: {number_format($v.fGiaSP, 0, ',', '.')}đ</strong>
												{if isset($v.sale)}
													<p class="giagoc right">{$v.fGiaSP}đ</p>
												{/if}
												<div class="soluongcon">
													{if $v.soluongcon > 0}
														({$v.soluongcon} sản phẩm có sẵn)
													{else}
														(Hết hàng)
													{/if}
												</div>
											</div>
											{if isset($v.sale)}
												<div class="tag-sale">
													<a href="">SALE</a>
												</div>
											{/if}
											<div class="detail">
												<button type="button" name="add_cart" value="{$v.PK_sMaSP}" class="btn btn-danger cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
												<button type="button" name="detail" value="{$v.PK_sMaSP}" class="btn btn-danger cart" data-toggle="modal" data-target="#xemsp"><i class="fa fa-eye" aria-hidden="true"></i></button>
											</div>
										</div>
									</div>
								{/foreach}
							</div>
							<button type="button" class="slider--previous back" href="#myCarousel{$key}" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
							<button type="button" class="slider--next continue" href="#myCarousel{$key}" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
						</div>
					{/if}
				</div>
				{/if}
			{/foreach}
		</form>
		<div class="quangcao col-md-12">
			<div class="qc col-md-3 col-sm-6">
				<div class="icon col-md-2 col-sm-3">
					<img src="assets/img/favicons/23347396.jpg" alt="">
				</div>
				<div class="col-md-10">
					<h4 class="tieude">Vận chuyển miễn phí</h4>
					<span>Vận chuyển miễn phí nội thành với đơn hàng từ 1.000.000</span>
				</div>
			</div>
			<div class="qc col-md-3 col-sm-6">
				<div class="icon col-md-2 col-sm-3">
					<img src="assets/img/favicons/service_icon_1.jpg" alt="">
				</div>
				<div class="col-md-10">
					<h4 class="tieude">Uy tín hàng đầu</h4>
					<span>Vận chuyển miễn phí nội thành với đơn hàng từ 1.000.000</span>
				</div>
			</div>
			<div class="qc col-md-3 col-sm-6">
				<div class="icon col-md-2 col-sm-3">
					<img src="assets/img/favicons/icon_hotline.png" alt="">
				</div>
				<div class="col-md-10">
					<h4 class="tieude">Chăm sóc 24/7</h4>
					<span>Vận chuyển miễn phí nội thành với đơn hàng từ 1.000.000</span>
				</div>
			</div>
			<div class="qc col-md-3 col-sm-6">
				<div class="icon col-md-2 col-sm-3">
					<img src="assets/img/favicons/service_4.png" alt="">
				</div>
				<div class="col-md-10">
					<h4 class="tieude">Thanh toán dễ dàng</h4>
					<span>Phương thức thanh toán đa dạng và cực kì tiện lợi</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End content -->


