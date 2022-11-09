<?php
//后台日志多选删除处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id = @$_POST["id"];

//超级管理员才可以删除
if ($_SESSION['rights']!=1) {
	 echo "<script>alert('不能删除的信息！权限不够');location.href='log.php';</script>";
     exit; 
}

if(count($id)<1)
{
     echo "<script>alert('请选择一个要删除的信息！');location.href='log.php';</script>";
     exit;    
}

$logDel = new DbMysql();

foreach ($id as $row)
{
    $logDel->sql("delete from adminLog where id=$row"); 
}

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
