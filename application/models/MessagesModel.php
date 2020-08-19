<?php


class MessagesModel extends CI_Model {
    
    public function naziviPoruka($id){
        $this->db->select('conversation.*');
        $this->db->from('conversation');
        $this->db->join('participates', 'conversation.idConversation = participates.idConversation');
        $this->db->where('participates.idUser', $id);
        $query=$this->db->get();
        
        return $query->result_array();
        
        
    }
    
    public function svePoruke($id){
        $this->db->select('content, username, idConversation');
        $this->db->from('message');
        $this->db->join('user', 'message.idUser = user.idUser');
        $this->db->where('idConversation', $id);
        $this->db->order_by('idMessage', 'DESC');
        
        
        $query=$this->db->get();
        
        return $query->result_array();
    }
    
    public function posalji($msg, $idc){
        
        $date= new DateTime ( );
        $currentDate= date_format($date, 'Y-m-d');
        
        $data = array(
        'sendDate' => $currentDate,
        'content' => $msg,
        'idUser' => $this->session->userdata('user')['idUser'],
        'idConversation'=> $idc
        );
        
         $this->db->insert ( "message", $data );
    }

}
