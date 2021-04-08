<?php
include('Backend.php');
class NewUser_Model extends CI_Model{
    
    public $username;
    
    public function __construct(){
        parent::__construct();
        $this->username = $this->session->username;
    }
    
    public function reg(){
            $amount = 8;
        
            $new_user = $_POST['new_email'];
            $username = strtolower($_POST['username']);
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $password = do_hash($_POST['password']);
            $f_name = $_POST['f_name'];
            $l_name = $_POST['l_name'];
            $referral = strtolower($_POST['referral']);
//            $pin = do_hash($_POST['pin']);

            $payeer_username = strtolower($_POST['payeer_username']);
            $payeer_pin = do_hash($_POST['payeer_pin']);
        
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $country = $_POST['country'];


        
            $this->back = new Backend($referral);

            if($this->back->checkUser($referral)){
                
              $payeer = $this->db->query("SELECT * FROM `users` WHERE `username`='$payeer_username' && `pin`='$payeer_pin'");
              $payeer_r = $payeer->row_array();
              if($payeer->num_rows() > 0){

                  if($payeer_r['earnings'] >= $amount){

                      if($this->back->checkDouble($username)){
                          $pin = 'pin_enc';
                          $insNewUser = $this->db->query("INSERT INTO `users` (`user_email`,`username`, `f_name`, `l_name`, `password`,`pin`,`referral`,`phone`,`dob`,`gender`) VALUES ('$new_user','$username', '$f_name', '$l_name', '$password','$pin','$referral','$phone','$dob','$gender')");

                        
                          $insNewUser_c = $this->db->query("INSERT INTO `user_contact` (`username`, `address`, `city`, `state`, `country`) VALUES ('$username', '$address', '$city', '$state', '$country')");
                          
                          
                          $this->back->tree1($username,$referral);

                          $this->back->addAdminInfo();

                          $upd_d_downline = $this->db->query("UPDATE `users` SET `d_downline` = `d_downline`+1 WHERE `username` = '$referral'");
                          
                          $payment = $this->db->query("UPDATE `users` SET `earnings` = `earnings`-'$amount',`spent`=`spent`+'$amount' WHERE `username` = '$payeer_username'");
                          
                          

                          return 'success';
                      }
                      else{
                          return $msg = '<div class="alert alert-danger">Username already exist</div>';
                      }
                }
                  else{
                      return $msg = '<div class="alert alert-danger">Insufficient balance</div>'; 
                    }
            }else{
              return $msg = '<div class="alert alert-danger">Invalid Wallet account or Password</div>';
            }
        }else{
            return $msg = '<div class="alert alert-danger">Invalid Referral, Referral not exist</div>';
        }
     }
    
    
    public function kin_reg(){
            
            $kin_name = $_POST['kin_name'];
            $kin_rel = $_POST['kin_rel'];
            $kin_dob = $_POST['kin_dob'];
            $kin_phone = $_POST['kin_phone'];
            $kin_address = $_POST['kin_address'];
        
          $insNewUser_kin = $this->db->query("INSERT INTO `user_kin` (`username`, `next_of_kin`, `relationship`, `kin_dob`, `kin_phone`, `kin_address`) VALUES ('$this->username', '$kin_name', '$kin_rel', '$kin_dob', '$kin_phone', '$kin_address')");
        
            if($insNewUser_kin){
                return 'success';
            }else{
                return 'failed';
            }

    }
    
    public function bank_reg(){
            $bank_name = $_POST['bank_name'];
            $acc_no = $_POST['acc_no'];
            $acc_name = $_POST['acc_name'];
        
                         
          $insNewUser_bank = $this->db->query("INSERT INTO `bank_detail` (`username`, `bank_name`, `account_no`, `account_name`) VALUES ('$this->username', '$bank_name', '$acc_no', '$acc_name')");
        
            if($insNewUser_bank){
                return 'success';
            }else{
                return 'failed';
            }
        
    }
    public function wallet_reg(){
            $pin = do_hash($_POST['pin']);
                         
          $insPin = $this->db->query("Update `users` set `pin` = '$pin' WHERE `username`='$this->username'");
        
            if($insPin){
                return 'success';
            }else{
                return 'failed';
            }
        
    }
   
   }
