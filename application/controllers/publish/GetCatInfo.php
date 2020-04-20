<?php

class GetCatInfo extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model( "Crud" );
    }

    public function getByNextRang(){
        $arrary_params = $this->input->get();
        $lastNow = $arrary_params['lastNow'];
        if($lastNow<2){
            //特殊情况拦截
            $retMassge['result'] = "0";
            $retMassge['massage'] = "request error";
            var_dump($retMassge);
            return;
        }

        if($lastNow<6){
            $ret = $this->Crud->getDataByRang('invitation',$lastNow-1,0);
        }else{
            $ret = $this->Crud->getDataByRang('invitation',5,$lastNow-5);
        }
        
        if(empty( $ret )){
            $retMassge['result'] = "2";
            $retMassge['massage'] = "DB error";
            var_dump($retMassge);
            return;
        }

        $catInfo = array();
        foreach($ret as $oncatinfo){
            $tmp =array();
            if($oncatinfo->status == 1){
                continue;
            }
            $tmp['case_id'] = $oncatinfo->case_id;
            $tmp['originate_name'] = $oncatinfo->originate_name;
            $tmp['ext'] = $oncatinfo->ext;
            $tmp['city_name'] = $oncatinfo->city_name;
            $tmp['cat_status'] = $oncatinfo->cat_status;
            $tmp['color'] = $oncatinfo->color;
            $tmp['sterilization'] = $oncatinfo->sterilization;
            $tmp['sex'] = $oncatinfo->sex;
            $tmp['age'] = $oncatinfo->age;
            $tmp['kind'] = $oncatinfo->kind;
            $tmp['phone'] = $oncatinfo->phone;
            $tmp['picture'] = $oncatinfo->picture;
            $tmp['operate_time'] = $oncatinfo->operate_time;
            $catInfo[] = $tmp;
        }

        if(! empty($catInfo)){
            $retMassge['result'] = "1";
            $retMassge['massage'] = "successful";
            $retMassge['array_info'] = $catInfo;
            var_dump($retMassge);
            return;
        }else{
            $retMassge['result'] = "3";
            $retMassge['massage'] = "nomoreInfo";
            var_dump($retMassge);
            return;
        }
    }

    public function getNewInfo(){
        $arrary_params = $this->input->get();
        //if(array_key_exists("topNow",$arrary_params)){
        $SumCount = $this->Crud->getCount('invitation');
        if($SumCount<6){
            $ret = $this->Crud->getDataByRang('invitation',$SumCount,1);
        }else{
            $ret = $this->Crud->getDataByRang('invitation',5,$SumCount-4);
        }
        

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