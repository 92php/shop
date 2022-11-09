<?php
//文章分类删除
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
$id  = $_GET["id"];
$del = new DbMysql();
$del->sql("delete from articletype where id=$id ");
$isok = $del->affected();

if($isok==1)
{
    echo "<script>alert('删除分类成功');location.href='articleList.php'</script>";
}
else
{
    echo "<script>alert('删除分类失败');location.href='articleList.php'</script>";
}

?>
