<?php

//��ƷƷ����ӱ���
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$ppname=$_POST["ppname"];
$pporder=$_POST["pporder"];
$recommend=$_POST["recommend"];
$picurl=$_POST["picurl"];
$ppinfo=$_POST["ppinfo"];

$db= new DbMysql();

$db->sql("select * from productPP where ppname='$ppname'");
if($db->affected()>0)
{
    echo "<script>alert('Ʒ�������Ѿ�����,������������');location.href='product_pp.php'</script>";
}
$sql="insert into productPP(ppname,pporder,recommend,picurl,ppinfo)
values('$ppname','$pporder','$recommend','$picurl','$ppinfo')    
";
$isok=$db->sql($sql);

if($isok==1)
{
    echo "<script>alert('��ƷƷ�ƴ����ɹ�');location.href='product_PP.php'</script>";
}
else
{
    echo "<script>alert('��ƷƷ�ƴ���ʧ��');location.href='product_PP.php'</script>";
}
//$isok=


?>
