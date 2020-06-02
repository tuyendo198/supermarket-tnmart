var url = window.location.href;
$(document).ready(function (){
	var divmuahang = $('.muahang').html();
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});

	$('.slider-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: false,
		arrows: false,
		focusOnSelect: true
	});
	$(document).on('click','button[name=detail]', function () {
		var masp = $(this).val();
		$.ajax({
			url: $('base').attr('href'),
			type: "post",
			data: {
				'action' : 'get_info_sp',
				'PK_sMaSP' : masp
			},
			success: function (result){
				var arrInfo 	= JSON.parse(result);
				var htmlAnhSp 	= '';
				$('.anhdaidien').attr("src", arrInfo['sAnhDaiDien']);
				htmlAnhSp += '<div class="image"><img src="' + arrInfo['sAnhDaiDien'] + '" width="100%"></div>';
				for(let i = 0; i < 4; i++){
					if(typeof arrInfo['listAnh'][i] === 'undefined'){
						htmlAnhSp += '<div class="image"><img src="" width="100%"></div>';
					}
					else{
						htmlAnhSp += '<div class="image"><img src="' + arrInfo['listAnh'][i]['sLink'] + '" width="100%"></div>';
					}
				}
				if (arrInfo['soluongcon'] < 0){
					arrInfo['soluongcon'] = 0;
				}
				$('.slider-for').slick('unslick');
				$('.slider-nav').slick('unslick');
				$('.slider-for').html(htmlAnhSp);
				$('.slider-nav').html(htmlAnhSp);
				$('.tensp').text(arrInfo['sTenSP']);
				$('.gia').text(formatNumber(arrInfo['fGiaSP'], '.', '.'));
				$('.mota').text(arrInfo['sMoTa']);
				$('#hangsx').text(arrInfo['sTenNSX']);
				$('#loaisp').text(arrInfo['sTenNhomSP']);
				if(arrInfo['soluongcon'] > 0){
					$('.trangthai_sp').html("<i class='fa fa-check'></i> Còn hàng");
					$('.trangthai_sp').css('background', '#0dc713');
					$('.muahang').html(divmuahang);
					$('button[name=add_cart]').val(masp);
					$('input[name=txtSoluong]').attr('max', arrInfo['soluongcon']);
				}
				else{
					$('.trangthai_sp').html("<i class='fa fa-times' aria-hidden='true'></i> Hết hàng");
					$('.trangthai_sp').css('background', '#f52119');
					$('.muahang').html(divmuahang);
					$('button[name=add_cart]').val('');
					$('.muahang').find('input').attr('disabled',true);
					$('.muahang').find('button').attr('disabled',true);
				}
				$('.soluongcon').html('(' + arrInfo['soluongcon'] + ' sản phẩm có sẵn)');
				$('.slider-for').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
					fade: true,
					asNavFor: '.slider-nav'
				});

				$('.slider-nav').slick({
					slidesToShow: 3,
					slidesToScroll: 1,
					asNavFor: '.slider-for',
					dots: false,
					// centerMode: true,
					arrows: false,
					focusOnSelect: true
				});
				$('.slider-for').resize();
				$('.slider-nav').resize();
			}
		});
	});
	$(document).on('mouseenter', '.rating-stars', function (){
		$(this).addClass('mouseIn');
		addColorStar(this);
	});
	$(document).on('mouseleave', '.rating-stars', function (){
		$(this).removeClass('mouseIn');
		addColorStar(this);
	});
	$(document).on('click', '.rating-stars', function (){
		let rate = parseInt($('input[name=myRate]').val());
		if (rate < 1 || rate > 5){
			rate = 5;
		}
		$.ajax({
			url: url,
			type: "post",
			data: {
				'action' : 'rateProduct',
				'rate' : rate
			},
			success: function (result){
				let rs = JSON.parse(result);
				if (!rs){
					toastr.error("","Bạn chưa mua sản phẩm nên không thể gửi đánh giá hoặc có lỗi xảy ra. Vui lòng thử lại!");
					return false;
				}
				toastr.success("","Gửi đánh giá thành công!");
				setTimeout(function(){
					window.location.reload();
				}, 3000);
			}
		});
	});
});
function addColorStar(e){
	let isBoughtThis = $('input[name=isBoughtThis]').val();
	if (!$(e).parent().hasClass('vote')){
		if ($('.rating-stars').hasClass('mouseIn') && isBoughtThis){
			let stop = false;
			$('.rate-star .rating-stars').each(function (k, v) {
				if (!stop){
					$(v).find('.rating-stars-bg').css('width', '100%');
				}
				else{
					$(v).find('.rating-stars-bg').css('width', '0%');
				}
				if ($(v).hasClass('mouseIn')){
					$('input[name=myRate]').val(k+1);
					stop = true;
				}
			});
		}
		else{
			$('input[name=myRate]').val(5);
			if (isBoughtThis){
				$('.rate-star .rating-stars .rating-stars-bg').css('width', '0%');
			}
		}
	}
}
function formatNumber(nStr, decSeperate, groupSeperate) {
	nStr += '';
	x = nStr.split(decSeperate);
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
	}
	return x1 + x2 + ' đ';
}
