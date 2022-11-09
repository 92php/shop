<?php
//咨询单个删除处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id = $_GET["id"];
$db = new DbMysql();
$db->sql("select * from consult where id=$id");
if($db->affected()!=1)
{
    echo "<script>alert('没有必要参数');location.href='consult.php';</script>";
}

$sql  = "delete from consult where id=$id";
$isok = $db->sql($sql);
if($isok==1)
{
    echo "<script>alert('售前咨询信息删除成功');location.href='consult.php'</script>";
}
else
{
    echo "<script>alert('售前咨询信息删除失败');location.href='consult.php';</script>";
}
?>