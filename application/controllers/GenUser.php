<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class GenUser extends CI_Controller{
    

    
    public function __construct(){
        parent::__construct();
        $this->username = 'admin';
        $this->load->model('genusers'); 
    }
    
    public function index(){
        $this->genusers->index();
    }
    
    
   
   }
