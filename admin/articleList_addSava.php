<?php

//��ӭ�տ��������Ƶ�̳� ���ǵ����������� www.houdunwang.com
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$typename=$_POST["typename"];
$leixing=$_POST["leixing"];
$add = new DbMysql();
$add->sql("insert into articleType(typename,leixing) values('$typename','$leixing')");

$isok=$add->affected();

if($isok==1)
{
    echo "<script>alert('��������ɹ�');location.href='articleList.php';</script>";
}
else
{
    echo "<script>alert('��������ʧ��');location.href='articleList.php';</script>";
}

?>
