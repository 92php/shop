<?php

//商品评论添加保存处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$pid=$_POST["pid"];
$issh=$_POST["issh"];
$istop=$_POST["istop"];
$recommend=$_POST["recommend"];
$pinglun=$_POST["pinglun"];
$content=$_POST["content"];
$usernameshow=$_POST["usernameshow"];
$ip="管理员";
$addtime=time();
$inputer=$_SESSION["username"];


$db  = new DbMysql();
$result=$db->select("select title from product where id =$pid");


if(empty ($result))
{
    echo "<script>alert('您输入的商品ID不存在，请检查商品ID！');location.href='assess.php';</script>";
    exit();   
}
else
{
    $pname=$result[0]["title"];
}


if($db->affected()!=1)
{
    echo "<script>alert('请输入的商品ID不存在，请检查商品ID！');location.href='assess.php'</script>";
}

$sql="insert into assess(pid,issh,istop,recommend,pinglun,content,usernameshow,ip,addtime,inputer)
  values('$pid','$issh','$istop','$recommend','$pinglun','$content','$usernameshow','$ip','$addtime','$inputer')    
";

$isok=$db->sql($sql);

if($isok==1)
{
    echo "<script>alert('$pname 商品评论添加成功');location.href='assess.php';</script>";
}
else
{
    echo "<script>alert('$pname 商品评论添加失败');location.href='assess.php';</script>";
}

//var_dump($_POST);
?>
