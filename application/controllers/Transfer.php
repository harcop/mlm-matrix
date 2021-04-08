<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller{
    public $username;
    public $data = [];
    
    public function __construct(){
        parent::__construct();
        
        if(!isset($this->session->username)){
            redirect('logout');
        }
        
        $this->username = $this->session->username;
        
        $this->load->model('transfer_model');
        $mon = $this->transfer_model->load_balance();
        
        $this->data['mon'] = $mon;
        
    }

    public function index(){
//        print_r($this->data['mon']);
        $this->load->view('transfer',$this->data);
    }
    
    public function transfer(){
        
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
        $this->form_validation->set_rules('amount','Amount','required|greater_than[0]|trim|integer');
        $this->form_validation->set_rules('recipient','Recipient','required|trim');
        $this->form_validation->set_rules('pin','Pin','required|trim');
        
            
        if($this->form_validation->run()){
            $amount = $this->input->post('amount');
            $recipient = strtolower($this->input->post('recipient'));
            if($recipient != strtolower($this->username)){
                $pin = $this->input->post('pin');
                $msg = $this->transfer_model->transfer_fund($amount,$recipient,$pin);

                if($msg == 'success'){
                    $msg = $this->data['msg'] = '<div class="alert alert-success">Fund successfully transfered</div>';
                }else{
                    $this->data['msg'] = $msg;
                }
                $this->session->set_flashdata('msg',$msg);
                    redirect('transfer');
            }else{
                $msg = $this->data['msg'] = '<div class="alert alert-danger">You cannot transfer to yourself..Bewared</div>';
                $this->session->set_flashdata('msg',$msg);
                redirect('transfer');
            }
        }
        else{
            $this->load->view('transfer',$this->data);
        }
    }
}