<?php

//��Ʒ����ɾ��
require_once 'islogin.php';
require_once '../plus/DbMySQL.PHP';
require_once '../plus/ProductType.class.php';

$id=$_GET["id"];

$del= new ProductType();

$del->typeDel($id);

echo "<script>alert('ɾ���ɹ�');location.href='productList.php';</script>";

?>
