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
        
        $this->db->select('*');
        $this->db->from($tablename);
        foreach($array_select as $key => $value){
            $this->db->where($key,$value);
        }
        $q = $this->db->get();

        return $q->result();
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