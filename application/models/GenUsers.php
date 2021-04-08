<?php

include('Backtest.php');
class GenUsers extends CI_Model{
    

    
    public function __construct(){
        parent::__construct();
        $this->username = 'admin';
    }
    
    public function index(){
        for($i=0;$i<20;$i++){
            
            $msg = $this->reg("toluwap$i");
            echo $i." ".$msg."<br>";
        }
    }

    public function reg($new_username){
            $amount = 8;
        

        
            $new_user = 'bomber@gmail.com';
            $username = strtolower($new_username);
            $phone = '09023023232';
            $dob = '2003-09-10';
            $gender = 'Male';
            $password = do_hash('123456');
            $f_name = 'Bomber';
            $l_name = 'David';
            $referral = strtolower('admin');

            $payeer_username = strtolower('admin');
            $payeer_pin = do_hash('123456');
        
            $address = 'London';
            $city = 'Tokyo';
            $state = 'Newyork';
            $country = 'Nigeria';


        
            $this->back = new BackTest($referral);

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
    
   
   }
