$(document).ready(function () {
	$('#formRegister').validate({
		rules: {
			txtHoten: {
				required: true,
				maxlength: 100
			},
			txtEmail: {
				required: true
			},
			txtPass: {
				required: true,
				minlength: 6
			},
			txtRePass: {
				required: true
			}
		},
		messages: {
			txtHoten: {
				required: "Họ và tên không được để trống!",
				maxlength: "Họ và tên không được vượt quá 100 ký tự!"
			},
			txtEmail: {
				required: "Email không được để trống!"
			},
			txtPass: {
				required: "Mật khẩu không được để trống!",
				minlength: "Password phải chứa ít nhất 6 ký tự!"
			},
			txtRePass: {
				required: "Nhập lại mật khẩu không được để trống!"
			}
		}
	});
	$('#formProfile').validate({
		rules: {
			hoten:{
				required: true
			},
			ngaysinh:{
				required: true
			},
			diachi: {
				required: true,
				maxlength: 100
			},
			dienthoai: {
				required: true,
				checkValidPhoneNumber: true
			}
		},
		messages: {
			hoten:{
				required: "Họ và tên không được để trống!"
			},
			ngaysinh:{
				required: "Ngày sinh không được để trống!"
			},
			diachi: {
				required: "Địa chỉ không được để trống!",
				maxlength: "Địa chỉ không được vượt quá 100 ký tự!"
			},
			dienthoai: {
				required: "Điện thoại không được để trống!",
				checkValidPhoneNumber: "Số điện thoại không hợp lệ!"
			}
		}
	});
});
jQuery.validator.addMethod("checkValidPhoneNumber", function(value, element) {
	if (value.length !== 10) {
		return false;
	}
	for (let i = 0; i < value.length; i++) {
		if (parseInt(value[i]) != value[i]) {
			return false;
		}
	}
	return true;
},"Invalid phone number");
