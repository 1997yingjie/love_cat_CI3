<?php
//加载GatewayClient。关于GatewayClient参见本页面底部介绍
require_once 'Gateway.php';
// GatewayClient 3.0.0版本开始要使用命名空间
use GatewayClient\Gateway;


class Send extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model( "Crud" );
        // 设置GatewayWorker服务的Register服务ip和端口，请根据实际情况改成实际值(ip不能是0.0.0.0)
        Gateway::$registerAddress = '127.0.0.1:1238';
    }

    public function sendMassage(){
        $_SESSION = $this->input->get();
        $message = array();
        $message['destination_name']    = $_SESSION['send_to'];
        $message['ext']      = $_SESSION['ext'];
        $message['originate_name']      = $_SESSION['originate_name'];
        $message['operate_time']     = date("Y-m-d H:i:s");  

        Gateway::sendToUid($send_to, $message);


        //将数据写入数据库
        
        $ret = $this->Crud->insert("chat",$message);
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


