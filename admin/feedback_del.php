<?php

//���Ե���ɾ��

require_once 'islogin.php';
require_once '../plus/DbMysql.php';


$id=@$_GET["id"];

if($id=="")
{
    echo "<script>alert('ȱ�ٱ�Ҫ����ID');location.href='feedback.php';</script>";
    exit();
}

$db = new DbMysql();
$db->sql("select * from feedback where id=$id");

if($db->affected()!=1)
{
    echo "<script>alert('ID��ʧ');location.href='feedback.php';</script>";
    exit();
}

$db->sql("delete from feedback where id =$id");

if($db->affected()==1)
{
    echo "<script>alert('������Ϣɾ���ɹ�');location.href='feedback.php'</script>";
}
else
{
    echo "<script>alert('������Ϣɾ��ʧ��');location.href='feedback.php'</script>";
}



?>
