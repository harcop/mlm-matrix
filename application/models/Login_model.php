<?php

class Login_Model extends CI_Model{
    
    public function logging($username,$password){
        $this->db->where('username',strtolower($username));
        $this->db->where('password',do_hash($password));
        $query = $this->db->get('users');
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    

}