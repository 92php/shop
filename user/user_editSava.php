<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com
require '../public/init.php';


$title="修改资料";
$info="修改资料成功";
$url="user_edit.php";

$xingming=$_POST["xingming"];
$sex=$_POST["sex"];
$mobile=$_POST["mobile"];


$sql="update user set xingming='$xingming',sex='$sex',mobile='$mobile' where username='".UID."'";
$isok=$db->sql($sql);

if($isok){
    $info="修改成功";
}else{
    $info="修改失败";
}


include "user_SavaOK.php";


?>
