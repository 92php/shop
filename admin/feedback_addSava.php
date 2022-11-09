<?php
//留言添加处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
$db = new DbMysql();

$typeid       = $_POST["typeid"];
$issh         = $_POST["issh"];
$ishf         = $_POST["ishf"];
$content      = $_POST["content"];
$recontent    = $_POST["recontent"];
$usernameshow = $_POST["usernameshow"];

$addtime = time();
$ip      = '管理员';
$inputer = $_SESSION["username"];

if($typeid=="")
{
    echo "<script>alert('分类不能为空');location.href='feedback.php';</script>";
    exit();
}
if($content=="")
{
    echo "<script>alert('留言内容不能为空');location.href='feedback.php'</script>";
    exit();
}
if($recontent=="")
{
    $ishf=0;
}

$sql="insert into feedback(typeid,issh,ishf,content,recontent,usernameshow,addtime,ip,inputer)
 values('$typeid','$issh','$ishf','$content','$recontent','$usernameshow','$addtime','$ip','$inputer')    
";

$db->sql($sql);
if($db->affected()==1)
{
    echo "<script>alert('留言添加成功');location.href='feedback.php'</script>";
}
else
{
    echo "<script>alert('留言添加失败');location.href='feedback.php'</script>";
}

?>