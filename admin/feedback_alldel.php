<?php

//��������ɾ��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id=@$_POST["id"];

if(count($id)==0)
{
    echo "<Script>alert('��ѡ����Ҫɾ������Ϣ');location.href='feedback.php'</script>";
    exit();
}

$db= new DbMysql();
foreach($id as $v)
{
    $sql="delete from feedback where id =$v";
    $db->sql($sql);
    if($db->affected()!=1)
    {
        echo "<script>alert('ɾ����Ϣ�ж�ID:$v');location.href='feedback.php'</script>";
        exit();
    }
}

echo "<script>alert('����ɾ����Ϣ�ɹ�');location.href='feedback.php';</script>";
?>
