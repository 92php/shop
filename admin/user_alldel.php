<?php

//����ɾ����Ա
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id=@$_POST["id"];

if(count($id)<1)
{
    echo "<script>alert('��ѡ��һ��Ҫɾ�����û���Ϣ');location.href='user.php';</script>";
    exit;
}

$del = new DbMysql();

foreach ($id as $v)
{
   $sql="delete from user where id=$v";
   $isok=$del->sql($sql);
   if($isok!=1)
   {
       echo "���ִ���ID��$v";
       exit;
   }
}

echo "<script>alert('����ɾ���ɹ�!!');location.href='user.php';</script>";

?>
