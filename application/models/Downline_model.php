<?php

class Downline_Model extends CI_Model{
    
    public $username;
    public function __construct(){
        parent::__construct();
        $this->username = $this->session->username;
    }
    
    public function load_direct(){
        $downline = '';
        $query = $this->db->query("SELECT `new_username`,`referral`,`date_joined` FROM `new_user_notification` WHERE `all_upline` LIKE '%,$this->username,%' AND `referral`='$this->username'");
        if($query->num_rows() > 0){
            foreach($query->result() as $rows){
                $downline .= '<tr>
                        <th scope="row">
                          '.ucfirst($rows->new_username).'
                        </th>
                        <td>
                          '.ucfirst($rows->referral).'
                        </td>
                        <td>
                          '.$rows->date_joined.'
                        </td>
                      </tr>';
            }
        }
        return $downline;
    }
    public function load_in_direct(){
        $downline = '';
        $query = $this->db->query("SELECT `new_username`,`referral`,`date_joined` FROM `new_user_notification` WHERE `all_upline` LIKE '%,$this->username,%' AND `referral`!='$this->username'");
        if($query->num_rows() > 0){
            foreach($query->result() as $rows){
                $downline .= '<tr>
                        <th scope="row">
                          '.ucfirst($rows->new_username).'
                        </th>
                        <td>
                          '.ucfirst($rows->referral).'
                        </td>
                        <td>
                          '.$rows->date_joined.'
                        </td>
                      </tr>';
            }
        }
        return $downline;
    }
}