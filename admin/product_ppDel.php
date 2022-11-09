<?php
//ÉÌÆ·Æ·ÅÆÉ¾³ý
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id=$_GET["id"];
$db = new DbMysql();
$sql="delete from productpp where id=$id";
$isok=$db->sql($sql);
if($isok==1)
{
    echo "<script>alert('É¾³ý³É¹¦');location.href='product_pp.php'</script>";
}
else
{
    echo "<script>alert('É¾³ýÊ§°Ü');location.href='product_pp.php';</script>";
}
?>