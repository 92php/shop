<?php

//��Ա�������
require_once 'islogin.php';
require_once '../Plus/DbMysql.php';

$db = new DbMysql();
//��ε��ж� ����Ҫִ��ʲô״̬�ĸ���

$zt=$_POST["zt"];
$id=@$_POST["id"];

if(count($id)==0)
    {
       echo "<script>alert('û��ѡ��Ҫ�޸ĵ���Ϣ,�����ѡ��');location.href='user.php'</script>";
       exit();       
    }

foreach($id as $v)
{
    $sql="update user set zt='$zt' where id=$v";
    $isok=$db->sql($sql);
     if($isok!=1)
     {
         echo "<script>alert('�޸ĳ��ִ���');location.href='user.php'</script>";
     }
}

echo "<script>alert('��������״̬�ɹ�');location.href='user.php';</script>";
?>
