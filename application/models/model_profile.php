<?php

class Model_profile extends CI_Model{

	function add_image($username, $image){
		$insert_image = array(
			'username' => $username,
			'image' => $image,
			'title' => $this->input->post('title'),
			'author' => $this->input->post('author'),
			'description' => $this->input->post('description')
		);

		$insert_query = $this->db->insert('images', $insert_image);
		return $insert_query;
	}

	function get_user_images($username){
		$this->db->where('username', $username);
		$q = $this->db->get('images');

		return $q->result();
	}
}