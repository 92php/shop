<?php

//���۱༭���洦��

require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$db=new DbMysql();

if(empty ($_POST)){echo "error";exit;}


$id=$_POST["id"];
$pid=$_POST["pid"];
$issh=$_POST["issh"];
$istop=$_POST["istop"];
$recommend=$_POST["recommend"];
$pinglun=$_POST["pinglun"];
$content=$_POST["content"];
$usernameshow=$_POST["usernameshow"];


$db->sql("select * from assess where id =$id");

if($db->affected()!=1)
{
    echo "<script>alert('ID����');location.href='assess.php'</script>";
    exit;
}

$db->sql("select * from product where id =$pid");
if($db->affected()!=1)
{
    echo "<script>alert('��ƷID���������Ƿ���ڸ�ID');location.href='assess.php'</script>";
    exit;
    
}



$sql="update assess set
pid='$pid',
issh='$issh',
istop='$istop',
recommend='$recommend',
pinglun='$pinglun',
content='$content',
usernameshow='$usernameshow'
 where id =$id
";



$isok=$db->sql($sql);
if($isok==1)
{
    echo "<script>alert('�޸ĳɹ�');location.href='assess.php';</script>";
}
else
{
    echo "<script>alert('�޸�ʧ��');location.href='assess.php';</script>";
}


var_dump($_POST);


?>