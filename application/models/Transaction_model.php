<?php

class Transaction_Model extends CI_Model{
    
    public $username;
    
    public function __construct(){
        parent::__construct();
        $this->username = $this->session->username;
    }
    
    public function load_transaction(){
           $bonus = '';
        $sel = $this->db->query("SELECT * FROM `transaction` WHERE `username_to`='$this->username' ORDER BY `id` DESC LIMIT 5");

        if($sel->num_rows() > 0){
            foreach($sel->result() as $rows){
                $bonus .= '<tr>
                        <th scope="row">
                          '.$rows->username_to.'
                        </th>
                        <td>
                          $'.$rows->amount.'
                        </td>
                        <td>
                          '.$rows->status.'
                        </td>
                        <td>
                          '.$rows->username_from.'
                        </td>
                        <td>
                          '.$rows->date.'
                        </td>
                      </tr>';
            }
        } 
        
        return $bonus;
        
    }
    
    public function load_fund_transaction(){
        $fund_received = '';
        
                $sel_fund = $this->db->query("SELECT * FROM `fund_transfer` WHERE `username_to`='$this->username' || `username_from`='$this->username' ORDER BY `id` DESC LIMIT 5");

        if($sel_fund->num_rows() > 0){
            foreach($sel_fund->result() as $rows){
                $fund_received .= '<tr>
                            <th scope="row">
                              '.$rows->username_from.'
                            </th>
                            <td>
                              $'.$rows->amount.'
                            </td>
                            <td>
                              '.$rows->username_to.'
                            </td>
                            <td>
                              '.$rows->date.'
                            </td>
                          </tr>';
            }
        }
        
        return $fund_received;
    }
    
    public function load_with_transaction(){
        $fund_withdraw = '';
                $sel_withdraw = $this->db->query("SELECT * FROM `withdraw_fund` WHERE `username`='$this->username' ORDER BY `id` DESC LIMIT 5");

        if($sel_withdraw->num_rows() > 0){
            foreach($sel_withdraw->result() as $rows){
                $fund_withdraw .= '<tr>
                            <th scope="row">
                              '.$rows->username.'
                            </th>
                            <td>
                              $'.$rows->amount.'
                            </td>
                            <td>
                              '.$rows->status.'
                            </td>
                            <td>
                              '.$rows->date.'
                            </td>
                          </tr>';
            }
        }
        
        return $fund_withdraw;
    }
}