$(document).ready(function () {
	$(document).on('click', 'button[name=btnEditUser]', function () {
		var mauser = $(this).val();
		$.ajax({
			url: window.location.href,
			type: "post",
			data: {
				'action' : 'get_info_user',
				'PK_sMaND' : mauser
			},
			success: function (result) {
				var arrInfo = JSON.parse(result);
				$('input[name=hoten]').val(arrInfo['sTenNguoiDung']);
				$('input[name=ngaysinh]').val(arrInfo['dNgaySinh']);
				if (arrInfo['sGioiTinh'] == 'Nam'){
					$('#nu').removeAttr('checked');
					$('#nam').attr('checked', 'checked');
				}
				else{
					$('#nam').removeAttr('checked');
					$('#nu').attr('checked', 'checked');
				}
				$('.i-checks').iCheck({
					checkboxClass: 'icheckbox_square-green',
					radioClass: 'iradio_square-green',
				});
				$('input[name=diachi]').val(arrInfo['sDiaChi']);
				$('input[name=dienthoai]').val(arrInfo['sDienThoai']);
				$('input[name=cmnd]').val(arrInfo['sCMND']);
				$('input[name=email]').val(arrInfo['sEmail']);
				$('input[name=quequan]').val(arrInfo['sQueQuan']);
				$('input[name=hokhau]').val(arrInfo['sHoKhau']);
				$('#anhnv').attr("src", arrInfo['sAnhDaiDien']);
				$('button[name=btnUpdate]').val(arrInfo['PK_sMaND']);
			}
		});
	});
});
