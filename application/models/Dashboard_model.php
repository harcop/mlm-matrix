<?php

class Dashboard_Model extends CI_Model{
    
    public $username;
    
    public function __construct(){
        parent::__construct();
        $this->username = $this->session->username;
        
        $this->check_sidebar();
    }
    
    public function load_notification(){
        $username = $this->username;
        $query = $this->db->query("SELECT * FROM `new_user_notification` WHERE `all_upline` LIKE '%,$username,%' ORDER BY `date_joined` DESC LIMIT 5");
        
        $new_note = '';
        
        if($query->num_rows() > 0){
            foreach($query->result() as $rows){
                $new_note .= '<tr>
                    <th scope="row">
                      '.$rows->new_username.'
                    </th>
                    <td>
                      '.$rows->referral.'
                    </td>
                    <td>
                      '.$rows->date_joined.'
                    </td>
                  </tr>';
            }
        }
        
        return $new_note;
    }
    
    
    public function load_header(){
        $username = $this->username;
//        $m_username = $this->session->username;
        $query = $this->db->query("SELECT * FROM `users` WHERE `username`='$username'")->result();
//        $rows = $query->result();
        return $query[0];
    }
    
    public function load_side(){
        $username = $this->username;
        $query = $this->db->query("SELECT `level` FROM `users` WHERE `username`='$username'")->row_array();
        $level = $query['level'];
//        $level = 1;
        $tree = 'tree'.$level;
        $tree_side = $this->db->query("SELECT * FROM `$tree` WHERE `username`='$username'")->row();
        return $tree_side;
    }
    
    public function check_sidebar(){
        $username = $this->username;
        
        $query_bank = $this->db->query("SELECT `username` FROM `bank_detail` WHERE `username`='$username'");
        if($query_bank->num_rows() > 0){
            $this->session->bank_detail = 'bnk';
        }
        
        $query_kin = $this->db->query("SELECT `username` FROM `user_kin` WHERE `username`='$username'");
        if($query_kin->num_rows() > 0){
            $this->session->user_kin = 'kinner';
        }
        
        $query_pin = $this->db->query("SELECT `pin` FROM `users` WHERE `username`='$username'")->row();
        if($query_pin->pin == 'pin_enc'){
            $this->session->user_pin = 'pinner';
        }else{
            $this->session->user_pin = 'pin';
        }
    }
}

