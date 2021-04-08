<?php

class Profile_Model extends CI_Model{
    
    
    public function load_profile($username){
        $this->db->where('username', $username);
        $query1 = $this->db->get('users')->row_array();
        
        
        $this->db->where('username', $username);
        $query2 = $this->db->get('user_contact')->row_array();
        
        $query = array_merge($query1,$query2);
        
//        Check if user has filled bank detail
        $this->db->where('username', $username);
        $query3 = $this->db->get('bank_detail');
        if($query3->num_rows() > 0){
            $query3 = $query3->row_array();
            $query = array_merge($query,$query3);
        }
    
        
//        check if user has filled kin detail
        $this->db->where('username', $username);
        $query4 = $this->db->get('user_kin');
        if($query4->num_rows() > 0){
            $query4 = $query4->row_array();
            $query = array_merge($query,$query4);
        }
        
//        $query = array_merge($query1,$query2,$query3,$query4);
        return $query;
    }
}