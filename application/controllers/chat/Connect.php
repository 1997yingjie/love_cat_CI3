<?php
//加载GatewayClient。关于GatewayClient参见本页面底部介绍
require_once 'Gateway.php';
// GatewayClient 3.0.0版本开始要使用命名空间
use GatewayClient\Gateway;


class Connect extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model( "Crud" );
        // 设置GatewayWorker服务的Register服务ip和端口，请根据实际情况改成实际值(ip不能是0.0.0.0)
        Gateway::$registerAddress = '127.0.0.1:1238';
    }

    public function bind(){
        $_SESSION = $this->input->get();
        // 假设用户已经登录，用户uid和群组id在session中
        $uName      = $_SESSION['uName'];
        $client_id  = $_SESSION['client_id'];
        //$group_id = $_SESSION['group'];
        // client_id与uid绑定
        Gateway::bindUid($client_id, $uName);

    }

    public function gethistory(){
        //获取掉线期间的数据
        $arrary_params = $this->input->get();

    }
    
}

