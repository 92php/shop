<?php
//商品添加保存处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
require_once '../plus/maig.class.php';

$maig = new maig();
$add  = new DbMysql();

$hot       = empty($_POST["hot"])?0:$_POST["hot"];
$drop      = empty ($_POST["drop"])?0:$_POST["drop"];
$recommend = empty($_POST["recommend"])?0:$_POST["recommend"];

$numbers = $_POST["numbers"];
$title   = $maig->str($_POST["title"]);
$typeid  = $_POST["typeid"];
$kucun   = $_POST["kucun"];
$hits    = $_POST["hits"];
$picurl  = $_POST["picurl"];
$ppid    = $_POST["ppid"];
$content = $_POST["content"];

$time    = time();
$inputer = $_SESSION["username"];
$picurls = "";
foreach($_SESSION["urlfile_info"] as $row=>$v)
{
    $picurls.=$_POST["picinfook".$row]."@".$v;
    $picurls.="#";     
}

$isok=$add->sql("insert into product(numbers,title,typeid,ppid,hot,drops,recommend,kucun,hits,picurl,picurls,content,addtime,inputer)
        values('$numbers','$title','$typeid','$ppid','$hot','$drop','$recommend','$kucun','$hits','$picurl','$picurls','$content','$time','$inputer')");

if($isok==1)
{
    echo "<script>alert('插入成功');location.href='product.php'</script>";
}
else
{
    echo "<script>alert('插入失败');location.href='product.php'</script>";
}

?>