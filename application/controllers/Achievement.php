<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achievement extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->username = $this->session->username;
        $this->load->model('achievement_model');
    }
    
    public function index(){
        $resp = $this->achievement_model->load_ach();
        $data['ach'] = $resp;
        $this->load->view('achievement',$data);
    }
    
    
}
