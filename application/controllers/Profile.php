<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        if(!isset($this->session->username)){
            redirect('logout');
        }
        
        $this->load->library('parser');
        $this->username = $this->session->username;
        $this->load->model('profile_model');

    }
    
    public function index(){
        $resp = $this->profile_model->load_profile($this->username);

        $data = $resp;
//        echo '<pre>';
//        print_r($resp);
//        echo '</pre>';
        $this->parser->parse('profile',$data);
    }
}
