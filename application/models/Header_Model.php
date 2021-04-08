<?php

class Header_Model extends CI_Model{
    
    
    public function load(){
//        $m_username = $this->session->username;
        $query = $this->db->query("SELECT * FROM `users` WHERE `username`='toluwap'")->result();
//        $rows = $query->result();
        return $query[0];
    }
}
