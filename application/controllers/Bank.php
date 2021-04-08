<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        if(!isset($this->session->username)){
            redirect('logout');
        }
        if($this->session->bank_detail == 'bnk'){
            redirect('logout');
        }
        $this->username = $this->session->username;
        $this->load->model('newuser_model');

    }
    
    public function index(){
        $this->load->view('bank_reg');
    }
    
    public function reg(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('bank_name','Bank Name','required|trim');
        $this->form_validation->set_rules('acc_no','Account Number','required|trim');
        $this->form_validation->set_rules('acc_name','Account Name','required|trim');
        
        if($this->form_validation->run()){
            $resp = $this->newuser_model->bank_reg();
            if($resp == 'success'){
                $this->session->set_flashdata('msg','<div class="alert alert-success">Bank detail successfully added</div>');
                $this->session->bank_detail = 'bnk';
                redirect('profile');
            }else if($resp == 'failed'){
                $this->session->set_flashdata('msg','Error');
                redirect('bank');
            }
        }else{
            $this->load->view('bank_reg');
        }
    }
}