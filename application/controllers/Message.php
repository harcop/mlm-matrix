<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
    
    public function index(){
        $this->load->view('messages');
        if(!isset($this->session->username)){
            redirect('logout');
        }
    }
    
    
    function sendMail()
{
        // $this->load->library('email');
    $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'mail.healthbyfidelis.com.ng',
  'smtp_port' => '587',
  'smtp_user' => 'hello@healthbyfidelis.com.ng', // change it to yours
  'smtp_pass' => 'HelloTest123@', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
    );


        $message = 'Welcome to work....winnner';
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('hello@healthbyfidelis.com.ng'); // change it to yours
      $this->email->to('bamideletoluwap@gmail.com');// change it to yours
      $this->email->subject('Resume from JobsBuddy for your Job posting');
      $this->email->message($message);
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