<?php

//��ӭ�տ��������Ƶ�̳� ���ǵ����������� www.houdunwang.com
class order {
    //put your code here
    private $db;
    function __construct(){
        $this->db = new DbMysql();
    }
    
    
    //��ȡ�����嵥
    function getOrderList($orderID){
        $sql="select * from orderList where orderID='$orderID'";
        return $this->db->select($sql);   
    }
    
    //֧��״̬
    function getPaymentState($state){
        
        switch ($state) {
            case 0:
                
                return "δ֧��";
                break;
            case 1:
                return "��֧��";
                break;
 
        }
    }
    
    //����״̬
    function getOrderState($state){
        switch ($state) {
            case 0:
                return "δȷ��";
                break;
            case 1:
                return "������";
                break;
            case 2:
                return "�ѷ���";
                break;
            case 3:
                return "�����";
                break;
            case 4:
                return "��ȡ��";
                break;
        }
    }
}

?>
