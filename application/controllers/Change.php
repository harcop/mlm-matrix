<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change extends CI_Controller{
    public $data = [];
    public function __construct(){
        parent::__construct();
        
        if(!isset($this->session->username)){
            redirect('logout');
        }
        $this->load->model('change_model');

    }
    
    
    public function index(){
        $this->load->view('password');
    }
    
    public function password(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
        $this->form_validation->set_rules('old_pass','Old Password','required|trim');
        $this->form_validation->set_rules('new_pass','New Password','required|trim|min_length[6]');
        $this->form_validation->set_rules('pass_c','Confirm Password','required|trim|matches[new_pass]',
                                         array(
                                            'required'=>'You need to confirm password'
                                         )
                                         );
        
        if($this->form_validation->run()){
            $old_pass = $this->input->post('old_pass');
            $new_pass = $this->input->post('new_pass');
            $msg = $this->change_model->change_password($old_pass,$new_pass);
            
            if($msg == 'success'){
                $msg = $this->data['msg'] = '<div class="alert alert-success">Password changed successfully</div>';
            }else{
                $this->data['msg'] = $msg;
            }
            $this->session->set_flashdata('msg',$msg);
                redirect('change');
            
        }else{
            $this->load->view('password');
        }
    }
    
    public function pin(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
        $this->form_validation->set_rules('old_pin','Old Pin','required|trim');
        $this->form_validation->set_rules('new_pin','New Pin','required|trim|min_length[6]|integer');
        $this->form_validation->set_rules('pin_c','Confirm Pin','required|trim|matches[new_pin]',
                                         array(
                                            'required'=>'You need to confirm pin'
                                         )
                                         );
        
        if($this->form_validation->run()){
            $old_pin = $this->input->post('old_pin');
            $new_pin = $this->input->post('new_pin');
            $msg = $this->change_model->change_pin($old_pin,$new_pin);
            
            if($msg == 'success'){
                $msg = $this->data['msg'] = '<div class="alert alert-success">Pin changed successfully</div>';
            }else{
                $this->data['msg'] = $msg;
            }
            $this->session->set_flashdata('msg',$msg);
                redirect('change/pin');
            
        }else{
            $this->load->view('pin');
        }
    }
}