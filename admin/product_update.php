<?php

//��ӭ�տ��������Ƶ�̳� ���ǵ����������� www.houdunwang.com

require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$db = new DbMysql();

$id=@$_POST["id"];
if(count($id)==0)
{
    echo "<script>alert('��ѡ��Ҫ���µ���Ϣ');location.href='product.php'</script>";
    exit();
}

foreach($id as $v)
{
    
    $db->sql("select * from product where id=$v");
    if($db->affected()!=1)
    {
        echo "<script>alert('��������');location.href='product.php'</script>";
    }
    
    $ziduan=$_POST["ziduan"];
    $zt=$_POST["zt"];
    
    $sql="update product set $ziduan='$zt' where id=$v";
    $isok=$db->sql($sql);
    if($isok!=1)
    {
        echo "<script>alert('���ִ���');location.href='product.php'</script>";
        exit();
    }
}

echo "<script>alert('�����ɹ�');location.href='product.php'</script>";

//var_dump($_POST);
?>
