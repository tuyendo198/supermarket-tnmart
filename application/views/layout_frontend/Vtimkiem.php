<div class="title_chitiet_bot" style="border-bottom: 1px solid #ebebeb; margin-bottom: 20px;">
	<div class="lblChitiet">
		<ul>
			<li>
				<a href="{$url}"> Trang chủ</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
			</li>
			<li>
				<a href="">Tìm kiếm sản phẩm</a>
			</li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-3" style="padding: 0px;">
			<div class="title_module_main" style="margin-top: 0px;">
				<h2 class="locsp" style="background: #ca1509;">
					<a href="" style="font-size: 23px;">
						Lọc sản phẩm
					</a>
				</h2>
			</div>
			<div class="sanpham">
				<div class="sp col-md-12 col-sm-6" style="border-right: 1px solid #ebebeb;">
					<h4>Giá sản phẩm</h4>
					<hr/>
					<div class="thuonghieu col-md-12" style="padding: 0px;">
						<ul>
							<li>
								<input type="radio" class="i-checks" name="filterPrice" value="0-100000">
								<span>Giá dưới 100.000đ</span>
							</li><br>
							<li>
								<input type="radio" class="i-checks" name="filterPrice" value="100000-200000">
								<span>100.000đ - 200.000đ</span>
							</li><br>
							<li>
								<input type="radio" class="i-checks" name="filterPrice" value="200000-max">
								<span>Trên 200.000đ</span>
							</li><br>
						</ul>
					</div>
					<hr/>
				</div>
			</div>
			<div class="col-md-12" style="margin-bottom: 10px;"></div>
			<hr/>
			<img src="{$url}assets/img/slider/quangcao.png" width="100%">
			<hr/>

			<div class="col-md-12" style="margin-bottom: 10px;"></div>
		</div>
		<div class="col-md-9">
			<div class="col-md-12">
				<div class="col-md-8" style="padding-left: 0px;">
					<h3 style="margin-top: 10px; font-weight: 700; color: #d60404;">Kết quả tìm kiếm "{$searchtext}"</h3>
				</div>
				<label style="float: left; margin-top: 8px;">Sắp xếp:</label>
				<div class="col-md-3" style="padding-right: 0px;">
					<select class="form-control" name="sortProduct">
						<option value="asc">Giá: thấp - cao</option>
						<option value="desc">Giá: cao - thấp</option>
					</select>
				</div>
			</div>
			<div class="sanpham col-md-12 danhsachsanpham">
				{if !empty($list_product)}
					{foreach $list_product as $k => $v}
					<div class="sp col-md-4" data-gia="{$v.fGiaSP}">
						<img src="{$v.sAnhDaiDien}" alt="{$v.sTenSP}">
						<h3 class="product-name">
							<a href="{$url}detail?ma={$v.PK_sMaSP}">{$v.sTenSP}</a>
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
							<!-- <p class="giagoc right">15.000đ</p> -->
						</div>
						<!-- <div class="tag-sale">
							<a href="">-50%</a>
						</div> -->

						<div class="detail">
							<button type="button" name="add_cart" value="{$v.PK_sMaSP}" class="btn btn-danger cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
							<button type="button" name="detail" value="{$v.PK_sMaSP}" class="btn btn-danger cart" data-toggle="modal" data-target="#xemsp"><i class="fa fa-eye" aria-hidden="true"></i></button>
						</div>
					</div>
					{/foreach}
				{else}
				<div class="ibox-content">
					<div class="alert alert-warning">
						Chúng tôi không tìm thấy sản phẩm phù hợp với từ khóa "{$searchtext}"
					</div>
				</div>
				{/if}
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{$url}assets/js/nhomsanpham.js"></script>
