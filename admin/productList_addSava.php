<?php
//商品分类 添加保存处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$tid=$_POST["tid"];
$typename=$_POST["typename"];
$sd=1; //默认深度是1
$db = new DbMysql();
if($tid!=0)
{
    
    $result=$db->select("select * from productList where id=$tid", 1);
    $sd=$result["sd"]+1;
   // echo "表示不是一级分类，需要获得上级分类的深度+1";
   
}

          
$isok=$db->sql("insert into productList(tid,typename,sd) values('$tid','$typename','$sd')");

if($isok==1)
{
    echo "<script>alert('商品分类创建成功');location.href='productList.php';</script>";
}
else
{
    echo "<script>alert('商品分类创建失败');location.href='productList.php';</script>";
}
?>
