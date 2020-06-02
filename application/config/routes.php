<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'Chome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route BackEnd
$route['login']     			= 'hethong/Clogin';
$route['welcome']				= 'hethong/Cwelcome';
$route['binh-luan']				= 'hethong/Cbinhluan';
$route['danh-gia']				= 'hethong/Cdanhgia';

$route['logout']				= 'Chome/dangxuat';

$route['my-info']				= 'user/Cmyinfo';
$route['doi-mat-khau']			= 'user/Cdoimatkhau';
$route['danh-sach-nguoi-dung']	= 'user/Cdanhsachnguoidung';
$route['cap-taikhoan-nhan-vien']= 'user/Ccaptaikhoan';
$route['danh-sach-tai-khoan']	= 'user/Cdanhsachtaikhoan';
$route['forget-pass']			= 'user/Cforgetpass';

$route['nhom-danh-muc']			= 'danhmuc/Cnhomdanhmuc';
$route['slide']					= 'danhmuc/Cslide';
$route['nha-cung-cap']			= 'danhmuc/Cnhacungcap';
$route['nha-san-xuat']			= 'danhmuc/Cnhasanxuat';
$route['status']				= 'danhmuc/Ctrangthai';
$route['hinhthucthanhtoan']		= 'danhmuc/Chinhthucthanhtoan';

$route['nhom-san-pham']			= 'sanpham/Cnhomsanpham';
$route['danh-sach-san-pham']	= 'sanpham/Cdanhsachsp';
$route['khuyen-mai']			= 'sanpham/Ckhuyenmai';
$route['huysanpham']			= 'sanpham/Chuysanpham';

$route['nhap-hang']				= 'giaodich/Cnhaphang';
$route['hoa-don']				= 'giaodich/Choadon';
$route['tao-don-hang']			= 'giaodich/Ctaodonhang';
$route['danh-sach-don-hang']	= 'giaodich/Cdanhsachdonhang';
$route['danh-sach-phieu-nhap']	= 'giaodich/Cdanhsachphieunhap';

$route['lichsumuahang']			= 'hethong/Clichsumuahang';

$route['reportnhaphang']		= 'reports/Creportnhaphang';
$route['reportdonhang']			= 'reports/Creportdonhang';
$route['reportsanpham']			= 'reports/Creportsanpham';
$route['reportdoanhthu']		= 'reports/Creportdoanhthu';

// Route FrontEnd
$route['detail'] 				= 'Cdetail';
$route['nhom-sp'] 				= 'Cnhomsanpham';
$route['profile']				= 'Cprofile';
$route['thong-tin-don-hang']	= 'Cdonmua';
$route['change-pass']			= 'Cchangepass';
$route['gio-hang']				= 'Cgiohang';
$route['tim-kiem']				= 'Ctimkiem';
$route['lien-he']				= 'Clienhe';
$route['quenmatkhau']			= 'Cquenmatkhau';
$route['diachigiaohang']		= 'Cdiachi';
$route['dat-hang']				= 'Cdathang';
//$route['403_Forbidden'] = 'C403';
