<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp extends CI_Controller{
    public $username;
    public $data = [];
    
    public function __construct(){
        parent::__construct();
        $this->username = $this->session->username;
        $this->load->model('newuser_model');
        
//        if(!isset($this->session->username)){
//            redirect('logout');
//        }
    }
    
    public function index(){
        $this->load->view('signup');
    }
    
    public function reg(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('f_name','FirstName','required|trim|alpha');
        $this->form_validation->set_rules('l_name','Last Name','required|trim|alpha');
        $this->form_validation->set_rules('new_email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('phone','Phone Number','required|trim');
        $this->form_validation->set_rules('dob','Date of Birth','required|trim');
        $this->form_validation->set_rules('gender','Gender','required|trim|alpha');
        $this->form_validation->set_rules('password','Password','required|trim|min_length[6]',
                                          array(
                                                'min_length'=>'%s must be 6 greater than 6 character'
                                          ));
        $this->form_validation->set_rules('password_a','Password','required|trim|min_length[6]|matches[password]');
        
        $this->form_validation->set_rules('address','Address','required|trim|min_length[6]',
                                          array(
                                                'min_length'=>'%s must be 6 greater than 6 character'
                                          ));
        $this->form_validation->set_rules('city','City','required|trim');
        $this->form_validation->set_rules('state','State','required|trim');
        $this->form_validation->set_rules('country','Country','required|trim');
        
        
        
        $this->form_validation->set_rules('username','Username','required|trim|is_unique[users.username]|min_length[6]',
                                          array(
                                                'min_length'=>'%s must be 6 greater than 6 character'
                                          ));
//        $this->form_validation->set_rules('pin','Pin','required|trim|min_length[6]',
//                                          array(
//                                                'min_length'=>'%s must be 6 greater than 6 digit'
//                                          ));
//        $this->form_validation->set_rules('pin_c','Pin','required|trim|matches[pin]');
        
        $this->form_validation->set_rules('referral','Sponsor','required|trim');
        
        $this->form_validation->set_rules('payeer_username','Username','required|trim');
        $this->form_validation->set_rules('payeer_pin','Pin','required|trim');
        
        
        
        if($this->form_validation->run()){
            $password = $_POST['password'];
//            $pin = $_POST['pin'];
            $f_name = $_POST['f_name'];
            $l_name = $_POST['l_name'];
            $username = $_POST['username'];
            $email = $_POST['new_email'];
            $referral = $_POST['referral'];
            $msg = $this->newuser_model->reg();
            if($msg == 'success'){
                $msg = $this->data['msg'] = '
                <!DOCTYPE html>
                <html>
                    <body>
                            <div class="alert alert-success">
                          
                          <div>New User Successfully Registered</div>
                          <hr class="my-4">
                          <div>
                            <p><h1>New Member Information</h1></p>
                            <p><h1>Welcome to testapp, a wealth creation platform</h1></p>
                            <div>
                                <p><span>Name: '.$f_name .' '.$l_name.'</span></p>
                                <p><span>Username: '.$username.'</span></p>
                                <p><span>Password: ******</span></p>
                                <p><span>Referral: '.$referral.'</span></p>
                            </div>
                            <div>
                                Please check your email for more information
                            </div>
                            </div>
                                
                          
                          </div>
                          </body>
                          </html>
                          ';
                $email_msg = $this->email_msg($username,$f_name,$l_name,$referral,$password);
                $this->sendMail($email,$email_msg);
            }else{
                $this->data['msg'] = $msg;
            }
            $this->session->set_flashdata('msg',$msg);
            redirect('signup');
//               $this->load->view('signup');
            
        }else{
            $this->load->view('signup');
        }
        
    }
    
    
    
    
    
    function sendMail($email,$msg){
        // $this->load->library('email');
//         $config['protocol'] = "mail";
            $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'mail.testapp.com',
          'smtp_port' => '587',
          'smtp_user' => 'support@testapp.com', // change it to yours
          'smtp_pass' => 'Supporttestapp123@', // change it to yours
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
            );


                $message = 'Welcome to testapp, a wealth creation platform';
                $this->load->library('email', $config);
              $this->email->set_newline("\r\n");
              $this->email->from('support@testapp.com'); // change it to yours
              $this->email->to("$email");// change it to yours
              $this->email->subject('testapp Welcome');
              $this->email->message($msg);
              if($this->email->send())
             {
              echo 'Email sent.';
             }
             else
            {
             show_error($this->email->print_debugger());
            }

        }
    
    function email_msg($username,$f_name,$l_name,$referral,$password){
        return '
                        <!DOCTYPE html>
                                <html lang="">

                                <head>
                                    <meta charset="UTF-8">
                                    <style>
                                        body{
                                            background:#fdfdfd;
                                            color:#fff;
                                        }
                                        .main{
                                            padding:30px;
                                            display:grid;
                                            grid-template-columns:auto;
                                            justify-items:center;
                                            box-shadow:0px 2px 5px 0px #8A48EC;
                                            background:#00DF9B;
                                            color:#fff;
                                        }
                                        h1{
                                            color:#fff;
                                        }
                                        p{
                                            coor:#fff;
                                        }
                                    </style>
                                </head>

                                <body>

                                    <div class="main">
                                        <div class="msg">

                                            <div class="head_title">New User Successfully Registered</div>
                                            <hr class="my-4">
                                            <div>
                                                <div>
                                                    <h1>New Member Information</h1>
                                                </div>
                                                <div>
                                                    <h1>Welcome to testapp, a wealth creation platform</h1>
                                                </div>
                                                <div>
                                                    <p><span>Name: '.$f_name .' '.$l_name.'</span></p>
                                                    <p><span>Username: '.$username.'</span></p>
                                                    <p><span>Password: '.$password.'</span></p>
                                                    <p><span>Referral: '.$referral.'</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </body>

                                </html>
                                ';
    }
    
    
}
