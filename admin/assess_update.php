<?php

//���۸��´���
require_once 'islogin.php';
require_once '../plus/DbMysql.php';


$id=@$_POST["id"];

if(count($id)==0)
{
    echo "<script>alert('��ѡ����Ҫ���µ���Ϣ');location.href='assess.php'</script>";
}


$ziduan=$_POST["ziduan"];
$zt=$_POST["zt"];

$db = new DbMysql();



foreach($id as $v)
{
    $db->sql("select * from assess where id =$v ");
    if($db->affected()!=1)
    {
        echo "<script>alert('ID������');location.href='assess.php';</script>";
        exit;
    }
    $sql="update assess set $ziduan='$zt' where id=$v";
    $isok=$db->sql($sql);
    if($isok!=1)
    {
        echo "<script>alert('��������');location.href='assess.php';</script>";
    }
}

echo "<script>alert('�������³ɹ�');location.href='assess.php'</script>";
?>
