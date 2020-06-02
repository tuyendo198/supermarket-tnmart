$(document).ready(function () {
	$(document).on('click', 'button[name=btnEditHT]', function () {
		var mahinhthuc = $(this).val();
		$.ajax({
			url: window.location.href,
			type: "post",
			data: {
				'action' : 'get_hinhthuc',
				'PK_iMaHinhThuc' : mahinhthuc
			},
			success: function (result) {
				var arrInfo = JSON.parse(result);
				console.log(arrInfo);
				$('input[name=txtHTTT]').val(arrInfo['sTenHinhThuc']);
				$('textarea[name=mota]').val(arrInfo['sMoTa']);
				$('button[name=btnCapNhatHT]').val(arrInfo['PK_iMaHinhThuc']);
			}
		});
	});
});
