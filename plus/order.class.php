<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com
class order {
    //put your code here
    private $db;
    function __construct(){
        $this->db = new DbMysql();
    }
    
    
    //获取订单清单
    function getOrderList($orderID){
        $sql="select * from orderList where orderID='$orderID'";
        return $this->db->select($sql);   
    }
    
    //支付状态
    function getPaymentState($state){
        
        switch ($state) {
            case 0:
                
                return "未支付";
                break;
            case 1:
                return "已支付";
                break;
 
        }
    }
    
    //订单状态
    function getOrderState($state){
        switch ($state) {
            case 0:
                return "未确认";
                break;
            case 1:
                return "待发货";
                break;
            case 2:
                return "已发货";
                break;
            case 3:
                return "已完结";
                break;
            case 4:
                return "已取消";
                break;
        }
    }
}

?>
