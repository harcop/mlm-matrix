<?php

class Transfer_Model extends CI_Model{
    
    public $username;
    
    public function __construct(){
        parent::__construct();
        $this->username = $this->session->username;
    } 
    
    public function load_balance(){
        $mon = $this->db->query("SELECT `earnings` FROM `users` WHERE `username`='$this->username'")->row();
        return $mon;
    }
    
    public function transfer_fund($amount,$recipient,$pin){
        
            $ch = $this->db->query("SELECT `pin`, `earnings`, `bonus` FROM `users` WHERE `username`='$this->username'")->row();

            if($ch->pin == do_hash($pin)){

                if($ch->earnings >= $amount){
                    
                    $bonus = $ch->bonus;
                    $earnings = $ch->earnings;
                    if(($earnings - $amount) <= $bonus){
                        $rems = ($earnings - $amount);
                    }else{
                        $rems = $bonus; //$ch->bonus;
                    }

                    $rec_chk = $this->db->query("SELECT `username` FROM `users` WHERE `username`='$recipient'");

                    if($rec_chk->num_rows() > 0){

                        $fund_taken = $this->db->query("UPDATE `users` SET `earnings` = `earnings`-'$amount', `transfer_out`=`transfer_out`+'$amount',`bonus`='$rems' WHERE `username` = '$this->username'");

                        $fund_given = $this->db->query("UPDATE `users` SET `earnings` = `earnings`+'$amount', `transfer_in`=`transfer_in`+'$amount' WHERE `username` = '$recipient'");

                        $trans_up = $this->db->query("INSERT INTO `fund_transfer` (`username_from`, `username_to`, `amount`) VALUES ('$this->username', '$recipient', '$amount')");


//                        return $msg = '<div class="alert alert-success">Fund successfully transfered</div>';
                        return 'success';

                    }else{
                       return $msg = '<div class="alert alert-danger">Recipient does not exist</div>'; 
                    }
                }else{
                    return $msg = '<div class="alert alert-danger">Insufficient balance</div>';
                }

            }else{
                return $msg = '<div class="alert alert-danger">Invalid Wallet pin</div>';
            }

        }
    }