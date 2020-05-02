<?php

class Pages extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('login');
	}

    public function main()
	{
		$this->load->view('main');
    }
    
    public function home()
	{
		isLogin();
		$this->load->view('home');
	}
}