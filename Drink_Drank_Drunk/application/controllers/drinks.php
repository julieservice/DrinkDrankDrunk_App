<?php

	class Drinks extends CI_Controller{


		public function __construct(){
			parent::__construct();
			$this->load->model('drinksModel');
			$this->load->model('addDrinkModel');
		}

		function getDrinks($typeid){
			$data = array(
				'userid' => $this->session->userdata('userid'),
				'name' => $this->session->userdata('name'),
				'username' => $this->session->userdata('username'),
				'password' => $this->session->userdata('password')
				
			);
			$data['type'] = $this->drinksModel->getType($typeid);
			$data['drinks'] = $this->drinksModel->getDrinksByType($typeid);
			$this->load->view('header');
			
			$this->load->view('nav', $data);
			$this->load->view('drinklist', $data);
			$this->load->view('footer');
		}

		public function addOtherDrink(){ //add other drinks form
			$this->form_validation->set_rules('dname','Drink Name','required');//set form rules ie. first name is required
			$this->form_validation->set_rules('quantity','Quantity','numeric|required');
			$this->form_validation->set_rules('apercent','Alochol Percent','numeric|required');

			if($this->form_validation->run() === FALSE){//if form validation is false, if it not filled out according to rules
				$this->load->view('header');
				$this->load->view('formerrors');//form errors will appear
				$this->load->view('otherDrink');
			} else{
				$this->addDrinkModel->addOtherDrink();
				$this->load->view('header');
				$this->load->view('success');
			}
		}
		


	}