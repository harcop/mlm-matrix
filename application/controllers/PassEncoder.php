<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PassEncoder extends CI_Controller{
    
    public function index(){
//        echo do_hash('c1nd3r');
        echo do_hash('123456');
    }
}
