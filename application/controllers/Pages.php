<?php

class Pages extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('login');
	}

    public function main()
	{
		$data['title'] = 'Index';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu');
		$this->load->view('main');
		$this->load->view('templates/footer');
    }
    
    public function home()
	{
		isLogin();
		$data['title'] = 'Home';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}
}