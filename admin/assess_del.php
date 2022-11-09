<?php
//评论单个删除
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$db = new DbMysql();
$id = $_GET["id"];
 
//首先判断一下ID，
$sql = "delete from  assess  where id=$id";
$db->sql($sql);
$isok = $db->affected();
if($isok==1)
{
    echo "<script>alert('删除信息成功');location.href='assess.php'</script>";
}
else
{
    echo "<script>alert('删除信息失败');location.href='assess.php'</script>";
}
?>