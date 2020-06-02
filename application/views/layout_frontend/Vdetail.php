<div class="title_chitiet_bot" style="border-bottom: 1px solid #ebebeb; margin-bottom: 20px;">
	<div class="lblChitiet">
		<ul>
			<li>
				<a href="{$url}">Trang chủ</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
			</li>
			<li>
				<a href="">{$chitietsp.sTenNhomSP}</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
			</li>
			<li>
				<a href="">{$chitietsp.sTenSP}</a>
			</li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-9" style="padding: 0px;">
			<div class="chitietsp col-md-12">
				<div class="col-md-4" style="padding: 0px;">
					<div class="border_sp">
						<img src="{$chitietsp.sAnhDaiDien}" id="anhsanpham" alt="">
						<input type="hidden" name="isBoughtThis" value="{$isBoughtThis}">
					</div>
					<div id="thumbnail_quickview" class="list_sp">
						<div class="thumblist">
							<div class="thumblist_carousel owl-carousel owl-loaded owl-drag">
								<div class="col-md-12 ls_detail">
									<div>
										<ul>
											{foreach $chitietsp.listAnh as $v}
											<li class="ke">
												<img id="product-featured-image-quickview" class="chitietanhsp img-responsive product-featured-image-quickview" src="{$v.sLink}" alt="quickview">
											</li>
											{/foreach}
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<h3 class="title_sp">
						<a href="/cherry-do-canada-loai-to-10">{$chitietsp.sTenSP}</a>
					</h3>
					<div class="status">
						Trạng thái:
						{if ($chitietsp.soluongcon > 0)}
							<span class="inventory trangthai_sp" style="background: #0dc713;">
								<i class='fa fa-check'></i> Còn hàng
							</span>
						{else}
							<span class="inventory trangthai_sp" style="background: #f52119;">
								<i class='fa fa-times' aria-hidden='true'></i> Hết hàng
							</span>
						{/if}
					</div>
					<div class="price_sp">
						<div class="gia_sp">
							<span>{number_format($chitietsp.fGiaSP, 0, ',', '.')} đ</span>
						</div>
						<div class="old-price">
							<span class="price product-price-old" style="display: none;">
								giá sale
							</span>
						</div>
					</div>
					<div class="mota" style="padding: 0px;">{$chitietsp.sMoTa}</div>
					<hr>
					{if ($chitietsp.soluongcon > 0)}
					<label class="title_sl">Số lượng:</label>
					<div class="col-md-6">
						<button type="button" class="btnMinus" onclick="minus(this)">
							<i class="fa fa-minus" aria-hidden="true"></i>
						</button>
						<input class="soluong" type="text" name="txtSoluong" value="1" max="{$chitietsp.soluongcon}" maxlength="3" onchange="calculator(this)"/>
						<button type="button" class="btnAdd" onclick="add(this)">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</button>
						<div class="soluongcon">
							({$chitietsp.soluongcon} sản phẩm có sẵn)
						</div>
						<input type="text" class="hidden" name="txtDongia" value="{$chitietsp.fGiaSP}" />
					</div>
					<div class="col-md-12 khoangcach">
						<button type="button" name="add_cart" value="{$chitietsp.PK_sMaSP}" class="btn addtocart col-md-5">Thêm vào giỏ hàng</button>
					</div>
					{/if}
				</div>
			</div>
			<div class="title_module_detail">
				<h2>
					<a href="">
						Thông tin sản phẩm
					</a>
				</h2>
				<div class="border_bottom_title clearfix" style="margin-left: 0px;"></div>
			</div>
			<div class="title_detail col-md-12">
				<div class="mota">
					{$chitietsp.sThongTinSP}
				</div>
			</div>
			<div class="title_module_detail">
				<h2>
					<a href="">
						Bình luận
					</a>
				</h2>
				<div class="border_bottom_title clearfix" style="margin-left: 0px;"></div>
			</div>
			<form action="" method="post" id="formBL" onsubmit="return checkSession();">
				<div class="col-md-12" style="margin-top: 20px; margin-bottom: 20px;padding-left: 0px;">
					<div class="bl col-md-10">
						<textarea class="form-control" name="txtBinhluan" placeholder="Viết bình luận..." style="resize: vertical;"></textarea>
					</div>
					<div class="col-md-2" style="padding-left: 5px;">
						<button type="submit" class="btn btnSubmit" name="comment" value="ok">Gửi bình luận</button>
					</div>
				</div>
				{foreach $list_comment as $k => $v}
				<div class="col-md-12">
					<div class="avataruser">
						<img src="{$v.sAnhDaiDien}" width="100%" height="100%">
					</div>
					<div class="detailcomment">
						<b>{$v.sTenNguoiDung}</b>
						<br>
						{$v.sNoiDungBL}
						<div class="timecomment">
							<i class="fa fa-clock-o" aria-hidden="true"></i>
							{date('d/m/Y', strtotime($v.dThoiGianBL))}
						</div>
					</div>
					<div class="line-dash"></div>
				</div>
				{/foreach}
			</form>
			<div class="title_module_detail">
				<h2>
					<a href="">
						Đánh giá
					</a>
				</h2>
				<div class="border_bottom_title clearfix" style="margin-left: 0px;"></div>
			</div>
			<div class="rale_sp col-md-12 m-b">
				<div class="col-md-4 line-right" style="min-height: 110px;">
					<input type="hidden" name="myRate" value="5">
					<div class="rate-info">
						{round($rating.trungbinh, 1)}/5
					</div>
					<div class="rate-star" {if ($isBoughtThis)}title="Click chuột để đánh giá sản phấm"{/if}>
						{for $i=1; $i < 6; $i++}
						<div class="rating-stars">
							<div class="rating-stars-bg" style="width: {if ($i < $rating.trungbinh)}100{else}{if ($i-$rating.trungbinh < 1)}{($rating.trungbinh-$i+1)*100}{else}0{/if}{/if}%;">
								<svg class="svg-icon" enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0">
									<polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
								</svg>
							</div>
							<svg class="svg-icon-border" enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0">
								<polygon fill="none" points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
							</svg>
						</div>
						{/for}
						<span class="text-rating">({if ($rating.trungbinh == 0)}0{else}{$rating.soluong}{/if} đánh giá)</span>
					</div>
				</div>
				<div class="col-md-8 rate-detail">
					<div class="five-star-rate">
						<div class="list-star">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<div class="ratio-bar">
							<div class="real-rate-bar" style="width: {$rating.5star/$rating.soluong*100}%;"></div>
						</div>
						<div class="amount">{$rating.5star}</div>
					</div>
					<div class="four-star-rate">
						<div class="list-star">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<div class="ratio-bar">
							<div class="real-rate-bar" style="width: {$rating.4star/$rating.soluong*100}%;"></div>
						</div>
						<div class="amount">{$rating.4star}</div>
					</div>
					<div class="three-star-rate">
						<div class="list-star">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<div class="ratio-bar">
							<div class="real-rate-bar" style="width: {$rating.3star/$rating.soluong*100}%;"></div>
						</div>
						<div class="amount">{$rating.3star}</div>
					</div>
					<div class="two-star-rate">
						<div class="list-star">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<div class="ratio-bar">
							<div class="real-rate-bar" style="width: {$rating.2star/$rating.soluong*100}%;"></div>
						</div>
						<div class="amount">{$rating.2star}</div>
					</div>
					<div class="one-star-rate">
						<div class="list-star">
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<div class="ratio-bar">
							<div class="real-rate-bar" style="width: {$rating.1star/$rating.soluong*100}%;"></div>
						</div>
						<div class="amount">{$rating.1star}</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3" style="padding: 0px;">
			<div class="title_module_main" style="margin-top: 0px;">
				<h2 style="padding-top: 10px; padding-bottom: 10px; padding-left: 18px; padding-right: 18px;">
					<a href="" style="font-size: 23px;">
						Sản phẩm liên quan
					</a>
				</h2>
			</div>
			<div class="sanpham">
				{foreach $list_sp_lq as $k => $v}
				<a href="detail?ma={$v.PK_sMaSP}">
				<div class="sp col-md-12 col-sm-6" style="border-right: 1px solid #ebebeb;">
					<div class="col-md-4" style="padding: 0px;">
						<img src="{$v.sAnhDaiDien}" alt="">
					</div>
					<div class="col-md-8" style="padding: 0px;">
						<h3 class="product-name">{$v.sTenSP}</h3>
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
							<strong>Giá: {number_format($v.fGiaSP, 0, ',', '.')} đ</strong>
							<!-- <p class="giagoc right">15.000đ</p> -->
						</div>
					</div>
				</div>
				</a>
				{/foreach}
			</div>
			<div class="col-md-12" style="margin-bottom: 10px;"></div>
			<hr/>
			<img src="{$url}assets/img/slider/quangcao.png" width="100%">
			<hr/>
			<img src="{$url}assets/img/slider/mombaby.png" width="100%">

			<div class="col-md-12" style="margin-bottom: 10px;"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$(document).on('click','.chitietanhsp',function () {
			$('#anhsanpham').attr('src', $(this).attr('src'));
		});
	});
</script>
