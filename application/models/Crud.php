<?php

class Crud extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert($tablename,$array_info){

        $ret = $this->db->insert($tablename,$array_info);
        $case_id = $this->db->insert_id();
        $result = array();
        $result['ret'] = $ret;
        $result['case_id'] = $case_id;
        return $result;
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
        $bool = $this->db->update($tablename,$array_info,$where);
        return $bool;
    }

    public function getDataByRang($tablename,$count,$start)
    {
        $this->db->where('status',0);
        $ret = $this->db->get($tablename,$count,$start);
        return $ret->result();
    }

    public function getCount($tablename)
    {
        $ret = $this->db->count_all($tablename);
        return $ret;
    }
    
}