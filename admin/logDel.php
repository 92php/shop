<?php
//后台日志删除处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id = $_GET["id"];
$logDel = new DbMysql();
$logDel->sql("delete from adminLog where id=$id");
$result = $logDel->affected();

if($result==1)
    {
    echo "<script>alert('删除成功');location.href='log.php';</script>";
    }
    else
    {
    echo "<script>alert('删除失败');location.href='log.php'</script>";
    }

?>
