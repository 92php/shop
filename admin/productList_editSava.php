<?php

//商品分类 编辑保存处理
require_once 'islogin.php';
require_once '../Plus/DbMysql.php';
require_once '../plus/ProductType.class.php';

$editsava = new DbMysql();
$id=$_GET["id"];

//$result=$editsava->select("select * from productList where id=$id",1);
//if($result["tid"]==0)
//{
//    echo "<script>alert('一级分类不可以再次修改');location.href='productList.php'</script>";
//    exit;
//}

$tid=$_POST["tid"];
 
$typename=$_POST["typename"];

$sd=1;


 

$ptype = new ProductType();
$ptype->updateSd($id, $sd);

 
if($tid!=0)
{
    
    $result=$editsava->select("select * from productList where id=$tid", 1);
    $sd=$result["sd"]+1;
   // echo "表示不是一级分类，需要获得上级分类的深度+1"; 
}


 
 


$isok=$editsava->sql("update productList set tid='$tid',typename='$typename',sd='$sd' where id=$id");

if($isok==1)
{
    echo "<script>alert('修改成功');location.href='productList.php'</script>";
}
else
{
    echo "<script>alert('修改失败');location.href='productList.php'</script>";
}


?>
