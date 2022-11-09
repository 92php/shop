<?php

//文章分类编辑保存处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
$id = $_GET["id"];
$typename = $_POST["typename"];

$edit = new DbMysql();
$edit->sql("update articletype set typename='$typename' where id=$id");
$isok = $edit->affected();
if($isok==1)
{
    echo "<script>alert('分类修改成功');location.href='articleList.php'</script>";
}
else
{
     echo "<script>alert('分类修改失败');location.href='articleList.php'</script>";
}
?>
