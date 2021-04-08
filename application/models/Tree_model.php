<?php

class Tree_Model extends CI_Model{
    
    
    public function __construct(){
        parent::__construct();
        $this->username = $this->session->username;
    }
    
    public function tree(){
            $ch_node = $conn->query("SELECT * FROM `new_user_notification` WHERE `new_username`='$node' && `all_upline` LIKE '%,$m_username,%'");
            if($ch_node->num_rows > 0){
                $username = $node;
            }else{
                $username = $m_username;
            }
    }
    
    public function tree_data($username,$tree){
        $data = array();
        $result = $this->db->query("SELECT * FROM `$tree` WHERE `username`='$username'");
        if($result->num_rows() > 0){
            $rows = $result->result();
            $data['user'] = $rows[0]->username;
            
            
            $data['left_user'] = $rows[0]->left_user;
            $lef_user = $data['left_user'];
            $left_user = $this->db->query("SELECT `referral` FROM `users` WHERE `username`='$lef_user'")->row_array();
            if(strtolower($left_user['referral']) == strtolower($this->username)){
                $data['left_user_this_ref'] = true;
            }else{
                $data['left_user_this_ref'] = false;
            }
            $data['left_user_ref'] = $left_user['referral'];
            
            
            $data['right_user'] = $rows[0]->right_user;
            $rit_user = $data['right_user'];
            $right_user = $this->db->query("SELECT `referral` FROM `users` WHERE `username`='$rit_user'")->row_array();
            if(strtolower($right_user['referral']) == strtolower($this->username)){
                $data['right_user_this_ref'] = true;
            }else{
                $data['right_user_this_ref'] = false;
            }
            $data['right_user_ref'] = $right_user['referral'];
            
            
            $data['left_count'] = $rows[0]->left_count;
            $data['right_count'] = $rows[0]->right_count;
        }else{
            $data['user'] = '';
            
            $data['left_user'] = '';
            $data['left_user_ref'] = '';
            $data['left_user_this_ref'] = false;
            
            $data['right_user'] = '';
            $data['right_user_this_ref'] = false;
            $data['right_user_ref'] = '';
            
            $data['left_count'] = '';
            $data['right_count'] = '';
        }
        return $data;
    }
    
       public function tree_header($tree){
           $data = array();
        $username = $this->session->username;
        $result = $this->db->query("SELECT * FROM `$tree` WHERE `username`='$username'");
        if($result->num_rows() > 0){
            $rows = $result->result();
            $data['left_count'] = $rows[0]->left_count;
            $data['right_count'] = $rows[0]->right_count;
        }else{
            $data['left_count'] = '';
            $data['right_count'] = '';
        }
        return $data;
    }
    
    public function check_downline_upline($node){
        $ch_node = $this->db->query("SELECT * FROM `new_user_notification` WHERE `new_username`='$node' && `all_upline` LIKE '%,$this->username,%'");
        if($ch_node->num_rows() > 0){
            return 'real';
        }else{
            return 'fake';
        }
    }
    
}