<?php
//���۵���ɾ��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$db = new DbMysql();
$id = $_GET["id"];
 
//�����ж�һ��ID��
$sql = "delete from  assess  where id=$id";
$db->sql($sql);
$isok = $db->affected();
if($isok==1)
{
    echo "<script>alert('ɾ����Ϣ�ɹ�');location.href='assess.php'</script>";
}
else
{
    echo "<script>alert('ɾ����Ϣʧ��');location.href='assess.php'</script>";
}
?>