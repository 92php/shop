<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com
class cart {
    //put your code here
    private $db;
    function __construct() {
        $this->db = new DbMysql();
    }
    
    //显示
    function cartInfo(){
            $_SESSION["cartCount"]=0;
            $_SESSION["cartPrice"]=0;
        if(isset($_SESSION["productCart"])){
            if(empty($_SESSION["productCart"]))                return null;
            $keys=array_keys($_SESSION["productCart"]);
            $ids=implode(",", $keys);
            
            //echo $ids;
            $sql="select * from product where id in($ids)";
            $result=$this->db->select($sql);
            //var_dump($result);
            foreach($result as $v){
              //$_SESSION["productCart"][$v["id"]]["total"];  
                $_SESSION["productCart"][$v["id"]]["title"]=$v["title"];
                $_SESSION["productCart"][$v["id"]]["unitPrice"]=$v["price"];
                $_SESSION["productCart"][$v["id"]]["Price"]=$v["price"]*$_SESSION["productCart"][$v["id"]]["total"];
                $_SESSION["productCart"][$v["id"]]["picurl"]=$v["picurl"];
                $_SESSION["productCart"][$v["id"]]["numbers"]=$v["numbers"];
                $_SESSION["productCart"][$v["id"]]["yPrice"]=$v["yprice"];
                $_SESSION["cartCount"]+=$_SESSION["productCart"][$v["id"]]["total"];
                $_SESSION["cartPrice"]+=$_SESSION["productCart"][$v["id"]]["Price"];
                
            }
            
            return $_SESSION["productCart"];
            
            
            
            
        }else{
            return null;
        }
        
    }
    
    //添加
    function addCart($id,$sum){
        if(!isset($_SESSION["productCart"])){
            $_SESSION["productCart"]=array();
        }
        $_SESSION["productCart"][$id]["total"]=$sum;
        return true;
        
    }
    
    //删除 
    function delCart($id)
    {
        if(!isset($_SESSION["productCart"][$id]))
        {
            return false;
        }
        unset ($_SESSION["productCart"][$id]);
        return true;
    }
}

?>
