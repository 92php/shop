<?php
//后台文章单个删除处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id  = $_GET["id"];
$del = new DbMysql();

$del->sql("delete from article where id=$id");

$isok = $del->affected();

if($isok==1)
{
    echo "<script>alert('删除成功');location.href='article.php'</script>";    
}
else
{
     echo "<script>alert('删除失败');location.href='article.php'</script>";  
}

?>
