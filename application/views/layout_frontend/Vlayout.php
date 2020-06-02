<?php 
 	$data['url'] 			= base_url();
	$data['message'] 		= getMessages();
	$data['session'] 		= getSession('info_khachhang');
	$data['count_cart'] 	= countCart();
	$data['tt_giaohang'] 	= checkThongTinGiaoHang();
	$data['menu'] 			= getMenu();

	$this->parser->parse('layout_frontend/Vheader', $data);
	$this->parser->parse($template, $data);
	$this->parser->parse('layout_frontend/Vfooter', $data);
 ?>
