<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$typename=$_POST["typename"];
$leixing=$_POST["leixing"];
$add = new DbMysql();
$add->sql("insert into articleType(typename,leixing) values('$typename','$leixing')");

$isok=$add->affected();

if($isok==1)
{
    echo "<script>alert('创建分类成功');location.href='articleList.php';</script>";
}
else
{
    echo "<script>alert('创建分类失败');location.href='articleList.php';</script>";
}

?>
