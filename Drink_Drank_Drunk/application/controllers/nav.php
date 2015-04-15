<?php

class Nav extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('drinksModel');
		$this->load->model('userInfoModel');
	}

	public function index() {
		$data = array(
			'userid' => $this->session->userdata('userid'),
			'name' => $this->session->userdata('name'),
			'username' => $this->session->userdata('username'),
			'password' => $this->session->userdata('password'),
			'weight' => $this->session->userdata('weight')
		);
		$data['error'] = FALSE;
		$this->load->view('header');
		$this->load->view('logIn', $data);
		$this->load->view('footer');
	}

	public function view($page){
		$data = array(
			'userid' => $this->session->userdata('userid'),
			'name' => $this->session->userdata('name'),
			'username' => $this->session->userdata('username'),
			'password' => $this->session->userdata('password'),
			'weight' => $this->session->userdata('weight')
		);
		$this->load->view('header');

		if($page == "login"){
			$this->load->view('login');
		}
		
		if($page == "adddrink"){
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
	}
}