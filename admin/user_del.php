<?php
//��Ա����ɾ��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id=$_GET["id"];

$del = new DbMysql();

$isok=$del->sql("delete from user where id=$id");

if($isok==1)
{
    echo "<script>alert('ɾ����Ա�ɹ�');location.href='user.php';</script>";
}
else
{
    echo "<script>alert('ɾ����Աʧ��');location.href='user.php';</script>";
}
?>