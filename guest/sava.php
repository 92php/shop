<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com
require "../public/init.php";

var_dump($_POST);

$info=array_map("guolvStr", $_POST);

var_dump($info);

$addtime=time();
$ip=getIP();
$zt=0;
if($webguest=="N")
{
    $zt=1;
}
$sql="insert into feedback(content,usernameshow,inputer,addtime,qq,mobile,email,wangwang,ip,issh)
     values('{$info["content"]}','{$info["uname"]}','{$info["uname"]}','$addtime','{$info["qq"]}','{$info["phone"]}','{$info["email"]}','{$info["wangwang"]}','$ip','$zt')";

if($db->sql($sql)){
    webAlter("留言成功", "{$webdir}guest/");
}else{
   webAlter("留言失败", "{$webdir}guest/");
}
?>
