<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com
class receive {
    //put your code here
    private $db;
    function __construct() {
        $this->db= new DbMysql();
    }
    
    function receiveEdit($info,$isok){
        
       $sql="update receive set shren='{$info["shren"]}',shdizhi='{$info["shdizhi"]}',youbian='{$info["youbian"]}',tel='{$info["tel"]}',mobile='{$info["mobile"]}'
        where id='{$info["id"]}' and username='{$_SESSION["webusername"]}'";
        if($isok=="ok"){
            if($this->db->sql($sql)){
                return true;
            }else
            {
                return false;
            }
        }else{
            return true;
        }
        
       
    }
    
    function receiveDel($id)
    {
        $sql="delete from receive where id='$id' and username='{$_SESSION["webusername"]}'";
        
        if($this->db->sql($sql))
        {
            return true;
        }else{
            return false;
        }
        
    }
    
    function receiveAdd($info,$isok){
        $sql="insert into receive(shren,shdizhi,youbian,tel,mobile,username)
            values('{$info["shren"]}','{$info["shdizhi"]}','{$info["youbian"]}','{$info["tel"]}','{$info["mobile"]}','{$_SESSION["webusername"]}')";
        if($isok=="ok")
        {
         if($this->db->sql($sql)){
             return true;
         }else{
             return false;
         }
        }else{
           
            return true;
        }
    }
    
    
    function receiveList($tj=''){
        $sql="select * from receive";
        $parm=" where 1 ".$tj;
        $sql.=$parm." order by id desc";
        return  $this->db->select($sql);
         
    }
    
}

?>
