<?php

class Achievement_Model extends CI_Model{
    
    public function __construct(){
        $this->username = $this->session->username;
    }
    
    public function load_ach(){
        $ach = '';
        $this->db->where('username',$this->username);
        $query = $this->db->get('achievements');
        if($query->num_rows() > 0){
            foreach($query->result() as $rows){
                $ach .= '<tr>
                        <th scope="row">
                          '.ucfirst($rows->username).'
                        </th>
                        <td>
                          Complete level '.ucfirst($rows->level).'
                        </td>
                        <td>
                          $'.$rows->incentive.'
                        </td>
                        <td>
                          '.$rows->date_in.'
                        </td>
                      </tr>';
            }
        }
        return $ach;
    }    
    
}