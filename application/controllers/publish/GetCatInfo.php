<?php

class GetCatinfo extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model( "Crud" );
    }

    public function getByRang(){
        $arrary_params = $this->input->get();
        $ret = getDataByRang('invitation',$arrary_params['count'],$arrary_params['start']);
        var_dump($ret);
        if(FALSE){
            $retMassge['result'] = "1";
            $retMassge['massage'] = "successful";
            $retMassge['array_info'] = ;
            var_dump($retMassge);
            return;
        }else{
            $retMassge['result'] = "2";
            $retMassge['massage'] = "DB error";
            var_dump($retMassge);
            return;
        }
    }

    public function getByUser(){
        $arrary_params = $this->input->get();
        
    }
}