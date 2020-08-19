<?php


class UserModel extends CI_Model{
    
    public function getdata($id){
        $this->db->select('photo, username, email, dateOfBirth');
        $this->db->from('user');
        $this->db->where('idUser', $id);
        $query=$this->db->get();
        return $query->result_array();
                
    }
    
    public function editdata($id, $username, $email, $date){
        
        $data = array(
        'username' => $username,
        'email' => $email,
        'dateOfBirth' => $date
        );

        $this->db->where('idUser', $id);
        $this->db->update('user', $data);
    }
    
    public function getusers($pocetni_user, $limit){
        
        //dodajemo limit i ofset za dohvatanje iz tabele, query builder
        
        return $this->db->get('user', $limit, $pocetni_user)->result_array();
 
       
    }
    
    public function BrojUsera(){
         return $this->db->count_all_results('user');
    }
    
    public function izmeniSliku($username, $slika){

        $this->db->set('photo', $slika);
        $this->db->where('username', $username);
        $this->db->update('user');
    }                  


}
