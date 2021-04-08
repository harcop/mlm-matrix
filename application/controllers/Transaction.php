<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller{
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
        
        $tree_side = $this->dashboard_model->load_side();
        $this->data['side'] = $tree_side;
        
        $this->data['username'] = $this->username;
        $this->data['rows'] = $rows;
        
        $this->load->model('transaction_model');

    }
    
    public function index(){
        $trans = $this->transaction_model->load_transaction();
        $this->data['bonus'] = $trans;
        
        $fund_trans = $this->transaction_model->load_fund_transaction();
        $this->data['fund_received'] = $fund_trans;
        
        $fund_with = $this->transaction_model->load_with_transaction();
        $this->data['fund_withdraw'] = $fund_with;
        
        $this->load->view('transaction',$this->data);
    }
}