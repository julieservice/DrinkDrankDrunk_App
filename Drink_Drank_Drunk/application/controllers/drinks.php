<?php

	class Drinks extends CI_Controller{


		 function __construct(){
			parent::__construct();
			$this->load->model('drinksModel');
			$this->load->model('addDrinkModel');
			$this->load->model('userInfoModel');
			$this->load->model('drinkToUserModel');
		}

		function getDrinks($typeid){
			if($this->session->userdata('userid')){
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
			}else{
				redirect('login');
			}
		}

		 function addOtherDrink(){ //add other drinks form
		 	if($this->session->userdata('userid')){
				$this->form_validation->set_rules('dname','Drink Name','required');//set form rules ie. first name is required
				$this->form_validation->set_rules('quantity','Quantity','numeric|required');
				$this->form_validation->set_rules('apercent','Alochol Percent','numeric|required');

				if($this->form_validation->run() === FALSE){//if form validation is false, if it not filled out according to rules
					$this->load->view('header');
					$this->load->view('formerrors');//form errors will appear
					$this->load->view('otherDrink');
				} else{
					$data = array(
						'userid' => $this->session->userdata('userid'),
						'name' => $this->session->userdata('name'),
						'username' => $this->session->userdata('username'),
						'password' => $this->session->userdata('password')
						
					);
					$this->addDrinkModel->addOtherDrink();
					$this->load->view('header');
					$this->load->view('nav', $data);
					$this->load->view('otherDrink');
					$this->load->view('success');
				}
			}else{
				redirect('login');
			}
		}

		function addToSession($drinkid){
			if($this->session->userdata('userid')){
			$data = array(
				'userid' => $this->session->userdata('userid'),
				'name' => $this->session->userdata('name'),
				'username' => $this->session->userdata('username'),
				'password' => $this->session->userdata('password'),
				'weight' => $this->session->userdata('weight'),
				'height' => $this->session->userdata('height'),
				'gender' => $this->session->userdata('gender'),
				'age' => $this->session->userdata('age'),
				'email' => $this->session->userdata('email')
			);

			$this->drinkToUserModel->addDrinkToSession($drinkid);
			redirect('page/results');
			}else{
				redirect('login');
			}
		}


	}