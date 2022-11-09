<?php
//咨询分类删除
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id = $_GET["id"];
$db = new DbMysql();

$db->sql("select * from consultType where id=$id");
if($db->affected()!=1)
{
   echo "<script>alert('信息不存在');location.href='consultType.php'</script>";   
   exit;
}

$sql  = "delete from consultType where id =$id";
$isok = $db->sql($sql);
if($isok==1)
{
    echo "<script>alert('售前咨询分类删除成功');location.href='consultType.php'</script>";
}
else
{
    echo "<script>alert('售前咨询分类删除失败');location.href='consultType.php';</script>";
}
?>