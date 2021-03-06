<?php

class Adduser extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model( "Crud" );
    }

    public function newUser(){//新增用户
        $arrary_params = $this->input->get();
        $array_select = array();
        $array_select['user_name'] = $arrary_params['user_name'];
        $userInDB = $this->Crud->select('user',$array_select);
        $retMassge = array();
        if( ! empty($userInDB) ){
            //已经存在
            $retMassge['result'] = "0";
            $retMassge['massage'] = "username useless";
            var_dump($retMassge);
            return;
        }
        $array_user = array();
        $array_user['user_status'] = 1;
        $array_user['user_name'] = $arrary_params['user_name'];
        $array_user['user_passwd'] = $arrary_params['user_passwd'];
        $ret = $this->Crud->insert("user",$array_user);
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