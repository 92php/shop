<?php
//���·���ɾ��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
$id  = $_GET["id"];
$del = new DbMysql();
$del->sql("delete from articletype where id=$id ");
$isok = $del->affected();

if($isok==1)
{
    echo "<script>alert('ɾ������ɹ�');location.href='articleList.php'</script>";
}
else
{
    echo "<script>alert('ɾ������ʧ��');location.href='articleList.php'</script>";
}

?>
