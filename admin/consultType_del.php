<?php
//��ѯ����ɾ��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id = $_GET["id"];
$db = new DbMysql();

$db->sql("select * from consultType where id=$id");
if($db->affected()!=1)
{
   echo "<script>alert('��Ϣ������');location.href='consultType.php'</script>";   
   exit;
}

$sql  = "delete from consultType where id =$id";
$isok = $db->sql($sql);
if($isok==1)
{
    echo "<script>alert('��ǰ��ѯ����ɾ���ɹ�');location.href='consultType.php'</script>";
}
else
{
    echo "<script>alert('��ǰ��ѯ����ɾ��ʧ��');location.href='consultType.php';</script>";
}
?>