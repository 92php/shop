<?php

//���Ա༭���洦��
require_once 'islogin.php';
require_once '../plus/DbMysql.PHP';

$db = new DbMysql();

$id=$_POST["id"];
if($id=="")
{
    echo "<script>alert('��ָ����ϢID');location.href='feedback.php'</script>";
    exit();
}

$db->sql("select * from feedback where id =$id");
if($db->affected()!=1)
{
    echo "<script>alert('�����ڵ���ϢID');location.href='feedback.php'</script>";
    exit();
}


$typeid=$_POST["typeid"];
$issh=$_POST["issh"];
$ishf=$_POST["ishf"];
$content=$_POST["content"];
$recontent=$_POST["recontent"];
$usernameshow=$_POST["usernameshow"];

if($typeid=="")
{
    echo "<script>alert('����ID����Ϊ��');location.href='feedback.php'</script>";
    exit(); 
}

if($content=="")
{
    echo "<script>alert('�������ݲ���Ϊ��');location.href='feedback.php'</script>";
    exit();
}

if($usernameshow=="")
{
        echo "<script>alert('�ύ�˲���Ϊ��');location.href='feedback.php'</script>";
    exit();
}

$sql="update feedback set
   typeid='$typeid',
   issh='$issh',
   ishf='$ishf',
   content='$content',
   recontent='$recontent',
   usernameshow='$usernameshow'
   where id=$id
";

$isok = $db->sql($sql);
if($isok==1)
{
    echo "<Script>alert('��Ϣ�޸ĳɹ�');location.href='feedback.php';</script>";
}
else
{
    echo "<script>alert('��Ϣ�޸�ʧ��');location.href='feedback.php'</script>";
}

var_dump($_POST);
?>
