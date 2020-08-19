<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index ( ) {
        $data["middle"] = "middle/login";
        $this->load->view ( 'basicTemplate', $data );
    }
    
    public function logovanje(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            //var_dump($password);
           // var_dump($username);

            $this->load->model ('LogInModel');

            $users = $this->LogInModel->login($username, $password);
               
            if ( count($users) == 0) {
                $data = [];
                $data['middleData'] = ["err" => "Nekorektni podaci"];
                
                $data['middle']="middle/login";
                $this->load->view ( 'basicTemplate', $data );
            } else {
                
                $user = $users[0];
                $this->session->set_userdata('user', $user);
                redirect("Home");
        }
      }
      
      public function logout(){
          $this->session->sess_destroy();
          redirect("Login");
      }
    }

