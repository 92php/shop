<?php

//��ӭ�տ��������Ƶ�̳� ���ǵ����������� www.houdunwang.com
require '../public/init.php';
$userinfo  = new UserInfo();
$zt=$userinfo->isok();

$ymima=md5($_POST["yPassword"]);
$xmima=md5($_POST["xPassword"]);
$qmima=md5($_POST["qPassword"]);

$sql="select * from user where username ='".UID."' and password='$ymima'";
$db->sql($sql);


 
if($db->affected()!=1){
    webAlter("ԭ�������", 'user_password.php');
}

if($xmima!=$qmima){
    webAlter("�������벻һ��", 'user_password.php');
}

$sql="update user set password='$xmima' where username ='".UID."'";
$isok=$db->sql($sql);

if($isok)
    {
    session_destroy();
    $_SESSION=array();
        webAlter("���������޸ĳɹ�,�����µ�½��", 'user_login.php');
    }else{
       webAlter("�޸�ʧ��", 'user_password.php'); 
    }


?>
