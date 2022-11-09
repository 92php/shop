<?php

//用户操作类
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
           weberror('','您的会员账号不存在,请重新登陆！');
           $zt=4; //代表没查询到该账号密码
       }
    
    }
    
    function islogin($uid,$pwd,$code)
    {
        $zt=2;

        $pwd=md5($pwd);
        if($code!=$_SESSION["code"])
        {    //验证码不正确
             $zt=0;
             return $zt;
        }
        $sql="select * from user where username='$uid'";
        $result=$this->db->select($sql,1);
        if($this->db->affected()!=1)
        {
            //如果该账号没有存在 -1
            $zt=-1; 
            return $zt;
        }
        if($pwd!=$result["password"])
        {   
            //密码错误
            $zt=-2; 
            return $zt;
        }
        if($result["zt"]==1)
        {
            //表示账号未审核
            $zt=1;
            return $zt;
        }
        if($result["zt"]==3)
        {
            //表示账号被锁定
            $zt=3;
            return $zt;
        }    
        if($zt==2)
        {    
            //表示账号正常      
            $_SESSION["webusername"]=$uid;
            $_SESSION["webpassword"]=$pwd;                        
        }
        return $zt;
    }
    
}

?>
