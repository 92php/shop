<?php

//留言编辑保存处理
require_once 'islogin.php';
require_once '../plus/DbMysql.PHP';

$db = new DbMysql();

$id=$_POST["id"];
if($id=="")
{
    echo "<script>alert('请指定信息ID');location.href='feedback.php'</script>";
    exit();
}

$db->sql("select * from feedback where id =$id");
if($db->affected()!=1)
{
    echo "<script>alert('不存在的信息ID');location.href='feedback.php'</script>";
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
    echo "<script>alert('分类ID不能为空');location.href='feedback.php'</script>";
    exit(); 
}

if($content=="")
{
    echo "<script>alert('留言内容不能为空');location.href='feedback.php'</script>";
    exit();
}

if($usernameshow=="")
{
        echo "<script>alert('提交人不能为空');location.href='feedback.php'</script>";
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
    echo "<Script>alert('信息修改成功');location.href='feedback.php';</script>";
}
else
{
    echo "<script>alert('信息修改失败');location.href='feedback.php'</script>";
}

var_dump($_POST);
?>
