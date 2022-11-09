<?php

//评论更新处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';


$id=@$_POST["id"];

if(count($id)==0)
{
    echo "<script>alert('请选择您要更新的信息');location.href='assess.php'</script>";
}


$ziduan=$_POST["ziduan"];
$zt=$_POST["zt"];

$db = new DbMysql();



foreach($id as $v)
{
    $db->sql("select * from assess where id =$v ");
    if($db->affected()!=1)
    {
        echo "<script>alert('ID不存在');location.href='assess.php';</script>";
        exit;
    }
    $sql="update assess set $ziduan='$zt' where id=$v";
    $isok=$db->sql($sql);
    if($isok!=1)
    {
        echo "<script>alert('发生错误');location.href='assess.php';</script>";
    }
}

echo "<script>alert('批量更新成功');location.href='assess.php'</script>";
?>
