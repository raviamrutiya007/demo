<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

   

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');

    }
    public function index()
    {
        $this->load->view('login.php');
    }

    public function login_user(){
        $email = $this->input->post('Email');
        $password = $this->input->post('password');
        $where = array('email' => $email, 'password' => md5($password));
        $data = $this->LoginModel->get_user($where);
        if($data){
            $this->session->set_userdata('user_Data', $data);
            redirect(base_url('Product/list_products'));

        }else{
            $this->session->set_flashdata('message_name', 'Email Or password Wrong');
            redirect(base_url('login'));


        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Login'));

    }

    
}
