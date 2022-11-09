<?php

//单个商品删除
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id=$_GET["id"];

$del = new DbMysql();

$isok=$del->sql("delete from product where id =$id");

if($isok==1)
{
    echo "<script>alert('删除成功');location.href='product.php'</script>";
}
else
{
    echo "<script>alert('删除失败');location.href='product.php';</script>";
}

?>
