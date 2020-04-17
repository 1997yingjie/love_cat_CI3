<?php

class DeleteInfo extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model( "Crud" );
    }

    public function delete(){
        $arrary_params = $this->input->get();
        $array_select = array();
        $array_select['case_id'] = $arrary_params['case_id'];
        $array_update = array();
        $array_update['status'] = 1;
        $ret = $this->Crud->update('invitation',$array_update,$array_select);
        if($ret){
            $retMassge['result'] = "1";
            $retMassge['massage'] = "successful";
            var_dump($retMassge);
            return;
        }else{
            $retMassge['result'] = "2";
            $retMassge['massage'] = "DB error";
            var_dump($retMassge);
            return;
        }
    }
}