<?php

//商品分类删除
require_once 'islogin.php';
require_once '../plus/DbMySQL.PHP';
require_once '../plus/ProductType.class.php';

$id=$_GET["id"];

$del= new ProductType();

$del->typeDel($id);

echo "<script>alert('删除成功');location.href='productList.php';</script>";

?>
