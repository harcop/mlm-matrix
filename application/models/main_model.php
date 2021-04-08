<?php

class Main_model extends CI_Model{
    public function tester($data){
//        echo $name.' entered';
        $this->db->insert('users',$data);
        
    }
    
    public function fetch_data(){
//        $query = $this->db->get('users');
//        $query = $this->db->query("SELECT * FROM `users` WHERE `username` != ''");
//        $this->db->where('username','');
        $query = $this->db->get('users');
        return $query;
    }
    
    public function fetch_single_data($id){
        $this->db->where('id',$id);
        $query = $this->db->get('users');
        return $query;
    }
    function update_single_data($data,$id){
        $this->db->where('id',$id);
        $this->db->update('users',$data);
    }
    
    function delete_user($id){
        $this->db->where('id',$id);
        $this->db->delete('users');
    }
}
?>