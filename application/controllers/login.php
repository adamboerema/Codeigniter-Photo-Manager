<?php

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	function index(){
		$data['content'] = 'view_login';
		$this->load->view('includes/template', $data);
	}

	function validate(){
		$this->load->model('model_user');
		$q = $this->model_user->validate();

		if($q){

			$user_records = $this->model_user->get_user_data($this->input->post('username'));

			foreach($user_records as $ur){
				$records = $ur;
			}

			$session_data = array(
				'username'=>$this->input->post('username'),
				'records'=> $records,
				'logged_in'=>true
			);

			$this->session->set_userdata($session_data);
			redirect('profile');
		}
		else{
			die('this didn\'t work');
		}
	}
	function register_user(){
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[28]|is_unique[users.username');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');

		if($this->form_validation->run()== false){
			$this->register();
		}
		else{
			$this->load->model('model_user');

			if($q = $this->model_user->add_user()){
				$data = array(
					'content' => 'view_login',
					'register_success' => true
				);
				$this->load->view('includes/template', $data);
			}
			else{
				$this->register();
			}
		}
	}

	function register(){
		$data['content'] = 'view_register';
		$this->load->view('includes/template', $data);
	}
}