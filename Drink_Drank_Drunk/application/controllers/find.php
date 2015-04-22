<?php

	class Find extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('graphModel');
		}

		public function send($str=NULL){
			$list = $this->graphModel->getBacTime($str);
			$times = json_encode($list);
			echo $times;
		}

	}