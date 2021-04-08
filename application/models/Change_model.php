<?php

class Change_Model extends CI_Model{

    public $username;
    
    public function __construct(){
        parent::__construct();
        $this->username = $this->session->username;
    }
    
    public function change_password($old_pass,$new_pass){
                $new_pass = do_hash($new_pass);
        
                $ch = $this->db->query("SELECT `password` FROM `users` WHERE `username`='$this->username'")->row();
        
                if($ch->password == do_hash($old_pass)){
                    $up = $this->db->query("UPDATE `users` SET `password`='$new_pass' WHERE `username`='$this->username'");
                        
                    return 'success';
                }else{
                    return $msg = '<div class="alert alert-danger">Invalid old password</div>';
                }
        }
    
    public function change_pin($old_pin,$new_pin){
                $new_pin = do_hash($new_pin);
                
                $ch = $this->db->query("SELECT `pin` FROM `users` WHERE `username`='$this->username'")->row();
        
                if($ch->pin == do_hash($old_pin)){
                    $up = $this->db->query("UPDATE `users` SET `pin`='$new_pin' WHERE `username`='$this->username'");
                        
                    return 'success';
                }else{
                    return $msg = '<div class="alert alert-danger">Invalid old pin</div>';
                }
        }
    
    }