<?php
defined("BASEPATH") OR exit('No direct script access allowed');

class Downline extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        if(!isset($this->session->username)){
            redirect('logout');
        }
        
        $this->load->model('downline_model');
        
    }
    
    public function index(){
        $resp = $this->downline_model->load_direct();
//        print_r($resp);
        $data['downline'] = $resp;
        $this->load->view('direct_down',$data);
    }
    
    public function direct(){
        $this->index();
    }
     public function indirect(){
        $resp = $this->downline_model->load_in_direct();
        $data['downline'] = $resp;
        $this->load->view('indirect_down',$data); 
     }
}