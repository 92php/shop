<?php

//留言单个删除

require_once 'islogin.php';
require_once '../plus/DbMysql.php';


$id=@$_GET["id"];

if($id=="")
{
    echo "<script>alert('缺少必要参数ID');location.href='feedback.php';</script>";
    exit();
}

$db = new DbMysql();
$db->sql("select * from feedback where id=$id");

if($db->affected()!=1)
{
    echo "<script>alert('ID丢失');location.href='feedback.php';</script>";
    exit();
}

$db->sql("delete from feedback where id =$id");

if($db->affected()==1)
{
    echo "<script>alert('留言信息删除成功');location.href='feedback.php'</script>";
}
else
{
    echo "<script>alert('留言信息删除失败');location.href='feedback.php'</script>";
}



?>
