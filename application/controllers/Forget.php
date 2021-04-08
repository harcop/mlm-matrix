<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forget extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('forget_model');
    }
    
    public function index(){
        $this->load->view('forget');
    }
    
    public function send(){
        $this->form_validation->set_rules('username','Username','required');
        if($this->form_validation->run()){
            $username = $this->input->post('username');
            $resp = $this->forget_model->user_ver($username);
            if($resp != 'failed'){
                $rand = rand();
                $key_pass = md5($username.$rand);
                
//                key_pass is inserted into forget_password table
                $this->forget_model->key_pass_ins($username,$key_pass);
                
//                email for retriever is sent
                $email = $resp['user_email'];
                $url = base_url('forget/password/').$key_pass;
                $email_msg = '<!DOCTYPE html>
                            <html lang="">
                            <head>
                                <meta charset="UTF-8">
                                <title>Untitled Document</title>
                            	<meta name="Author" content=""/>
                            	<link rel="stylesheet" type="text/css" href="style.css">
                            </head>
                            <body>
                            Please follow this link to retrieve your password  <a href="'.$url.'">'.base_url('forget/password').'</a>
                            </body>
                            </html>';
                
                // if(
                    $this->sendMail($email, $email_msg);
                    // ){
                
                    $msg = '<div class="alert alert-success">Please check your email for password retriever instruction</div>';
                    
                    $this->session->set_flashdata('msg',$msg);
                    redirect('forget');
                    
                // }
                // else{
                //     redirect('login');
                // }
            }else if($resp == 'failed'){
                $msg = '<div class="alert alert-danger">User doesn\'t exist</div>';
                $this->session->set_flashdata('msg',$msg);
                $this->load->view('forget');
            }
        }else{
            $this->load->view('forget');
        }
    }
    
    public function password(){
        if($this->uri->segment(3)){
            $key = $this->uri->segment(3);
            $resp = $this->forget_model->key_ver($key); 
            
            if($resp != 'failed'){
                $username = $resp['username'];
                $data['username'] = $username;
                $this->load->view('pass_retriever',$data);
            }else if($resp == 'failed'){
                redirect('login');
            }
        }else{
            redirect('login');
        }
    }
    
    public function change(){
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('new_pass','Password','required|min_length[6]');
        $this->form_validation->set_rules('pass_c','Password','required|min_length[6]|matches[new_pass]');
        $username = $this->input->post('username');
        $data['username'] = $username;
        if($this->form_validation->run()){
            $pass = do_hash($this->input->post('new_pass'));
            $this->forget_model->change_pass($username,$pass);
            
            $msg = '<div class="alert alert-success">Password Change successfully <a href="'.base_url('login').'"><button class="btn btn-primary">click here</button></a> to login</div>';
            $this->session->set_flashdata('msg',$msg);
//            redirect('login');
            $this->load->view('pass_retriever',$data);
        }else{
            
            if($username != ''){
                $this->load->view('pass_retriever',$data);
            }else{
                redirect('login');
            }
            
        }
    }
    
    function sendMail($email,$msg){
        // $this->load->library('email');
            $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'mail.testapp.com',
          'smtp_port' => '26',
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
              $this->email->subject('testapp Password Retrieve');
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
}
