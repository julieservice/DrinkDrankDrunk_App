<?php

	class carServiceControl extends CI_Controller{


		public function __construct(){
			parent::__construct();
			$this->load->model('carServiceModel');
		}

		function getServices($serviceid){
			$data['service'] = $this->carServiceModel->getService($serviceid);
			
			$this->load->view('header');
			//$this->load->view('drinklist', $data);
			$this->load->view('footer');
		}

		


	}