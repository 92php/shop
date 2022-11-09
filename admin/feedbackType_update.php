<?php

//留言分类更新
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id=@$_POST["id"];


if(count($id)==0)
{
    echo "<script>alert('请选择要更新的信息');location.href='feedbackType.php';</script>";
    exit();
}

$db= new DbMysql();
$zt=$_POST["zt"];


if($zt!=1 && $zt!=0)
{
    echo "<script>alert('出错');location.href='feedbackType.php';</script>";
    exit();
}

foreach($id as $v)
{
    $db->sql("select * from feedbackType where id=$v");
    if($db->affected()!=1)
    {
        echo "<script>alert('不存在的ID：$V');location.href='feedbackType.php';</script>";
        exit();
    }
    $sql="update feedbackType set typezt='$zt' where id=$v";
    $isok=$db->sql($sql);     
}

echo "<script>alert('批量修改完成');location.href='feedbackType.php';</script>";
 

?>
