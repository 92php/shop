<?php
//��̨����Ա�޸ı���
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
// ͨ��ID��ȡ�����ݿ���Ϣ��Ȼ����ύ�����ı����жԱ�

$id=$_GET["id"];
$username=$_POST["username"];
$password=$_POST["password"];
$rights=$_POST["rights"];

$edit = new DbMysql();
$edit->sql("update admin set username='$username',password='$password',rights='$rights' where id=$id");
$isok=$edit->affected();

if($isok==1)
{
    echo "<Script>alert('����Ա��Ϣ�޸ĳɹ�');location.href='admin.php'</script>";
}
else
{
    echo "<Script>alert('����Ա��Ϣ�޸�ʧ��');location.href='admin.php'</script>";
}

?>