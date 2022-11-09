<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com
session_start();
require_once '../plus/DbMysql.php';
require_once '../plus/UserInfo.class.php';



if(empty ($_POST))
{
    echo "";
    exit;
}

$userinfo = new UserInfo();
$username=$_POST["login_username"];
$password=$_POST["login_password"];
$code=$_POST["login_code"];



echo $userinfo->islogin($username, $password,$code);

 
//echo $_POST["login_password"];

//可以根据账号密码进行一些列的判断





?>
