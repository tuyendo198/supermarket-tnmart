$(document).ready(function () {
	$(document).on('click', 'button[name=btnEditTK]', function () {
		var mataikhoan = $(this).val();
		$.ajax({
			url: window.location.href,
			type: "post",
			data: {
				'action' : 'get_info_taikhoan',
				'PK_iMaTaiKhoan' : mataikhoan
			},
			success: function (result) {
				var arrInfo = JSON.parse(result);
				$('input[name=tentaikhoan]').val(arrInfo['sTenTaiKhoan']);
				$('option[value="'+ arrInfo['FK_iMaQuyen'] +'"]').prop('selected', true);
				$('.i-checks').iCheck({
					checkboxClass: 'icheckbox_square-green',
					radioClass: 'iradio_square-green',
				});
				$('button[name=btnUpdateTK]').val(arrInfo['PK_iMaTaiKhoan']);
			}
		});
	});
});
