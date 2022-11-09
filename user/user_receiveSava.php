<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com
require "../public/init.php";

//var_dump($_POST);

$action=$_REQUEST["action"];
$receive = new receive();
 
$title="收货地址";
$info="";
$url="user_receive.php";
switch ($action) {
    case "add":
        $infos=$_POST;        
        if($receive->receiveAdd($infos,$_SESSION["editOK"])){
             $info="添加地址成功";
        }else
        {
            $info="添加地址失败";
        }
       
        break;
    case "edit":
         $infos=$_POST;    
        if($receive->receiveAdd($infos,$_SESSION["editOK"])){
             $info="修改地址成功";
        }else
        {
            $info="修改地址失败";
        }
         
        break;
    case "del":
        $id=$_GET["id"];
        if($receive->receiveDel($id)){
            //webAlter('删除成功', '/');
            $info="删除成功";
        }else
        {
            
            $info="删除失败";
        }
        break;
    default:
        break;
}
 $_SESSION["editOK"]="notok";
 include "user_savaOK.php";
?>
