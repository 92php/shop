<?php
//后台管理员密码修改保存
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$username = $_POST["username"];
$password = $_POST["password"];

$edit = new DbMysql();

$edit->sql("update admin set password='$password' where username='$username'");

session_destroy();

echo "<script>alert('修改成功,请重新登录');top.location.href='login.php';</script>";

?>