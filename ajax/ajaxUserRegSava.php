<?php

//��ӭ�տ��������Ƶ�̳� ���ǵ����������� www.houdunwang.com

//require '../public/init.php';
session_start(); 
define("WEBDIR", dirname(dirname(__FILE__)));
require_once WEBDIR.'/config/config.php';
require_once WEBDIR.'/public/functions.php';
require_once WEBDIR.'/plus/DbMysql.php';
require_once '../plus/UserInfo.class.php';

$username=$_POST["username"];
//ע��ʱ������Խ�һ�����ж�





$password=md5($_POST["password"]);
$code=$_POST["code"];


if($code!=$_SESSION["code"]){
    echo "0";
    exit;
}

$db=new DbMysql();

$db->sql("select * from user where username='$username'");
if($db->affected()!=0){
    echo "5";
    exit;
}

$zt=1;

if($webuserreg=='N'){
  $zt=2;  
}


$sql="insert into user(username,password,email,zt) values('$username','$password','$username','$zt')";

$db->sql($sql);


if($db->affected()=="1")
{
    echo $zt;
}



$userinfo = new UserInfo();

echo $userinfo->islogin($username, $password,$code);
?>
