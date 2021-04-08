<?php

class Forget_Model extends CI_Model{
    
    public function user_ver($username){
        $query = $this->db->query("SELECT `username`, `user_email` FROM `users` WHERE `username`='$username'");
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return 'failed';
        }
        
    }
    
    public function key_ver($key){
        $query = $this->db->query("SELECT `username`, `key_pass` FROM `forget_password` WHERE `key_pass`='$key' && `status`=0");
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return 'failed';
        }
    }
    
    public function key_pass_ins($username,$key_pass){
        $query = $this->db->query("SELECT `username` FROM `forget_password` WHERE `username`='$username' && `status`=0");
        if($query->num_rows() > 0){
            $up_key = $this->db->query("UPDATE `forget_password` SET `key_pass` = '$key_pass' WHERE `username` = '$username' && `status`=0;");
        }else{
            $ins_key = $this->db->query("INSERT INTO `forget_password`(`username`,`key_pass`) VALUES('$username','$key_pass')");
        }
        
    }
    
    public function change_pass($username,$pass){
        $query = $this->db->query("UPDATE `users` SET `password` = '$pass' WHERE `users`.`username` = '$username';");
        $query = $this->db->query("UPDATE `forget_password` SET `status` = 1 WHERE `username` = '$username';");
    }
}