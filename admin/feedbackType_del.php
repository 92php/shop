<?php

//���Է��൥��ɾ��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
$db = new DbMysql();
$id=$_GET["id"];

 $sql="delete from feedbackType where id=$id";
 $isok=$db->sql($sql);
 //$db->affected();
 
 if($db->affected()==1)
 {
     echo "<script>alert('���Է���ɾ���ɹ�');location.href='feedbackType.php'</script>";    
 }
 else
 {
     echo "<script>alert('���Է���ɾ��ʧ��');location.href='feedbackType.php';</script>";
 }
?>
