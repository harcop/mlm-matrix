<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tree extends CI_Controller{
    public $data = [];
    public function __construct(){
        parent::__construct();
        
        if(!isset($this->session->username)){
            redirect('logout');
        }
        
        $this->load->model('dashboard_model');
        $this->load->model('tree_model');
        
        
        $this->data['tree'] = 'tree1';
        $this->data['m_username'] = $this->session->username;
        $this->data['username'] = $this->session->username;
        $this->data['conn'] = $this;
        
        $rows = $this->tree_model->tree_header('tree1');
        $this->data['rows'] = $rows;
 
    }
    
    
    
    public function index(){
        
        $this->load->view('tree1',$this->data);
    }
    
    public function stage($level_name=''){
        if($this->uri->segment(5)){
            redirect('tree');
        }
        switch($level_name){
            case 'jasper':
                $level = 2;
                break;
            case 'opal':
                $level = 3;
                break;
            case 'topaz':
                $level = 4;
                break;
            case 'jadeite':
                $level = 5;
                break;
            case 'gernet':
                $level = 6;
                break;
            case 'sapphire':
                $level = 7;
                break;
            case 'diamond':
                $level = 8;
                break;
            case 'Diamond':
                $level = 9;
                break;
            default:
                $level = 1;
                break;
            
        }
        $this->data['level_name'] = $level_name;
        
        $tree = 'tree'.$level;
        $this->data['tree'] = $tree;
        
        if($this->uri->segment(4)){
            $username = $this->uri->segment(4);
            $resp = $this->tree_model->check_downline_upline($username);
            
            $rows = $this->tree_model->tree_header($tree);
            $this->data['rows'] = $rows;
            
            if($resp == 'real'){
                $this->data['m_username'] = $this->uri->segment(4);
                $this->load->view('treeup',$this->data);
            }else if($resp == 'fake'){
                redirect('tree');
            }
        }
        else if($this->uri->segment(3) && $level > 1){
            $rows = $this->tree_model->tree_header($tree);
            $this->data['rows'] = $rows;
            $this->load->view('treeup',$this->data);
        }else{
            redirect('tree');
        }
    }
    
    public function tree_data($username,$tree){
        $result = $this->tree_model->tree_data($username,$tree);
        return $result;
    }
    
    public function gem($username=''){
        if($this->uri->segment(4)){
            redirect('tree');
        }
        else if($this->uri->segment(3)){
            $resp = $this->tree_model->check_downline_upline($username);
            if($resp == 'real'){
                $this->data['m_username'] = $username;
                $this->load->view('tree1',$this->data);
            }else if($resp == 'fake'){
                redirect('tree');
            }
            
//            
        }else{
            $this->load->view('tree1',$this->data);
        }
    }
    
}