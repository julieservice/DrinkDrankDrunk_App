<?php

	class ProfileModel extends CI_Model {

		public function __construct() {
			parent::__construct();
			$this->load->database(); 
		}

		public function editProfile() {			
			//get session info
			$user = array(
				'userid' => $this->session->userdata('userid'),
				'username' => $this->session->userdata('username'),
			);

			//set the database fields based on form and session info (you probably don't want to allow them to change their username cause it will make you have to do more work)
			$userdata = array(
               'user_id' => $user['userid'], //user id from session
               'username' => $this->input->post('username'), 
               'password' => $this->input->post('password'), 
               'name' => $this->input->post('name'), 
               'weight' => $this->input->post('weight'), 
               'height' => $this->input->post('height'),
               'gender' => $this->input->post('gender'), 
               'age' => $this->input->post('age'),
               'email' => $this->input->post('email')
             
            );

			$this->db->where('tbl_user.user_id = '.$user['userid']); //where statement to get the user from the table. Reads: select all from tbl_users where the users_id is equal to the session userid
			$this->db->update('tbl_user', $userdata); //update the information in that table based on what you just got with the form array 'userdata'

		}

	}