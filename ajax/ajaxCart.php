<?php

require "../public/init.php";

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com

if(!ISLOGIN)
{
    echo "nologin";
    exit;
}
$cart = new cart();

$id=$_POST["id"];
$sum=$_POST["sum"];


$sql="select * from product where id='$id'";
$result=$db->select($sql,1);

if(empty($result))
{
   echo 0;
   exit;
}

if($sum>$result["kucun"])
    {
      echo 2;
      exit;
    }
 
        
        
if($cart->addCart($id,$sum)){
    echo 1;
}
 

?>
