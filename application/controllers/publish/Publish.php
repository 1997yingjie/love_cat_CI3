<?php

class Publish extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model( "Crud" );
    }

    public function newCat(){
        $arrary_params = $this->input->get();
        $array_info = array();
        $array_info['originate_name'] = $arrary_params['originate_name'];
        $array_info['ext'] = $arrary_params['ext'];
        $array_info['city_name'] = $arrary_params['city_name'];
        $array_info['cat_status'] = $arrary_params['cat_status'];
        $array_info['color'] = $arrary_params['color'];
        $array_info['sterilization'] = $arrary_params['sterilization'];
        $array_info['sex'] = $arrary_params['sex'];
        $array_info['age'] = $arrary_params['age'];
        $array_info['kind'] = $arrary_params['kind'];
        $array_info['phone'] = $arrary_params['phone'];
        $array_info['picture'] = $arrary_params['picture'];
        $array_info['status'] = 0;
        $array_info['operate_time'] = date("Y-m-d H:i:s");
        $ret = $this->Crud->insert("invitation",$array_info);
        if($ret['ret']){
            $retMassge['result'] = "1";
            $retMassge['massage'] = "successful";
            $retMassge['csae_id'] = $ret['case_id'];
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
