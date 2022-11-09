<?php

//留言更新处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
$db = new DbMysql();

$id=$_POST["id"];
if(count($id)==0)
{
    echo "<script>alert('请选择要更新的信息');location.href='feedback.php'</script>";
    exit();
}

$ziduan=$_POST["ziduan"];
$zt=$_POST["zt"];

foreach($id as $v)
{
    $db->sql("select * from feedback where id =$v");
    if($db->affected()!=1)
    {
        echo "<script>alert('ID不存在');location.href='feedback.php';</script>";
        exit();
    }
    
    $sql="update feedback set $ziduan='$zt' where id=$v";    
    $db->sql($sql);   
}

echo "<script>alert('批量修改信息完成');location.href='feedback.php';</script>";
?>
