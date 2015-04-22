<?php

class Nav extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('drinksModel');
		$this->load->model('userInfoModel');
		$this->load->model('graphModel');
		$this->load->model('profileModel');
	}

	public function index() {
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
		$data['error'] = FALSE;
		$this->load->view('header');
		$this->load->view('logIn', $data);
		$this->load->view('footer');
	}

	public function view($page){
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

			$data['currBAC'] = $this->drinksModel->getBAC();
			$this->load->view('header', $data);

			if($page == "login"){
				$this->load->view('login');
			}
			
			if($page == "adddrink"){
				$data['dinfo'] = $this->drinksModel->getDrinkInfo();
				$data['alltypes'] = $this->drinksModel->getAllTypes();
				$this->load->view('nav', $data);
				$this->load->view('addDrink', $data);

			}
			
			if($page == "drinkother"){
				$this->load->view('nav', $data);
				$this->load->view('otherDrink');
			}

			if($page == "results"){
				$data['info'] = $this->userInfoModel->getInfo(2);//(2) need to change to $variable call to logged in user's id
				$data['percent'] = $this->drinksModel->getSessionAlcoholPercent();
				$data['oz'] = $this->drinksModel->getSessionOunces();
				$data['dinfo'] = $this->drinksModel->getDrinkInfo();

				$this->load->view('nav', $data);
				$this->load->view('results', $data);
			}
			if($page == "carservices"){
				$this->load->view('nav', $data);
				$this->load->view('carServices');
			}
			if($page == "editprofile"){
				$this->load->view('nav', $data);
				$this->load->view('editProfile');
			}

			$this->load->view('footer');
		}else{
			redirect('login');
		}
	}
}