<?php
	$data['url'] 		= base_url();
	$data['message'] 	= getMessages();
	$data['session'] 	= getSession();

	$this->parser->parse('layout_backend/Vheader', $data);
	$this->parser->parse($template, $data);
	$this->parser->parse('layout_backend/Vfooter', $data);
?>
