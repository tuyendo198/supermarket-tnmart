<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Cwelcome extends MY_Controller {
	protected $_title= "Hệ thống quản lý bán hàng siêu thị";
	protected $_menu =''; 
	public function __construct() {
		parent::__construct();

	}
	
	public function index() {
		$data['title']    = $this->_title;
		$data['menu']     = $this->_menu;
		$data['message'] = getMessages();
		$temp['data']     = $data;
		$temp['template'] ='hethong/Vwelcome';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
} // End class

