<?php 

class Profile extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->check_login();
	}

	function index(){
		$records = $this->session->userdata('records');

		foreach($records as $r){
			$first = $r->first_name;
			$last = $r->last_name;
			$email = $r->email;
		}

		$data = array(
			'content' => 'view_profile',
			'first_name' => $first,
			'last_name' => $last,
			'email' => $email
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