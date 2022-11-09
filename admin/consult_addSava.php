<?php
//咨询添加处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$db           = new DbMysql();
$pid          = $_POST["pid"];
$typeid       = $_POST["typeid"];
$issh         = $_POST["issh"];
$ishf         = $_POST["ishf"];
$content      = $_POST["content"];
$recontent    = $_POST["recontent"];
$usernameshow = $_POST["usernameshow"];
$addtime      = time();
$inputer      = $_SESSION["username"];
$ip           = "管理员";

$db->sql("select * from product where id=$pid");
if($db->affected()!=1)
{
    echo "<script>alert('关联商品ID不存在,请确实ID号后再进行添加！');location.href='consult.php'</script>";
    exit();   
}
 
if($recontent=="")
{
    $ishf=0;   
}

$sql="insert into consult(pid,typeid,issh,ishf,content,recontent,usernameshow,addtime,inputer,ip)  
values('$pid','$typeid','$issh','$ishf','$content','$recontent','$usernameshow','$addtime','$inputer','$ip')   
";

$isok=$db->sql($sql);
if($isok==1)
{
    echo "<script>alert('添加售前咨询信息成功');location.href='consult.php';</script>";
}
else
{
    echo "<script>alert('添加售前咨询信息失败');location.href='consult.php';</script>";
}

?>
