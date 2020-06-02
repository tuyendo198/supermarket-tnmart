function calculator(e) {
	var input = $(e).parent().find('input');
	var soluong = parseInt(input.val());
	var tr = e.parentElement.parentElement;
	if (tr.cells != undefined){
		var dongia = parseFloat(tr.cells[2].dataset.gia);
		var thanhtien = parseInt(dongia * soluong);
		var thanhtientruoc = tr.cells[5].dataset.thanhtien;
		tr.cells[5].innerHTML = thanhtien.toLocaleString() + 'đ';
		tr.cells[5].dataset.thanhtien = thanhtien;
		var tienthem = thanhtien - thanhtientruoc;
		var tongtien = $('.tongtien').data('tongtien');
		tongtien = tongtien + tienthem;
		$('.tongtien').data('tongtien', tongtien);
		$('.tongtien').html(tongtien.toLocaleString() + 'đ');
	}
	if (window.location.href.includes('gio-hang')){
		var maSp = $(e).parent().parent().find('button[name=remove_from_cart]').val();
		if (typeof soluong == 'undefined'){
			soluong = 1;
		}
		$.ajax({
			type: 'post',
			url: window.location.href,
			data:{
				'action': 'changeAmount',
				'maSp': maSp,
				'soLuong': soluong
			},
			success: function(response){
				var res = JSON.parse(response);
				console.log(res);
			}
		});
	}
}
function minus(e) {
	var soluong = $(e).parent().find('input');
	var result = soluong.val();
	if (!isNaN(result) && parseInt(result) > 1) {
		$(e).parent().find('.btnAdd').removeAttr('disabled');
		soluong.val(--result);
		calculator(e);
	}
}
function add(e) {
	var soluong = $(e).parent().find('input');
	var max = $(e).parent().find('input').attr('max');
	var result = soluong.val();
	if (!isNaN(result) && parseInt(result) < parseInt(max)) {
		$(e).removeAttr('disabled');
		soluong.val(++result);
		calculator(e);
	}
	else{
		$(e).attr('disabled', true);
	}
}
