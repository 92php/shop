<?php
//商品品牌编辑保存处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id        = $_GET["id"];
$ppname    = $_POST["ppname"];
$pporder   = $_POST["pporder"];
$recommend = $_POST["recommend"];
$picurl    = $_POST["picurl"];
$ppinfo    = $_POST["ppinfo"];

$db = new DbMysql();
$db->sql("select * from productPP where ppname='$ppname' and not id='$id'");
if($db->affected()>0)
    {
      echo "<script>alert('要修改的品牌名称已存在');location.href='product_pp.php'</script>";
      exit();
    }

$sql="update productPP set 
             ppname='$ppname',
             pporder='$pporder',
             recommend='$recommend',
             picurl='$picurl',
             ppinfo='$ppinfo'
             where id =$id";
             
$isok = $db->sql($sql);

if($isok==1)
{
    echo "<script>alert('修改成功');location.href='product_pp.php'</script>";
}
else
{
    echo "<script>alert('修改失败');location.href='product_pp.php'</script>";
}
?>
