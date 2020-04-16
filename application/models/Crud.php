<?php

class Crud extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert($tablename,$array_info){

        $ret = $this->db->insert($tablename,$array_info);
        return $ret;
    }

    public function select($tablename,$array_select){
        
        $ret = $this->db->get_where($tablename,$array_select,10);
        return $ret;
    }

    public function update($tablename,$where,$array_info){
        $this->db->from($tablename);
    }

    public function getDataByRang($tablename,$count,$start)
    {
        $ret = $this->db->get($tablename,$count,$start);
        return $ret;
    }
}