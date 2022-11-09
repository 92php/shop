<?php
//链接添加保存处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$fifel   = $_FILES["logourl"]; 
$webname = $_POST["webname"];
$weburl  = $_POST["weburl"];
$styleid = $_POST["styleid"];
$intro   = $_POST["intro"];
$time    = time();
$ftype   = $fifel["type"];
$fsize   = $fifel["size"];

if($styleid==1){

if(($ftype=="image/gif"||$ftype=="image/jpeg"||$ftype=="image/pjpeg") && $fsize<102400)
{   
    move_uploaded_file($fifel["tmp_name"], "../upload/".$fifel["name"]);
    $logourl="upload/".$fifel["name"];
}
else
{
    echo "<script>alert('LOGO文件不合法');location.href='links.php'</script>";
    exit;
}
}
else
{
    $logourl="文本链接";
}

// 判断一下文件的格式。后缀          jpg gif
// 判断一下大小符合不符合咱们的要求。 300KB

$add= new DbMysql();
$isok=$add->sql("insert into links(webname,weburl,styleid,logourl,addtime,intro) values('$webname','$weburl','$styleid','$logourl','$time','$intro')");
if($isok==1)
{
    echo "<script>alert('友情链接添加成功');location.href='links.php'</script>";
}
else
{
    echo "<script>alert('添加失败');location.href='links.php'</script>";
}
?>
