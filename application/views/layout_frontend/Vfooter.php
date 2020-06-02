<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			xfbml            : true,
			version          : 'v4.0'
		});
	};

	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
	 attribution=setup_tool
	 page_id="468064303959702">
</div>

<footer class="no-margin footer m-t">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-12 col-xs-12 social-icon">
				<h2>
					Liên hệ
					<span class="line"></span>
				</h2>
				<p class="text-uppercase color1">Siêu thị Thanh Nga Mart</p>
				<p><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;dotuyen221098@gmail.com</p>
				<p>
					<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Điện thoại: 0353924400
				</p>
				<p>
					<i class="fa fa-home" aria-hidden="true"></i>&nbsp;230 Định Công - Hoàng Mai - Hà Nội
				</p>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<h2>
					Giới thiệu
					<span class="line"></span>
				</h2>
				<ul>
					<li>
						<a href="">Trang chủ</a>
					</li>
					<li>
						<a href="">Giới thiệu</a>
					</li>
					<li>
						<a href="">Sản phẩm</a>
					</li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<h2>
					Hỗ trợ khách hàng
					<span class="line"></span>
				</h2>
				<ul>
					<li>
						<a href="">Liên hệ và góp ý</a>
					</li>
					<li>
						<a href="">Hướng dẫn mua hàng</a>
					</li>
					<li>
						<a href="">Câu hỏi thường gặp</a>
					</li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 social-icon">
				<h2>
					Kết nối với chúng tôi
					<span class="line"></span>
				</h2>
				<div class="list-menu">
					<div class="footerText">
						<div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/Bunn-Shop-468064303959702/" data-height="230" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;container_width=263&amp;height=230&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Ffive.shop.55%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false">
							<span style="vertical-align: bottom; width: 263px; height: 196px;">
								<iframe name="f1c7d7ce3131a84" width="1000px" height="230px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.6/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df3d43ab7cb96074%26domain%3Ddualeo-x.bizwebvietnam.net%26origin%3Dhttps%253A%252F%252Fdualeo-x.bizwebvietnam.net%252Ff3c91d260682118%26relation%3Dparent.parent&amp;container_width=263&amp;height=230&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Bunn-Shop-468064303959702.55%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false" style="border: none; visibility: visible; width: 263px; height: 220px;" class=""></iframe>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" name="tt_giaohang" value="{$tt_giaohang}">
	<div class="reserved">
		<div class="container">
			<p class="text-left col-lg-2 col-md-3 col-sm-4">
				<i class="fa fa-meetup" aria-hidden="true"></i>&nbsp;Thanh Nga Mart - Tuyên Đỗ 
			</p>
			<div class="col-lg-10 col-md-9 col-sm-8" style="margin-top: -10px;">
				<ul class="inline">
					<li>
						<a href=""><i class="fa fa-facebook fa-2" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href=""><i class="fa fa-google-plus fa-2" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href=""><i class="fa fa-twitter fa-2" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href=""><i class="fa fa-youtube fa-2" aria-hidden="true"></i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- Modal xem chi tiết sản phẩm-->
<form method="POST" class="form-horizontal" id="formModalDetail" enctype="multipart/form-data">
	<div id="xemsp" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header border_bot">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body cachtop">
					<div class="row">
						<div class="col-md-6">
							<div id="thumbnail_quickview" class="list_sp">
								<div class="thumblist">
									<div class="thumblist_carousel owl-carousel owl-loaded owl-drag">
										<div class="col-md-12 ls_detail">
											<div class="main_detail_sp">
												<div class="slider slider-for">

												</div>
												<div class="slider slider-nav">

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<h3 class="title_sp">
								<a href="" class="tensp"></a>
							</h3>
							<div class="status">
								Trạng thái:
								<span class="inventory trangthai_sp"></span>
							</div>
							<div class="price_sp">
								<div class="gia_sp">
									<span class="gia"></span>
								</div>
								<div class="old-price">
									<span class="price product-price-old" style="display: none;">
										giá sale
									</span>
								</div>
							</div>
							<div class="mota"></div>
							<hr style="margin-top: 0px;">
							<a href="/cherry-do-canada-loai-to-10" class="view-more hidden">Xem chi tiết</a>
							<div class="info-other" style="display: block;">
								<p class="cach_bot">
									<label class="inline-block">Hãng sản xuất</label>: <span id="hangsx"></span>
								</p>
								<p class="cach_bot">
									<label class="inline-block">Loại sản phẩm</label>: <span id="loaisp">Hoa quả tươi</span>
								</p>
							</div>
							<div class="muahang">
								<label class="title_sl">Số lượng:</label>
								<div class="col-md-8">
									<button type="button" class="btnMinus" onclick="minus(this)">
										<i class="fa fa-minus" aria-hidden="true"></i>
									</button>
									<input class="soluong" type="text" name="txtSoluong" value="1" maxlength="3" onchange="calculator(this)" placeholder="1"/>
									<button type="button" class="btnAdd" onclick="add(this)">
										<i class="fa fa-plus" aria-hidden="true"></i>
									</button>
									<div class="soluongcon">
										
									</div>
								</div>
								<div class="col-md-12 khoangcach">
									<button type="button" name="add_cart" class="btn addtocart">Thêm vào giỏ hàng</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer border_top">

				</div>
			</div>
		</div>
	</div>
</form>
<!-- End modal -->

<!-- Modal login -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<form action="{$url}" method="post">
			<input type="hidden" name="currentUrl" value="">
			<div class="frmLogin modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title title_login">Đăng nhập tài khoản</h4>
				</div>
				<div class="xl modal-body">
					<div class="form-group">
						<label class="lbl">Địa chỉ Email/Số điện thoại<span class="lbl text-danger">&nbsp;*</span></label>
						<input type="text" name="txtEmail" class="txt form-control" placeholder="Vui lòng nhập Email/Số điện thoại" required>
					</div>

					<div class="form-group">
						<label class="lbl">Mật khẩu<span class="lbl text-danger">&nbsp;*</span></label>
						<input type="password" name="txtPass" class="txt form-control" value="" placeholder="Vui lòng nhập mật khẩu" required>
					</div>
				</div>
				<div class="xuly modal-footer">
					<p class="forget col-md-6">Bạn quên mật khẩu? Hãy bấm<a href="{$url}quenmatkhau">&nbsp;Tại đây</a></p>
					<p class="account col-md-6">Chưa có tài khoản?<a href="#" class="dangky">&nbsp;Đăng ký</a></p>
					<button type="submit" name="btnLogin" value="ok" class="btnLogin btn col-md-12">Đăng nhập</button>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Modal register -->
<div id="dki" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<form action="{$url}" method="post" id="formRegister" enctype="multipart/form-data">
			<div class="frmLogin modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title title_login">Đăng ký tài khoản</h4>
				</div>
				<div class="xl modal-body">
					<div class="form-group">
						<label class="lbl">Họ và tên<span class="lbl text-danger">&nbsp;*</span></label>
						<input type="text" name="txtHoten" class="txt form-control" value="" placeholder="Họ và tên">
					</div>

					<div class="form-group">
						<label class="lbl">Email<span class="lbl text-danger">&nbsp;*</span></label>
						<input type="text" name="txtEmail" class="txt form-control" value="" placeholder="Email">
					</div>

					<div class="form-group">
						<label class="lbl">Mật khẩu<span class="lbl text-danger">&nbsp;*</span></label>
						<input type="password" name="txtPass" class="txt form-control" value="" placeholder="Mật khẩu">
					</div>
					<div class="form-group">
						<label class="lbl">Nhập lại mật khẩu<span class="lbl text-danger">&nbsp;*</span></label>
						<input type="password" name="txtRePass" class="txt form-control" value="" placeholder="Mật khẩu">
					</div>
				</div>
				<div class="xuly modal-footer">
					<p class="col-md-12">Đã có tài khoản? Đăng nhập<a href="#" class="dangnhap">&nbsp;tại đây</a></p>
					<button type="submit" name="btnDangKy" value="yes" class="btnLogin btn col-md-12">Đăng ký tài khoản</button>
				</div>
			</div>
		</form>
	</div>
</div>

    <script src="{$url}assets/js/slider.js"></script>
	<script src="{$url}assets/js/soluong.js"></script>
	<script src="{$url}assets/js/chitietsp.js"></script>
	<script src="{$url}assets/js/validateData.js"></script>
	<script src="{$url}assets/js/giohang.js"></script>
	<!-- iCheck -->
	<script src="{$url}assets/js/plugins/iCheck/icheck.min.js"></script>
	<script src="{$url}assets/js/plugins/slick/slick.min.js"></script>

	<script type="text/javascript">
		function checkSession(){
			var session = $('input[name=session]').val();

			if (session === 'true'){
				return true;
			}
			else{
				//show modal
				$('#myModal').modal('show');
				return false;
			}
		}
		$(document).ready(function () {
			$('.i-checks').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
			});

        	$('input[name=currentUrl]').val(window.location.href);
            $(document).on('click', '.dangnhap', function(){
				$('#dki').modal('hide');
                $('#myModal').modal('show');
            });
            $(document).on('click', '.dangky', function(){
                $('#myModal').modal('hide');
                $('#dki').modal('show');
            });
        });
    </script>

	<!-- Toastr -->
	<script src="{$url}assets/js/plugins/toastr/toastr.min.js"></script>
	{if !empty($message)}
	<script type="text/javascript">
		setTimeout(function() {
			toastr.options = {
				closeButton: true,
				progressBar: true,
				showMethod: 'slideDown',
				timeOut: 5000
			};
			toastr.{$message.type}("{$message.title}","{$message.message}");
		}, 500);
	</script>
	{/if}
</body>
</html>
