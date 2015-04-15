<?php

	class carService extends CI_Controller{


		public function __construct(){
			parent::__construct();
			$this->load->model('carServiceModel');
		}

		function getAllServices(){
			$data = array(
			'userid' => $this->session->userdata('userid'),
			'name' => $this->session->userdata('name'),
			'username' => $this->session->userdata('username'),
			'password' => $this->session->userdata('password'),
			'weight' => $this->session->userdata('weight')
		);
		
			$data['services'] = $this->carServiceModel->getAllServices();

			$this->load->view('header');
			$this->load->view('nav', $data);
			$this->load->view('carServices', $data);
			$this->load->view('footer');
		}

		


	}