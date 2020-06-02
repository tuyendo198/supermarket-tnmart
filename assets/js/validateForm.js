
$(document).ready(function () {
	jQuery.validator.addMethod("nameRegex", function(value, element) {
		return this.optional(element) || /^[a-z\ \s]+$/i.test(value);
	}, );
	jQuery.validator.addMethod("numberRegex", function(value, element) {
		return this.optional(element) || /((09|03|07|08|05)+([0-9]{8})\b)/g.test(value);
	}, );

	function checkDateDMY(date) {
		var arrDate = date.split("/");
		var d = parseInt(arrDate[0], 10),
			m = parseInt(arrDate[1], 10),
			y = parseInt(arrDate[2], 10);

		var parseDate = new Date(y, m - 1, d);
		return (parseDate && (parseDate.getMonth() + 1) == m && parseDate.getDate() == d && parseDate.getFullYear() == y);
	}

	$('#formMyInfo').validate({
		rules: {
			hoten: {
				required: true,
				maxlength: 100
			},
			diachi: {
				required: true
			},
			dienthoai: {
				required: true,
				numberRegex: true
			}
		},
		messages: {
			hoten: {
				required: "Họ và tên không được để trống!",
				maxlength: "Họ và tên không được vượt quá 100 ký tự!"
			},
			diachi: {
				required: "Địa chỉ không được để trống!"
			},
			dienthoai: {
				required: "Số điện thoại không được để trống!",
				numberRegex: "Số điện thoại sai định dạng. Vui lòng nhập lại!"
			}
		}
	});

	$('#formDMK').validate({
		rules: {
			newpass: {
				required: true,
				minlength: 6
			},
			passrepeat: {
				required: true
			}
		},
		messages: {
			newpass: {
				required: "Mật khẩu mới không được để trống!",
				minlength: "Mật khẩu mới phải chứa ít nhất 6 ký tự!"
			},
			passrepeat: {
				required: "Xác nhận mật khẩu không được để trống!"
			}
		}
	});

	$('#formNSX').validate({
		rules: {
			tennhasx: {
				required: true
			},
			sdt: {
				required: true,
				numberRegex: true
			},
			diachi: {
				required: true
			}
		},
		messages: {
			tennhasx: {
				required: "Tên nhà sản xuất không được để trống!"
			},
			sdt: {
				required: "Số điện thoại không được để trống!",
				numberRegex: "Số điện thoại sai định dạng. Vui lòng nhập lại!"
			},
			diachi: {
				required: "Địa chỉ không được để trống!"
			}
		}
	});

	$('#formNCC').validate({
		rules: {
			tennhacc: {
				required: true
			},
			sdt: {
				required: true,
				numberRegex: true
			},
			diachi: {
				required: true
			}
		},
		messages: {
			tennhacc: {
				required: "Tên nhà cung cấp không được để trống!"
			},
			sdt: {
				required: "Số điện thoại không được để trống!",
				numberRegex: "Số điện thoại sai định dạng. Vui lòng nhập lại!"
			},
			diachi: {
				required: "Địa chỉ không được để trống!"
			}
		}
	});

	$('#formNhomSP').validate({
		rules: {
			txtTenloaitin: {
				required: true,
				maxlength: 100
			}
		},
		messages: {
			txtTenloaitin: {
				required: "Tên nhóm sản phẩm không được để trống!",
				maxlength: "Tên nhóm sản phẩm không được vượt quá 100 ký tự!"
			}
		}
	});

	$('#formCapTK').validate({
		rules: {
			txtTaiKhoan: {
				required: true,
				nameRegex:true
			},
			txtPass: {
				required: true
			},
			txtRePass: {
				required: true
			}
		},
		messages: {
			txtTaiKhoan: {
				required: "Tên tài khoản không được để trống!",
				nameRegex: "Tên tài khoản không được nhập có dấu!"
			},
			txtPass: {
				required: "Mật khẩu không được để trống!"
			},
			txtRePass: {
				required: "Vui lòng nhập xác nhận mật khẩu!"
			}
		}
	});
	$('#formSuaTK').validate({
		rules: {
			tentaikhoan: {
				required: true,
				nameRegex:true
			}
		},
		messages: {
			tentaikhoan: {
				required: "Tên tài khoản không được để trống!",
				nameRegex: "Tên tài khoản không được nhập có dấu!"
			}
		}
	});

	$('#formAddSP').validate({
		rules: {
			txtTenSP: {
				required: true,
				maxlength: 50
			},
			txtGia: {
				required: true
			},
			txtSoluong: {
				required: true
			},
			txtDVT: {
				required: true
			}
		},
		messages: {
			txtTenSP: {
				required: "Tên sản phẩm không được để trống!",
				maxlength: "Tên sản phẩm không được vượt quá 50 ký tự!"
			},
			txtGia: {
				required: "Giá bán không được để trống!"
			},
			txtSoluong: {
				required: "Số lượng không được để trống!"
			},
			txtDVT: {
				required: "Đơn vị tính không được để trống!"
			}
		}
	});

	$('#formModalUpdate').validate({
		rules: {
			tensp: {
				required: true
			},
			giasp: {
				required: true
			},
			donvitinh: {
				required: true
			}
		},
		messages: {
			tensp: {
				required: "Tên sản phẩm không được để trống!"
			},
			giasp: {
				required: "Giá bán không được để trống!"
			},
			donvitinh: {
				required: "Đơn vị tính không được để trống!"
			}
		}
	});

	$('#formModalUser').validate({
		rules: {
			tenuser: {
				required: true
			},
			sinhnhat: {
				required: true
			},
			txtDiaChi: {
				required: true
			},
			phone: {
				required: true
			},
			txtCMND: {
				required: true
			},
			txtEmail: {
				required: true
			}
		},
		messages: {
			tenuser: {
				required: "Họ và tên không được để trống!"
			},
			sinhnhat: {
				required: "Ngày sinh không được để trống!"
			},
			txtDiaChi: {
				required: "Địa chỉ không được để trống!"
			},
			phone: {
				required: "Số điện thoại không được để trống!"
			},
			txtCMND: {
				required: "CMND không được để trống!"
			},
			txtEmail: {
				required: "Email không được để trống!"
			}
		}
	});

	$('#formModalCapNhat').validate({
		rules: {
			hoten: {
				required: true
			},
			ngaysinh: {
				required: true
			},
			diachi: {
				required: true
			},
			dienthoai: {
				required: true
			},
			cmnd: {
				required: true
			},
			email: {
				required: true
			}
		},
		messages: {
			hoten: {
				required: "Họ và tên không được để trống!"
			},
			ngaysinh: {
				required: "Ngày sinh không được để trống!"
			},
			diachi: {
				required: "Địa chỉ không được để trống!"
			},
			dienthoai: {
				required: "Số điện thoại không được để trống!"
			},
			cmnd: {
				required: "CMND không được để trống!"
			},
			email: {
				required: "Email không được để trống!"
			}
		}
	});
});
