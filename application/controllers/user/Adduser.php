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
        $ret = array();
        if( ! $userInDB.empty()){
            //已经存在
            $ret['result'] = "1";
            $ret['massage'] = "username useless";
            var_dump($ret);
        }
        $array_user = array();
        $array_user['user_status'] = 1;
        $array_user['user_name'] = $arrary_params['user_name'];
        $array_user['user_passwd'] = $arrary_params['user_passwd'];
        $ret = $this->Crud->insert("user",$array_user);
        echo $ret;
    }
}