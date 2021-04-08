<?php

class Withdraw_Model extends CI_Model{
    
    public $username;
    
    public function __construct(){
        parent::__construct();
        $this->username = $this->session->username;
    }
    
    public function load_balance(){
        $mon = $this->db->query("SELECT `bonus` FROM `users` WHERE `username`='$this->username'")->row();
        
        return $mon;
    }
    
    public function withdraw($amount){
        
                
                $ch = $this->db->query("SELECT `bonus` FROM `users` WHERE `username`='$this->username'")->row();
            
                $ch = $this->db->query("SELECT `bonus` FROM `users` WHERE `username`='$this->username'")->row();


                if(($ch->bonus) >= $amount){

//                    $amount_plus = $amount * 1.05;
                    
                    $fund_taken = $this->db->query("UPDATE `users` SET `bonus` = `bonus`-'$amount', `earnings`=`earnings`-'$amount',`withdraw`=`withdraw`+'$amount' WHERE `username` = '$this->username'");

                    $wt_in = $this->db->query("INSERT INTO `withdraw_fund` (`username`, `amount`, `status`) VALUES ('$this->username', '$amount', 'pending')");

                    
                    return 'success';
                }else{
                    return $msg = '<div class="alert alert-danger">Insufficient balance</div>';
                }
            }
        }