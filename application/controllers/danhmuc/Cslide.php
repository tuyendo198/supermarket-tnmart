<?php


class Cslide extends MY_Controller
{
	public $Mslide;

	public function __construct() {
		parent::__construct();
		$this->load->model('danhmuc/Mslide', 'Mslide');
		$this->Mslide = new Mslide();
	}
	public function index() {
		if($this->input->post('btnThem')){
			$this->insert_slide();
		}

		$data['stt']            = 1;

		$data['message'] 		= getMessages();
		$temp['data']     		= $data;
		$temp['template'] 		='danhmuc/Vslide';
		$this->load->view('layout_backend/Vlayout',$temp);
	}
	public function insert_slide(){
		$config['upload_path'] = 'assets/img/slider/';
		$config['allowed_types'] = '*';
		$config['max_size'] = 100000;
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		for ($i=1; $i<4; $i++) {
			if ($_FILES['slide'.$i]['size'] > 0) {
				$_FILES['filepost'] = array(
					'name' => 'slider'.$i.'.png',
					'type' => $_FILES['slide'.$i]['type'],
					'tmp_name' => $_FILES['slide'.$i]['tmp_name'],
					'error' => $_FILES['slide'.$i]['error'],
					'size' => $_FILES['slide'.$i]['size']
				);
//				pr($_FILES['filepost']);
				if($this->upload->do_upload("filepost")){
					setMessages('success','','Upload slide thành công !');
				}
				else{
					$errors = $this->upload->display_errors();
					setMessages('error','','Có lỗi xảy ra. Vui lòng thử lại!');
					return redirect(base_url().'slide');
				}
			}
		}
		return redirect(base_url().'slide');
	}
}
