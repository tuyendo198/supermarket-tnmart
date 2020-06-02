var filterPhanLoai = [];
function filterData(arrPhanLoai) {
	var price = $('input[name=filterPrice]:checked').val();
	var listSP = $('.danhsachsanpham .sp');
	var start = 0;
	var end = "max";
	if (typeof price !== 'undefined'){
		price = price.split('-');
		start = price[0];
		end = price[1]; 
	}
	if (end == "max"){
		end = 999999999999999;
	}
	if (arrPhanLoai.length > 0){
		listSP.each(function (k, v){
			if (arrPhanLoai.includes($(v).data('maphanloai')) && $(v).data('gia')>start && $(v).data('gia')<end){
				$(v).show();
			}
			else{
				$(v).hide();
			}
		});
	}
	else{
		listSP.each(function (k, v){
			if ($(v).data('gia')>start && $(v).data('gia')<end){
				$(v).show();
			}
			else{
				$(v).hide();
			}
		});
	}
}
$(document).ready(function () {
	$(document).on('ifChecked', 'input[name=phanLoai]', function () {
		var maPL = $(this).val();
		filterPhanLoai.push(maPL);
		filterData(filterPhanLoai);
	});

	$(document).on('ifUnchecked ', 'input[name=phanLoai]', function () {
		var maPL = $(this).val();
		for (var i = 0; i < filterPhanLoai.length; i++) {
			if (filterPhanLoai[i]==maPL){
				filterPhanLoai.splice(i, 1);
			}
		}
		filterData(filterPhanLoai);
	});

	$(document).on('ifChecked', 'input[name=filterPrice]', function () {
		filterData(filterPhanLoai);
	});

	$(document).on('change', 'select[name=sortProduct]', function () {
		var option = $(this).val();
		var listProduct = $('div.danhsachsanpham'), product = listProduct.children('div');
		switch(option) {
			case 'desc':
				product.detach().sort(function(a, b) {
					var priceA = parseInt($(a).data('gia'), 10);
					var priceB = parseInt($(b).data('gia'), 10);
					return (priceA < priceB) ? (priceA < priceB) ? 1 : 0 : -1;
				});
				listProduct.append(product);
				break;
			default:
				product.detach().sort(function(a, b) {
					var priceA = parseInt($(a).data('gia'), 10);
					var priceB = parseInt($(b).data('gia'), 10);
					return (priceA > priceB) ? (priceA > priceB) ? 1 : 0 : -1;
				});
				listProduct.append(product);
				break;
		}
	});
});