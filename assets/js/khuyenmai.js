$(document).ready(function () {
	$(document).on('change', 'select[name=ddlLoaiHinhKM]', function() {
		var mau = $('select[name=ddlLoaiHinhKM] option:selected').data('form');
		var html = '';
		html = $('#form'+mau).html();
		$('#insertForm').html(html);

		$('.i-checks').iCheck({
			checkboxClass: 'icheckbox_square-green',
			radioClass: 'iradio_square-green',
		});
		
		$('#insertForm').find('select').chosen({
			width: "100%"
		});
	});

	$(document).on('change', 'input[name=noidungkm]', function() {
		var loaiGiamGia = $('input[name=loaiGiamGia]').val();
		if (loaiGiamGia == '%'){
			if ($(this).val() > 100){
				$(this).val(100);
			}
		}
		else{
			
		}
	});
});