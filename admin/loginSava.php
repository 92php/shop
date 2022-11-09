<?php
//后台登录处理页面
require_once '../plus/DbMysql.php';
require_once '../plus/AdminLogin.class.php';
session_start();

$username = $_POST["username"];
$password = $_POST["password"];
$code     = $_POST["code"];

if($code!=$_SESSION["code"])
{
    echo "<script>alert('验证码不正确,请重新登陆');location.href='login.php';</script>";
    exit;
}

$login   = new AdminLogin();
$islogin = $login->isLogin($username, $password);


if($islogin==1)
    {
      $_SESSION["username"] = $username;
      $_SESSION["password"] = $password;  
      echo "<script>alert('欢迎回来$username');location.href='index.php';</script>";
    }
    
if($islogin==-1)
{
    echo "<script>alert('密码错误');location.href='login.php';</script>";
}

if($islogin==-2)
{
    echo "<script>alert('账号不存在，请输入一个正确的账号');location.href='login.php';</script>";
    
}

?>