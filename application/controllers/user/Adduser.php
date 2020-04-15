<?php

class Adduser extends CI_Controller{
    public function index{
        $this->load->model( "Crud" );
    }

    public function newUser(){
        $this->Crud->insert();
    }
}