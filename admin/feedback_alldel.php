<?php

//留言批量删除
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id=@$_POST["id"];

if(count($id)==0)
{
    echo "<Script>alert('请选择您要删除的信息');location.href='feedback.php'</script>";
    exit();
}

$db= new DbMysql();
foreach($id as $v)
{
    $sql="delete from feedback where id =$v";
    $db->sql($sql);
    if($db->affected()!=1)
    {
        echo "<script>alert('删除信息中断ID:$v');location.href='feedback.php'</script>";
        exit();
    }
}

echo "<script>alert('批量删除信息成功');location.href='feedback.php';</script>";
?>
