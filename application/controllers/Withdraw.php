<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends CI_Controller{
    public $username;
    public $data = [];
    
    public function __construct(){
        parent::__construct();
        
        if(!isset($this->session->username)){
            redirect('logout');
        }
        
        $this->load->model('withdraw_model');
        $mon = $this->withdraw_model->load_balance();
        $this->data['mon'] = $mon;
        
    }
    
    public function index(){
        $this->load->view('withdraw',$this->data);
    }
    
    public function withdraw(){
        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('amount','Amount','required|greater_than[10]|trim|integer',
                                          array(
                                                'greater_than'=>'%s must be greater than $10'
                                          ));
        $this->form_validation->set_rules('pin','Pin','required|greater_than[6]|trim',
                                          array(
                                                'greater_than'=>'%s length must be greater than 6'
                                          ));
        
        if($this->form_validation->run()){
            $amount = $this->input->post('amount');
            $amount = $this->input->post('pin');
            $msg = $this->withdraw_model->withdraw($amount);
            
            if($msg == 'success'){
                $msg = $this->data['msg'] = '<div class="alert alert-warning">Withdraw of Fund in  Processing</div>';
            }
            else{
                $this->data['msg'] = $msg;
            }
            $this->session->set_flashdata('msg',$msg);
            redirect('withdraw');
            
        }else{
            $this->load->view('withdraw',$this->data);
        }
    }
}