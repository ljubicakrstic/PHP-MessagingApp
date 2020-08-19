<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    
        $this->load->library ( 'form_validation' );
        $this->load->database ( );
    }

    public function index ( ) {
        $data["middle"] = "middle/registration";
        $this->load->view ( 'basicTemplate', $data );
    }
    
    public function register ( ) {
        $this->form_validation->set_rules ( "forename", "Forename", "trim|required|min_length[5]|max_length[10]");
        $this->form_validation->set_rules ( "surname", "Surname", "trim|required|min_length[5]|max_length[10]");
        $this->form_validation->set_rules ( "email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules ( "username", "Username", "trim|required|min_length[5]|max_length[10]|is_unique[User.username]");
        $this->form_validation->set_rules ( "password", "Password", "trim|required|min_length[5]|max_length[10]");
        $this->form_validation->set_rules ( "passwordConfirmation", "Password Confirmation", "trim|required|matches[password]");
        $this->form_validation->set_rules ( "dateOfBirth", "Date of birth", "trim|required|callback_ageValidation[18]");
        
        if ( $this->form_validation->run ( ) == FALSE ) {
            $this->index ( );
        } else {
            $this->load->model ( "RegistrationModel" );
            $this->RegistrationModel->register ( 
                $this->input->post ( "forename" ),
                $this->input->post ( "surname" ),
                $this->input->post ( "email" ), 
                $this->input->post ( "username" ),
                $this->input->post ( "password" ), 
                $this->input->post ( "dateOfBirth" )
            );
            redirect ( "/Login" );
        }
    }
    
    public function ageValidation ( $string, $minimumAge ) {
        $dateOfBirth = new DateTime ( $string );
        $now = new DateTime ( );
        
        $this->form_validation->set_message ( "ageValidation", "User must at least " . $minimumAge . " years old" );
        
        return $now->diff ( $dateOfBirth )->y > (int) $minimumAge ? true : false;
    }
}
