


<?php

class User extends CI_Controller{
    
    public function editdata(){
        
        $this->load->library ( 'form_validation' );
 
        $this->form_validation->set_rules ( "email", "Email", "required|valid_email");
        $this->form_validation->set_rules ( "date", "Date of birth", "required|callback_ageValidation[18]");
        if($this->input->post('user')== $this->input->post('actual_username')){
            $this->form_validation->set_rules ( "user", "Username", "required|min_length[5]|max_length[10]");
        }else{
        $this->form_validation->set_rules ( "user", "Username", "required|min_length[5]|max_length[10]|is_unique[User.username]");
        }
        
        if ( $this->form_validation->run () == FALSE ) {
            //$this->load->view("Middle/homepage");
            redirect("Home");
        }else{
        
        $id= $this->session->userdata('user')['idUser'];
        $username= $this->input->post('user');
        $email= $this->input->post('email');
        $date= $this->input->post('date');

        
        $this->load->model("UserModel");
        $this->UserModel->editdata($id, $username, $email, $date);
        redirect("Home");
        }
    }
    
    public function ageValidation ( $string, $minimumAge ) {
        $dateOfBirth = new DateTime ( $string );
        $now = new DateTime ( );
        
        $this->form_validation->set_message ( "ageValidation", "User must at least " . $minimumAge . " years old" );
        
        return $now->diff ( $dateOfBirth )->y > (int) $minimumAge ? true : false;
    }
    
    public function preuzmi(){
        $this->load->helper('download');
        force_download('./photos/ljuba.jpg', NULL);
    }
    
    public function dodaj(){
        $this->load->model("UserModel");
        $id= $this->session->userdata('user')['idUser'];
        $config= $this->config->item('upload');
        if(!is_dir('photos/'.$id)){
                mkdir('./photos/'.$id, 0777); 
             $config['upload_path']= './photos/'.$id;   
            }else if(is_dir('photos/'.$id)){
                $config['upload_path']= './photos/'.$id; 
            }
        $this->load->library('upload', $config);
         if (!$this->upload->do_upload('slika')) {
              $this->session->set_userdata('error', $this->upload->display_errors());
                             
                } else {
                    $this->UserModel->izmeniSliku($this->session->userdata('user')['username'], $this->upload->data('file_name'));
                    
                }
                redirect("Home");
        
    }
    
    public function novaSlika(){
        $id= $this->session->userdata('user')['idUser'];
        $config= $this->config->item('upload');
        if(!is_dir('photos/'.$id)){
                mkdir('./photos/'.$id, 0777); 
             $config['upload_path']= './photos/'.$id;   
            }else if(is_dir('photos/'.$id)){
                $config['upload_path']= './photos/'.$id; 
            }
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('nova')){
            $this->session->set_userdata('errorNew', $this->upload->display_errors());
        }else{
            redirect ("Home");
            //var_dump($this->session);
        }
    }
    
    
    public function obrisi($path){
        $id= $this->session->userdata('user')['idUser'];  
        $dir= './photos/'.$id;
        unlink($dir."/".$path);
        
        redirect("Home");
    }
    
    
}




