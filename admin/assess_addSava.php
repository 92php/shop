<?php

//��Ʒ������ӱ��洦��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$pid=$_POST["pid"];
$issh=$_POST["issh"];
$istop=$_POST["istop"];
$recommend=$_POST["recommend"];
$pinglun=$_POST["pinglun"];
$content=$_POST["content"];
$usernameshow=$_POST["usernameshow"];
$ip="����Ա";
$addtime=time();
$inputer=$_SESSION["username"];


$db  = new DbMysql();
$result=$db->select("select title from product where id =$pid");


if(empty ($result))
{
    echo "<script>alert('���������ƷID�����ڣ�������ƷID��');location.href='assess.php';</script>";
    exit();   
}
else
{
    $pname=$result[0]["title"];
}


if($db->affected()!=1)
{
    echo "<script>alert('���������ƷID�����ڣ�������ƷID��');location.href='assess.php'</script>";
}

$sql="insert into assess(pid,issh,istop,recommend,pinglun,content,usernameshow,ip,addtime,inputer)
  values('$pid','$issh','$istop','$recommend','$pinglun','$content','$usernameshow','$ip','$addtime','$inputer')    
";

$isok=$db->sql($sql);

if($isok==1)
{
    echo "<script>alert('$pname ��Ʒ������ӳɹ�');location.href='assess.php';</script>";
}
else
{
    echo "<script>alert('$pname ��Ʒ�������ʧ��');location.href='assess.php';</script>";
}

//var_dump($_POST);
?>
