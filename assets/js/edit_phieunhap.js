$(document).ready(function () {
	// add line
	$(document).on('click', 'button[name=btnAdd]', function () {
		var dssp 		= $('#addSelect').html();
		// $('.chosen').chosen('destroy');
		var html 		= '';
		html += '<tr>';
		html +=	'<td>' + dssp + '</td>';
		html += '<td><input type="date" class="form-control" name="ngaysanxuat[]" value="" required></td>';
		html += '<td><input type="date" class="form-control" name="hansudung[]" value="" required></td>';
		html += '<td><input type="text" class="form-control" name="soluong[]" value="" required></td>';
		html += '<td><input type="text" class="form-control" name="dongia[]" value="" required></td>';
		html += '<td><input type="text" class="form-control" name="thanhtien[]" value="" disabled></td>';
		html += '<td class="text-center"><button type="button" class="btn btn-xs btn-danger" name="btnDel" onclick="return confirm(\'Bạn muốn xóa sản phẩm nhập này không?\')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
		html += '</tr>';
		$('.themsp').append(html);
		var lenChosen = $('.chosen').length;
		$('.chosen').eq(lenChosen-2).select2({
			width: "100%",
		});
	});

	$(document).on('keydown','input[nam^=ngaysanxuat], input[nam^=hansudung], input[name^=soluong], input[name^=dongia]', function () {
		switch (event.key){
			case '0':
				return true;
			case '1':
				return true;
			case '2':
				return true;
			case '3':
				return true;
			case '4':
				return true;
			case '5':
				return true;
			case '6':
				return true;
			case '7':
				return true;
			case '8':
				return true;
			case '9':
				return true;
			case 'Tab':
				return true;
			default:
				return false;
		}
	});

	$(document).on('change', 'input[name^=ngaysanxuat], input[name^=hansudung], input[name^=soluong], input[name^=dongia]', function () {
		var tr 			= $(this).parent().parent();
		var ngaysanxuat = tr.find('input[name^=ngaysanxuat]').val().trim();
		var hansudung	= tr.find('input[name^=hansudung]').val().trim();
		var soluong 	= tr.find('input[name^=soluong]').val().trim();
		var dongia 		= tr.find('input[name^=dongia]').val().trim();
		var thanhtien = 0;
		if (soluong !== '' && dongia !== ''){
			thanhtien = soluong * dongia;
			tr.find('input[name^=thanhtien]').val(currency(thanhtien));
		}
	});

	$(document).on('click', 'button[name=btnDel]', function () {
		$(this).parent().parent().remove();
	});

	$(document).on('change', 'input[name^=dongia]', function () {
		var tr = $(this).parent().parent();
		var selected = tr.find('select option:selected');
		var gianhap = $(this).val();
		var giasp = selected.data('giasp');
		var chenhlech = Math.abs(giasp - gianhap);
		$('button[name=agree]').val(selected.val());
		$('button[name=agree]').data('giasp', giasp);
		$('button[name=agree]').data('gianhap', gianhap);
		var warn = '';
		if (giasp < gianhap){
			warn = 'Giá nhập hiện lớn hơn giá bán ' + formatNumber(chenhlech, '.', '.') + ' VNĐ';
			$('#modal-warning').html(warn + '<br>Bạn có muốn cập nhật lại giá bán không?');
			$('#myModal').modal('show');
		}
		else{
			var mucgiagiam = giasp - (giasp * 20 / 100);
			if (gianhap <= mucgiagiam){
				warn = 'Giá nhập hiện thấp hơn giá bán ' + formatNumber(chenhlech, '.', '.') + ' VNĐ';
				$('#modal-warning').html(warn + '<br>Bạn có muốn cập nhật lại giá bán không?');
				$('#myModal').modal('show');
			}
		}
	});

	$(document).on('click', 'button[name=agree]', function () {
		var giaban = $(this).data('giasp');
		var gianhap = $(this).data('gianhap');
		$('#myModal').modal('hide');
		$('#modal-notice').html('Vui lòng nhập giá bán mới cho sản phẩm (giá cũ: ' + formatNumber(giaban, '.', '.') + ' - giá nhập: ' + formatNumber(gianhap, '.', '.') + ')');
		$('#modalGiaMoi').modal('show');
	});

	$(document).on('click', 'button[name=confirm]', function () {
		var masp = $('button[name=agree]').val();
		var giaban = $('button[name=agree]').data('giasp');
		var gianhap = $('button[name=agree]').data('gianhap');
		var giabanmoi = $('input[name=giabanmoi]').val();
		if (checkGiaBanMoi()) {
			var input = '<input type="hidden" name="giabanmoi[' + masp + ']" value="' + giabanmoi + '">';
			$('input[name="giabanmoi[' + masp + ']"]').remove();
			$('#formnhaphang').children().first().append(input);
			$('#modalGiaMoi').modal('hide');
			toastr.success("Thêm thông tin giá bán mới thành công. Giá bán mới sẽ được áp dụng sau khi nhấn lưu thông tin phiếu nhập", "Thông báo");
		}
		else {
			$('input[name=giabanmoi]').focus();
			toastr.error("Giá bán mới không hợp lệ", "Thông báo");
		}
	});
});
function formatNumber(nStr, decSeperate, groupSeperate) {
	nStr += '';
	x = nStr.split(decSeperate);
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
	}
	return x1 + x2;
}
function checkGiaBanMoi() {
	let giabanmoi = parseInt($('input[name=giabanmoi]').val());
	if (giabanmoi != $('input[name=giabanmoi]').val()) {
		return false;
	}
	if (giabanmoi <= 0) {
		return false;
	}
	if (Number.isNaN(giabanmoi)) {
		return false;
	}
	return true;
}
