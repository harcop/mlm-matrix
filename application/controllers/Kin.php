<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kin extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        if(!isset($this->session->username)){
            redirect('logout');
        }
        if($this->session->user_kin == 'kinner'){
            redirect('logout');
        }
        $this->username = $this->session->username;
        $this->load->model('newuser_model');

    }
    
    public function index(){
        $this->load->view('kin_reg');
    }
    
    public function reg(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('kin_name','Kin Name','required|trim');
        $this->form_validation->set_rules('kin_rel','Kin Relationship','required|trim|alpha');
        $this->form_validation->set_rules('kin_dob','Kin Date of birth','required|trim');
        $this->form_validation->set_rules('kin_phone','Kin Phone Number','required|trim');
        $this->form_validation->set_rules('kin_address','Kin Address','required|trim');
        
        if($this->form_validation->run()){
            $resp = $this->newuser_model->kin_reg();
            if($resp == 'success'){
                $this->session->set_flashdata('msg','<div class="alert alert-success">Kin detail successfully added</div>');
                $this->session->user_kin = 'kinner';
                redirect('profile');
                
            }else if($resp == 'failed'){
                $this->session->set_flashdata('msg','Error');
                redirect('kin');
            }
        }else{
            $this->load->view('kin_reg');
        }
    }
}