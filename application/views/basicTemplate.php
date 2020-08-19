<?php
    if ( $this->session->user == null ) {
        $this->load->view ( "header/guestHeader" );    
    } else{
        $this->load->view("header/homeHeader", $tip ?? []);
    }
    $this->load->view ( $middle, $middleData ?? [] );
    $this->load->view ( "footer/basicFooter" );
