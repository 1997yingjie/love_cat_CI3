<?php

class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model( "Crud" );
    }

    public function rightPasswd(){
        $arrary_params = $this->input->get();
        $array_select = array();
        $array_select['user_name'] = $arrary_params['user_name'];
        $userInDB = $this->Crud->select('user',$array_select);
        $retMassge = array();
        var_dump($userInDB);

        if( empty($userInDB) ){
            $retMassge['result'] = "0";
            $retMassge['massage'] = "ID errror";
            var_dump($retMassge);
            return;
        }
        if($arrary_params['user_passwd'] == $userInDB[0]->user_passwd && $userInDB[0]->user_status == 1){
            $retMassge['result'] = "1";
            $retMassge['massage'] = "successful";
            var_dump($retMassge);
            return;
        }else{
            $retMassge['result'] = "2";
            $retMassge['massage'] = "passwd error";
            var_dump($retMassge);
            return;
        }
    }
}
