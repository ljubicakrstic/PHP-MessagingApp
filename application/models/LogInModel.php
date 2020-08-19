<?php


class LogInModel extends CI_Model{
    
    public function login($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->from('user');
        $query=$this->db->get();
        return $query->result_array ();
    }
    
}
