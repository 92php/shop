<?php
//��ѯ����ɾ������
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id = $_GET["id"];
$db = new DbMysql();
$db->sql("select * from consult where id=$id");
if($db->affected()!=1)
{
    echo "<script>alert('û�б�Ҫ����');location.href='consult.php';</script>";
}

$sql  = "delete from consult where id=$id";
$isok = $db->sql($sql);
if($isok==1)
{
    echo "<script>alert('��ǰ��ѯ��Ϣɾ���ɹ�');location.href='consult.php'</script>";
}
else
{
    echo "<script>alert('��ǰ��ѯ��Ϣɾ��ʧ��');location.href='consult.php';</script>";
}
?>