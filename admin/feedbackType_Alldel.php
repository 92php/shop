<?php

//���Է�������ɾ��

require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$db= new DbMysql();
$id=@$_POST["id"];

if(count($id)==0)
{
    echo "<script>alert('��ѡ��Ҫɾ������Ϣ');location.href='feedbackType.php'</script>";
    exit();
}

foreach ($id as $v)
{
    $sql="delete from feedbackType where id=$v";
    
     $db->sql($sql);
     
     if($db->affected()!=1)
     {
         echo "<Script>alert('����ɾ��ʧ��,ID:$v');location.href='feedbackType.php';</script>";
         exit();
     }
}

echo "<script>alert('����ɾ���ɹ�');location.href='feedbackType.php'</script>";



?>
