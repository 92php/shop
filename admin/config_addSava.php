<?php

//添加配置文件保存处理
require_once 'islogin.php';
require_once '../Plus/DbMysql.php';
require_once '../plus/config.class.php';

$varshowname=$_POST["varshowname"];
$varname=$_POST["varname"];
$varinfo=$_POST["varinfo"];
$vartype=$_POST["vartype"];
$varvalue=$_POST["varvalue"];

if(preg_match("/[^a-z_]/i",$varname))
{
    echo "<script>alert('请输入一个a-z的字母作为变量名称');location.href='config_add.php'</script>";
    exit;
}

if($vartype=="bool" && ($varvalue!="Y" && $varvalue!="N"))
{
        echo "<script>alert('作为一个BOOL类型，你需要输入的内容是Y或N');location.href='config_add.php'</script>";
        exit;
}

$add = new DbMysql();
$add->sql("select * from webconfig where varname='$varname'");
if($add->affected()>0)
{
    echo "已经存在的变量";
    exit();
}

//echo "<hr>";
$isok=$add->sql("insert into webconfig(varname,varshowname,varinfo,vartype,varvalue) values('$varname','$varshowname','$varinfo','$vartype','$varvalue')");

if($isok==1)
{
   $up = new config();
   $up->configUp();
    echo "<script>alert('添加新变量成功');location.href='config.php'</script>";
}
else
{
    echo "<script>alert('添加新变量失败');location.href='config.php'</script>";
}


?>
