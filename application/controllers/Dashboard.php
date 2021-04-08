<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public $username;
    public $data = [];
    public function __construct(){
        parent::__construct();
        
        if(!isset($this->session->username)){
            redirect('logout');
        }
        
        $this->load->model('dashboard_model');
        $this->username = $this->session->username;
        
        $rows = $this->dashboard_model->load_header();
        $new_note = $this->dashboard_model->load_notification();
        $tree_side = $this->dashboard_model->load_side();
        
        $this->data['username'] = $this->username;
        $this->data['rows'] = $rows;
        $this->data['side'] = $tree_side;
        $this->data['new_note'] = $new_note;
     
        
    }
    
    public function index(){
        $this->load->view('dashboard',$this->data);
    }
}