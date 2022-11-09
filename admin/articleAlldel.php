<?php

//后台文章多选删除处理

require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id=@$_POST["id"];

if(count($id)<1)
{
     echo "<script>alert('请选择一个要删除的信息！');location.href='article.php';</script>";
     exit;    
}

 
$del = new DbMysql();

foreach ($id as $row)
{
    
    $sql="delete from article where id=$row";
    $del->sql($sql);
  
}

echo "<script>alert('删除成功');location.href='article.php'</script>";
 
?>
