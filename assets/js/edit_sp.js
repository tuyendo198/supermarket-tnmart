$(document).ready(function () {
	CKEDITOR.replace('chitietsp', {
		width: ['100%'],
		height: ['250px'],
		toolbar: [
			{ name: 'document', items : [ 'Source','-','NewPage','Templates','DocProps','Preview','Save','Print' ] },
			{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
			{ name: 'colors', items : [ 'TextColor','BGColor' ] },
			{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
			{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
			{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
			{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
					'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
			{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] },
			{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
			{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] }
		]
	});
	CKEDITOR.replace('detail_sp', {
		width: ['100%'],
		height: ['250px'],
		toolbar: [
			{ name: 'document', items : [ 'Source','-','NewPage','Templates','DocProps','Preview','Save','Print' ] },
			{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
			{ name: 'colors', items : [ 'TextColor','BGColor' ] },
			{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
			{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
			{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
			{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
					'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
			{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] },
			{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
			{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] }
		]
	});
	
	$(document).on('click','button[name=btnEdit]', function () {
		var masp = $(this).val();
		$.ajax({
			url: window.location.href,
			type: "post",
			data: {
				'action' : 'get_info_sp',
				'PK_sMaSP' : masp
			},
			success: function (result){
				var arrInfo = JSON.parse(result);
				var tt = arrInfo['tt'];
				var album = arrInfo['album'];
				console.log(arrInfo);
				$('select[name=nhomsp]').val(tt['FK_sMaNhomSP']);
				$('input[name=tensp]').val(tt['sTenSP']);
				$('textarea[name=mota]').val(tt['sMoTa']);
				$('input[name=giasp]').val(tt['fGiaSP']);
				// if (tt['iSoLuongCon'] > 0){
				// 	$('#hethang').removeAttr('checked');
				// 	$('#conhang').attr('checked', 'checked');
				// }
				// else{
				// 	$('#conhang').removeAttr('checked');
				// 	$('#hethang').attr('checked', 'checked');
				// }
				$('.i-checks').iCheck({
					checkboxClass: 'icheckbox_square-green',
					radioClass: 'iradio_square-green',
				});
				$('input[name=soluong]').val(tt['iSoLuongCon']);
				$('input[name=donvitinh]').val(tt['sDonViTinh']);
				$('select[name=nhasx]').val(tt['FK_sMaNSX']);
				$('img[name="anhdaidien"]').attr("src", tt['sAnhDaiDien']);
				for(let i = 0; i < 4; i++){
					if(typeof album[i] === 'undefined'){
						$('img[name="anhsp_0' + (i+1) + '"]').attr("src", '');
					}
					else{
						$('img[name="anhsp_0' + (i+1) + '"]').attr("src", album[i]['sLink']);
					}
				}
				// $('textarea[name=detail_sp]').val(tt['sThongTinSP']);
				CKEDITOR.instances['detail_sp'].setData(tt['sThongTinSP']);
				$('button[name=btnCapnhat]').val(tt['PK_sMaSP']);
				// $('#result').html(result);
			}
		});
	});
});
