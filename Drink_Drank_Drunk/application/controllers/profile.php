<?php

	class Profile extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('profileModel');
			date_default_timezone_set('America/Toronto'); 
		}

		public function editProfile() { //this function actually calls to the database to make the changes when you submit the edit form
			$this->profileModel->editProfile(); //model for the changes
			redirect('login'); //redirect to the relogin route: $route['relogin'] = 'profile/relogin'; (calls to the profile controller and then the function relogin)

			
		}

		

	}