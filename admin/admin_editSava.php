<?php
//后台管理员修改保存
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
// 通过ID，取得数据库信息，然后跟提交过来的表单进行对比

$id=$_GET["id"];
$username=$_POST["username"];
$password=$_POST["password"];
$rights=$_POST["rights"];

$edit = new DbMysql();
$edit->sql("update admin set username='$username',password='$password',rights='$rights' where id=$id");
$isok=$edit->affected();

if($isok==1)
{
    echo "<Script>alert('管理员信息修改成功');location.href='admin.php'</script>";
}
else
{
    echo "<Script>alert('管理员信息修改失败');location.href='admin.php'</script>";
}

?>