<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Register');
		$this->load->model('Login');
	}

	public function index() {
		$data['error'] = FALSE;
		$data = array(
			'userid' => $this->session->userdata('userid'),
			'name' => $this->session->userdata('name'),
			'username' => $this->session->userdata('username'),
			'password' => $this->session->userdata('password'),
			'weight' => $this->session->userdata('weight')
		);
		$this->load->view('header');
		$this->load->view('nav', $data);
		$this->load->view('landing');
		//$this->load->view('footer');

	}
	public function view($page) {
		$this->load->view('header');

		if($page == "signup") {
			$data['error'] = FALSE;
			$this->load->view('signUp', $data);
		}
		if($page == "drinkbeer"){
			$this->load->view('drinkBeer');
		}

		//$this->load->view('footer');
	}

	public function register(){ //Signup view
		$data['error'] = FALSE;
		$this->form_validation->set_rules('name','First Name','required');//set form rules ie. first name is required
		$this->form_validation->set_rules('uname','User Name','trim|required|alpha_dash|xss_clean');//alpha_dash can use both letters and numbers
		$this->form_validation->set_rules('age','Age','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('height','Height','required');
		$this->form_validation->set_rules('weight','Weight','required');
		$this->form_validation->set_rules('email','E-mail','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|alpha_dash');

		if($this->form_validation->run() === FALSE){//if form validation is false, if it not filled out according to rules
			$data['error'] = TRUE;
			$data['user_error'] = "<p>Please Try Again</p>";
			$this->load->view('header');
			$this->load->view('signUp', $data);
		
		} else{
			$check = $this->Register->register();
			$this->load->view('header');

			if($check){//checking if user name already exists
				$data['error'] = TRUE;
				$data['user_error'] = "Username already exists";//if it does exist already
				$this->load->view('signUp', $data);

			} else{

				//$this->load->view('header');//if user name doesnt exist and form is valid
				$this->load->view('regSuccess');

			}
			$this->load->view('footer');
		}
	}

	public function login(){//once registeed user can now login

		$this->form_validation->set_rules('username','User Name','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() === FALSE){
			$data['error'] = TRUE;
			$data['user_error'] = "<p>Please Try Again</p>";
			$this->load->view('header');

			$this->load->view('login', $data);
			$this->load->view('footer');
		}else{
			$user = $this->Login->login();
			if($user == FALSE){
				$data['error'] = TRUE;
				$data['user_error'] = "<p>Username or password is incorrect</p>";
				$this->load->view('header');
				$this->load->view('login', $data);
				$this->load->view('footer');
			}
			else{
				$sess = $this->Login->session($user);
				redirect('page/results');

			}
		}
	}

	public function logout() {//on sign out, session is distroyed and will redirct to landing page
		$this->session->sess_destroy();
		redirect('login');
	}


}