<?php 

class Profile extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->check_login();
	}

	function index(){
		$records = $this->session->userdata('records');

		$data = array(
			'content' => 'view_profile',
			'records' => $records
		);

		$this->load->view('includes/template', $data);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	function check_login(){
		$logged_check = $this->session->userdata('logged_in');

		if(!isset($logged_check) || $logged_check == false){
			redirect('login');
		}
	}
}