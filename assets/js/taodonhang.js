var url = window.location.href;
$(document).ready(function () {
	$(document).on('change', 'select[name=filterProduct]', function () {
		var maSP = $(this).val();
		if (maSP) {
			$.ajax({
				type: 'post',
				url: url,
				data: {
					'action': 'getInfoProduct',
					'maSP': maSP,
				},
				success: function (response) {
					var res = JSON.parse(response);
					var soluong = 1;
					if ($('#' + res['PK_sMaSP']).length) {
						soluong = $('#' + res['PK_sMaSP']).find('input[name^=soluong]').val();
						$('#' + res['PK_sMaSP']).find('input[name^=soluong]').val(parseInt(soluong) + 1);
						$('#' + res['PK_sMaSP']).find('td').eq(5).html(currency(thanhtien($('#' + res['PK_sMaSP']))));
					} else {
						var html = '';
						html += '<tr id="' + res['PK_sMaSP'] + '">';
						html += '<td>' + res['PK_sMaSP'] + '<input type="hidden" name="masp[]" value="' + res['PK_sMaSP'] + '"></td>';
						html += '<td>' + res['sTenSP'] + '</td>';
						html += '<td>' + res['sDonViTinh'] + '</td>';
						html += '<td><input type="number" class="soluong" name="soluong[]" value="1" min="1" max="300"></td>';
						html += '<td data-dongia=' + res['fGiaSP'] + '><input type="hidden" name="dongia[]" value="' + res['fGiaSP'] + '">' + currency(res['fGiaSP']) + '</td>';
						html += '<td>' + currency(res['fGiaSP']) + '</td>';
						html += '<td><button type="button" class="btn btn-xs btn-danger" name="btnXoaSP" title="Xoá sản phẩm" onclick="return confirm(`Bạn chắc chắn muốn xóa sản phẩm này không?`);"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
						html += '</tr>';
						$('#listProduct tbody').append(html);
					}
					$('select[name=filterProduct]').val(null).trigger('change');
					tongtien();
				}
			});
		}
	});

	$(document).on('change', 'input[name^=soluong]', function () {
		var tr = $(this).parent().parent();
		tr.find('td').eq(5).html(currency(thanhtien(tr)));
		tongtien();
	});

	$(document).on('keyup', 'input[name=tienKhach]', function () {
		tientralai();
	});

	$(document).on('click', 'button[name=btnXoaSP]', function () {
		$(this).parent().parent().remove();
		tongtien();
	});
});
function tongtien() {
	var listTr = $('#listProduct tbody tr');
	var tongtien = 0;
	for (var i = 0; i < listTr.length; i++) {
		tongtien = tongtien + parseFloat(thanhtien(listTr[i]));
	}
	$('#tongtien').html(currency(tongtien));
	tientralai();
}
function thanhtien(tr){
	var soluong = $(tr).find('td').eq(3).find('input[name^=soluong]').val();
	var dongia = $(tr).find('td').eq(4).data('dongia');
	return soluong * dongia;
}
function tientralai(){
	var money = $('input[name=tienKhach]').val().split('.').join('');
	var tongtien = $('#tongtien').html().split('.').join('');
	var tientralai = parseFloat(money) - parseFloat(tongtien);
	if ($('input[name=tienKhach]').val() != ''){
		$('input[name=tienKhach]').val(currency(money));
		$('#tientralai').html(currency(tientralai) + ' VNĐ');
		if (tientralai < 0){
			$('button[name=savedonhang]').attr('disabled', true);
		}
		else{
			$('button[name=savedonhang]').removeAttr('disabled');
		}
	}
}
