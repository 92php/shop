<?php

//��������ļ����洦��
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
    echo "<script>alert('������һ��a-z����ĸ��Ϊ��������');location.href='config_add.php'</script>";
    exit;
}

if($vartype=="bool" && ($varvalue!="Y" && $varvalue!="N"))
{
        echo "<script>alert('��Ϊһ��BOOL���ͣ�����Ҫ�����������Y��N');location.href='config_add.php'</script>";
        exit;
}

$add = new DbMysql();
$add->sql("select * from webconfig where varname='$varname'");
if($add->affected()>0)
{
    echo "�Ѿ����ڵı���";
    exit();
}

//echo "<hr>";
$isok=$add->sql("insert into webconfig(varname,varshowname,varinfo,vartype,varvalue) values('$varname','$varshowname','$varinfo','$vartype','$varvalue')");

if($isok==1)
{
   $up = new config();
   $up->configUp();
    echo "<script>alert('����±����ɹ�');location.href='config.php'</script>";
}
else
{
    echo "<script>alert('����±���ʧ��');location.href='config.php'</script>";
}


?>
