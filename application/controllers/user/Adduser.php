<?php

class Adduser extends CI_Controller{
    public function __construct{
        parent::__construct();
        $this->load->model( "Crud" );
    }

    public function newUser(){
        $this->Crud->insert();
    }
}