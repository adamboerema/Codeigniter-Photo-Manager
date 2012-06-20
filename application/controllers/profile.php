<?php 

class Profile extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->check_login();
		$this->load->model('model_profile');
	}

	function index(){
		$records = $this->session->userdata('records');
		$username = $this->session->userdata('username');

		$images = $this->model_profile->get_user_images($username);

		$data = array(
			'content' => 'view_profile',
			'records' => $records,
			'images' => $images
		);
		$this->load->view('includes/template', $data);
	}

	function add_photo(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = 1024 * 8;
		$config['max_width']  = 1024;
		$config['max_height']  = 768;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('userfile')){
		    $error = array(
		    	'content' => 'view_upload_success',
		    	'error' => $this->upload->display_errors()
		    );
			$this->load->view('includes/template', $error);
		}
		else{
		   $this->load->model('model_profile');

		   $upload_data = $this->upload->data();
		   $file_name = $upload_data['file_name'];
		   $username = $this->session->userdata('username');

		   if($this->model_profile->add_image($username, $file_name)){
			   $data = array(
			   		'content' => 'view_upload_success',
			   		'upload_data' => $upload_data
			   	);
				$this->load->view('includes/template', $data);
		   	}
			else{
				die('add image failed');
			}
		}

	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	function check_login(){
		$logged_check = $this->session->userdata('logged_in');

		if(!isset($logged_check) || $logged_check == false){
			$this->session->sess_destroy();
			redirect('login');
		}
	}
}