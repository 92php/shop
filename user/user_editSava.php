<?php

//��ӭ�տ��������Ƶ�̳� ���ǵ����������� www.houdunwang.com
require '../public/init.php';


$title="�޸�����";
$info="�޸����ϳɹ�";
$url="user_edit.php";

$xingming=$_POST["xingming"];
$sex=$_POST["sex"];
$mobile=$_POST["mobile"];


$sql="update user set xingming='$xingming',sex='$sex',mobile='$mobile' where username='".UID."'";
$isok=$db->sql($sql);

if($isok){
    $info="�޸ĳɹ�";
}else{
    $info="�޸�ʧ��";
}


include "user_SavaOK.php";


?>
