<?php

class Model_user extends CI_Model{

	function validate(){
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$q = $this->db->get('users');

		if($q->num_rows == 1){
			return true;
		}
	}

	function get_user_data($user){
		$this->db->where('username', $user);
		$q = $this->db->get('users');

		return $q->result();
	}

	function add_user(){
		$insert_member = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		);

		$insert_query = $this->db->insert('users', $insert_member);
		return $insert_query;
	}

}