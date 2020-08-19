<?php

class RegistrationModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        
        $this->load->database ( );
    }
    
    public function register ( $forename, $surname, $email, $username, $password, $dateOfBirth ) {
        $data = [
            "forename" => $forename,
            "surname" => $surname,
            "email" => $email,
            "username" => $username,
            "password" => $password,
            "dateOfBirth" => $dateOfBirth
        ];
        
        
        $this->db->insert ( "User", $data );
    }
}