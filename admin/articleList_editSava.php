<?php

//���·���༭���洦��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
$id = $_GET["id"];
$typename = $_POST["typename"];

$edit = new DbMysql();
$edit->sql("update articletype set typename='$typename' where id=$id");
$isok = $edit->affected();
if($isok==1)
{
    echo "<script>alert('�����޸ĳɹ�');location.href='articleList.php'</script>";
}
else
{
     echo "<script>alert('�����޸�ʧ��');location.href='articleList.php'</script>";
}
?>
