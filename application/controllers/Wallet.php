<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class Wallet extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        if(!isset($this->session->username)){
            redirect('logout');
        }
        if($this->session->user_pin == 'pin'){
            redirect('logout');
        }
        $this->load->model('newuser_model');
    }
    
    public function index(){
        $this->load->view('wallet_pin_reg');
    }
    
    public function reg(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('pin','Pin','required|trim|min_length[6]',
                                          array(
                                                'min_length'=>'%s must be 6 greater than 6 digit'
                                          ));
        $this->form_validation->set_rules('pin_c','Pin','required|trim|matches[pin]');
        
        if($this->form_validation->run()){
            $pin = $_POST['pin'];
            
              $resp = $this->newuser_model->wallet_reg();
                if($resp == 'success'){
                    $this->session->set_flashdata('msg','<div class="alert alert-success">Wallet detail successfully added</div>');
                    $this->session->user_pin = 'pin';
                    redirect('profile');

                }else if($resp == 'failed'){
                    $this->session->set_flashdata('msg','Error');
                    redirect('wallet');
                }
        }
        else{
                $this->load->view('wallet_pin_reg');
            }
    }
}