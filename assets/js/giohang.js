$(document).ready(function () {
	const thongtingiaohang = $('input[name=tt_giaohang]').val();
	$(document).on('click', 'button[name=add_cart]', function () {
		if (!checkSession()){
			return false;
		}
		if (!thongtingiaohang){
			toastr.warning("","Bạn vui lòng cập nhật thông tin giao hàng trước khi mua hàng!");
			return false;
		}
		var maSp = $(this).val();
		var soluong = $('input[name=txtSoluong]').val();
		var soluongtronggio = parseInt($('#cart-total').html());
		if (typeof soluong == 'undefined'){
			soluong = 1;
		}
		var soluongmax = $('input[name=txtSoluong]').attr('max');
		if (parseInt(soluong) > parseInt(soluongmax)){
			soluong = soluongmax;
			toastr.warning("","Sản phẩm hiện chỉ còn " + soluongmax + " sản phẩm. Vui lòng không nhập quá số lượng tối đa.");
			return false;
		}
		$.ajax({
			type: 'post',
			url: $('base').attr('href')+'gio-hang',
			data:{
				'action': 'addToCart',
				'maSp': maSp,
				'soLuong': soluong
			},
			success: function(response){
				var res = JSON.parse(response);
				if (res == false){
					toastr.error("Thông báo", "Sản phẩm đã hết hàng hoặc đã có trong giỏ hàng. Vui lòng kiểm tra lại!");
				}
				else{
					$('#cart-total').html(res);
					toastr.success("Thông báo", "Thêm sản phẩm vào giỏ hàng thành công!");
				}
			}
		});
	});

	$(document).on('click', 'button[name=remove_from_cart]', function () {
		var cfm = confirm('Bạn có chắc chắn muốn xoá sản phẩm khỏi giỏ hàng không?');
		if (cfm){
			var tongtien = $('.tongtien').data('tongtien');
			var thanhtien = $(this).parent().parent().find('td').eq(5).data('thanhtien');
			var tongtiennew = tongtien - thanhtien;
			$('.tongtien').data('tongtien', tongtiennew);
			$('.tongtien').html(tongtiennew.toLocaleString() + 'đ');
			$(this).parent().parent().remove();
			$.ajax({
				type: 'post',
				url: $('base').attr('href')+'gio-hang',
				data:{
					'action': 'removeFromCart',
					'maSp': $(this).val()
				},
				success: function(response){
					var res = JSON.parse(response);
					if (res == false){
						// toastr.error("Thông báo","Có lỗi xảy ra. Trang sẽ tự động tải lại sau 3 giây!");
						// setTimeout(function(){
						// 	window.location.reload();
						// }, 3000);
						$('#cart-total').html(0);
					}
					else{
						$('#cart-total').html(res);
					}
				}
			});
		}
		else{
			return false;
		}
	});
});
