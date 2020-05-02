<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('form_validation');
        $this->load->library('session');
        //$this->load->library('encrypt');
        $this->load->helper('login');
    }

    function register(){
        $data['title'] = 'Codetest Register';
        $this->load->view("auth/register.php", $data);
    }

    function register_validation(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run()) {
            $data = array(
                'uuid' => uuid(),
                'email'  => $this->input->post('email'),
                'password'  => $this->input->post('password'),
                //'password' => $this->encrypt->encode($this->input->post('password')),
                'status' => 0
               );
            $this->user->insert_data($data);
            $this->login();
        }        
    }
   
    function login(){
        $data['title'] = 'Codetest Login';
        $this->load->view("auth/login.php", $data);
    }

    function login_validation(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            //$password =  $this->encrypt->encode($this->input->post('password'));
            
            if ($this->user->can_login($email, $password)) {
                $session_data = array('email' => $email);
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'home');
            }else{
                $this->session->set_flashdata('error', 'Invalid email or password!');
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