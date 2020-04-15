<?php

class Crud extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function insert($tablename,$array_info){

        $ret = $this->db->insert($tablename,$array_info);
        echo "insert";
        return $ret;
    }
}