<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    function __construct() 
    {
        parent::__construct();
        $this->load->helper('login');
        $this->load->model('user');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('encryption');
    }

    function register(){
        isNotLogin();
        $data['title'] = 'Register';
        $this->load->view('templates/header', $data);
		$this->load->view('templates/menu');
		$this->load->view("auth/register.php");
		$this->load->view('templates/footer');
    }

    function register_validation(){
        isNotLogin();
        $this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[100]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]|min_length[6]|max_length[100]');

        if ($this->form_validation->run()) {
            $data = array(
                'uuid' => uuid(),
                'email'  => $this->input->post('email'),
                'password' => $this->encryption->encrypt($this->input->post('password')),
                'status' => 1
               );
            $this->user->insert_data($data);
            $this->session->set_flashdata('success', 'Account Created!');
            $this->login();
        }else{
            $this->register();
        }    
    }
  
    function login(){
        isNotLogin();
        $data['title'] = 'Login';
        $this->load->view('templates/header', $data);
		$this->load->view('templates/menu');
		$this->load->view("auth/login.php");
		$this->load->view('templates/footer');
    }

    function login_validation(){
        isNotLogin();
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password =  $this->input->post('password');
            
            if ($this->user->can_login($email, $password)) {
                redirect(base_url() . 'home');
            }else{
                redirect(base_url() . 'auth/login');
            }
        }else{
            $this->login();
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url() . 'auth/login');
    }
}