<?php

class GetCatInfo extends CI_Controller{
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
            $retMassge['array_info'] = $ret;
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
        $array_select = array();
        $array_select['originate_name'] = $arrary_params['user_name'];
        $mineCatInDB = $this->Crud->select('invitation',$array_select);
        $RetMineInfo = array();
        foreach($mineCatInDB as $oneinfo){
            $retOneInfo = array();
            $retOneInfo['ext'] = $oneinfo->ext;
            $retOneInfo['city_name'] = $oneinfo->city_name;
            $retOneInfo['cat_status'] = $oneinfo->cat_status;
            $retOneInfo['color'] = $oneinfo->color;
            $retOneInfo['sterilization'] = $oneinfo->sterilization;
            $retOneInfo['kind'] = $oneinfo->kind;
            $retOneInfo['sex'] = $oneinfo->sex;
            $retOneInfo['operate_time'] = $oneinfo->operate_time;
            $RetMineInfo[] = $retOneInfo;
        }
        $retMassge['result'] = "1";
        $retMassge['massage'] = "successful";
        $retMassge['date'] = $RetMineInfo;
        var_dump($retMassge);
        return;
    }
}