<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->library('encryption');
         $this->load->library('session');
        $this->load->model('login_model');
    }
    
    public function index(){
        $this->load->view('login');
    }
    
    public function login(){
        
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');
        if($this->form_validation->run()){
            $username = strtolower($this->input->post('username'));
            $password = $this->input->post('password');
            $result = $this->login_model->logging($username,$password);
            if($result == true){
                $this->session->username = $this->input->post('username');
               redirect('dashboard'); 
            }else{
                $this->session->set_flashdata('message','Invalid detail');
                $this->load->view('login');
            }
            
        }else{
           
            $this->session->set_flashdata('message','Invalid Login');
            $this->load->view('login');
        }
    }
    
    public function log(){
//        print_r($this->uri->segment_array());
//        $this->login_model->logs();
    }
    
}