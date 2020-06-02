<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	protected $_session;

	public function __construct() {
		parent::__construct();
        if (isset($this->session->userdata['login'])) {
             $this->_session = $this->session->userdata['login'];

            // Không có session, đá về trang đăng nhập
            if(!isset($this->_session) || empty($this->_session))
            {
                redirect('login');
                exit();
            }
        }else{
            redirect('login');
            exit();
        }
	}
	
} // End class

class MY_Controller_KH extends CI_Controller {
	protected $_session;

	public function __construct() {
		parent::__construct();
		if (isset($this->session->userdata['info_khachhang'])) {
			$this->_session = $this->session->userdata['info_khachhang'];

			// Không có session, đá về trang đăng nhập
			if(!isset($this->_session) || empty($this->_session))
			{
				pr("No permision");
				exit();
			}
		}else{
			pr("No permision");
			exit();
		}
	}

} // End class
