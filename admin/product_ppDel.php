<?php
//��ƷƷ��ɾ��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id=$_GET["id"];
$db = new DbMysql();
$sql="delete from productpp where id=$id";
$isok=$db->sql($sql);
if($isok==1)
{
    echo "<script>alert('ɾ���ɹ�');location.href='product_pp.php'</script>";
}
else
{
    echo "<script>alert('ɾ��ʧ��');location.href='product_pp.php';</script>";
}
?>