<?php


class Home extends CI_Controller{
    
    public function index(){
        $id= $this->session->userdata('user')['idUser'];
        
        $this->load->model('UserModel');
        $userData= $this->UserModel->getdata($id);
        
        
        $data['middle']="middle/homepage";
        $data['middleData']=['userData'=>$userData];
        $this->load->view("basicTemplate", $data);
    }
    
    public function messages(){
        
        $id= $this->session->userdata('user')['idUser'];
        
        $this->load->model('MessagesModel');
        $nazivi= $this->MessagesModel->naziviPoruka($id);
        
        //var_dump($nazivi);
        $data['tip']='conv';
        $data["middle"]="middle/messages"; 
        $data["middleData"] = ["poruke" => $nazivi];
        $this->load->view("basicTemplate", $data);
    }
    
    public function allmessages(){
        
        $id= $this->input->get('id');
        
        $this->load->model('MessagesModel');
        $tekstovi= $this->MessagesModel->svePoruke($id);
        
        //    echo $tekst['content'];
       // }
        // $this->load->view ( "messages", [ "messages" => $tekstovi ] );
        
        
        $this->load->library ( 'parser' );

        $this->parser->parse ( "messages", ["messages" => $tekstovi]);
    }    
    public function sendmessage(){
        
        $msg=$this->input->get('msg');
        $idc=$this->input->get('idc');
        $this->load->model('MessagesModel');
        $this->MessagesModel->posalji($msg, $idc);
        //$this->allmessages();
        $tekstovi=$this->MessagesModel->svePoruke($idc);
        
        $this->load->library ( 'parser' );
        $this->parser->parse ( "messages", ["messages" => $tekstovi]);  
        
    }
    
    public function users(){
        $pocetni_user=0;
        //pocetni user je 0 ako ne postoji treci segment, ako postoji, onda je pocetni user taj segment
        if($this->uri->segment(3)){
            $pocetni_user=$this->uri->segment(3);
        }
       // $limit=10; // ovo ne valja da bude ovde, ide u config, constants fajl
        
        // ovo je dohvatanje treceg segmenta url niza https://localhost/MessagingApp/index.php/user/users/10, e pa ovu desetku
        //treci segment je treci segment od indexa
        
        $this->load->model("UserModel");
        $this->load->library('pagination');
        $config= $this->config->item('pagination');

        $config['base_url'] = site_url('Home/users');
        $config['total_rows'] = $this->UserModel->BrojUsera();
        
        if($this->input->post('br')){
            $this->session->set_userdata('broj', $this->input->post('br'));
            //if($this->session->userdata('broj')!== null){
            //$config['per_page'] = (int)$this->session->userdata('broj');
//            var_dump($this->session);
        }
        
        if($this->session->userdata('broj')!== null){
            $config['per_page'] = (int)$this->session->userdata('broj');
        }
        else{
            $config['per_page'] = 10;
//            var_dump($this->session);
            //var_dump($config['per_page']);
        }
        
        
        //$config['per_page'] = LIMIT_PO_STRANICI;
        
        $this->pagination->initialize($config);

        
        $users= $this->UserModel->getusers($pocetni_user, $config['per_page']);
        $data["middle"]="middle/allUsers"; 
        $data["middleData"] = ["users" => $users];
        $this->load->view("basicTemplate", $data);
    }
}
