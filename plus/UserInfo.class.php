<?php

//�û�������
class UserInfo {
   
    private $db;
    function __construct() {
        $this->db = new DbMysql();
    }
    
    function isok()
    {
        $zt  = 2;
        $uid = @$_SESSION["webusername"];
        $pwd = @$_SESSION["webpassword"];        
        $sql = "select * from user where username='$uid' and password='$pwd'";

       $result = $this->db->select($sql,1); 
       if($this->db->affected()!=1)
       {
           weberror('','���Ļ�Ա�˺Ų�����,�����µ�½��');
           $zt=4; //����û��ѯ�����˺�����
       }
    
    }
    
    function islogin($uid,$pwd,$code)
    {
        $zt=2;

        $pwd=md5($pwd);
        if($code!=$_SESSION["code"])
        {    //��֤�벻��ȷ
             $zt=0;
             return $zt;
        }
        $sql="select * from user where username='$uid'";
        $result=$this->db->select($sql,1);
        if($this->db->affected()!=1)
        {
            //������˺�û�д��� -1
            $zt=-1; 
            return $zt;
        }
        if($pwd!=$result["password"])
        {   
            //�������
            $zt=-2; 
            return $zt;
        }
        if($result["zt"]==1)
        {
            //��ʾ�˺�δ���
            $zt=1;
            return $zt;
        }
        if($result["zt"]==3)
        {
            //��ʾ�˺ű�����
            $zt=3;
            return $zt;
        }    
        if($zt==2)
        {    
            //��ʾ�˺�����      
            $_SESSION["webusername"]=$uid;
            $_SESSION["webpassword"]=$pwd;                        
        }
        return $zt;
    }
    
}

?>
