<?php
//添加管理员处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$username = $_POST["username"];
$password = $_POST["password"];
$rights   = $_POST["rights"];

$admin = new DbMysql();
$admin->sql("select * from admin where username='$username'");
$count = $admin->affected();

if($count>0)
{
    echo "<script>alert('你建立的账号$username,已经存在,请更换一个！');location.href='admin.php'</script>";   
    exit;
}

$admin->sql("insert into admin(username,password,rights) values('$username','$password','$rights')");
$isok = $admin->affected();
if($isok==1)
    {
     echo "<script>alert('管理员创建成功！');location.href='admin.php'</script>";
    }
    else
    {
     echo "<script>alert('管理员创建失败！');location.href='admin.php'</script>";
    }
?>