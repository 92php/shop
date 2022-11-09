<?php

//留言分类添加保存处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
 



$typename=$_POST["typename"];
$typeorder=$_POST["typeorder"];
$typezt=$_POST["typezt"];


if($typename=="")
{
    echo "ERROR ";
    exit;
}




$db= new DbMysql();
$db->sql("select * from feedbackType where typename='$typename'");
if($db->affected()!=0)
{
    echo "<Script>alert('已有该分类名称<$typename>请检查后再进行添加');location.href='feedBackType.php'</script>";
    exit();    
}

$sql="insert into feedbackType(typename,typeorder,typezt) 
  values('$typename','$typeorder','$typezt')    
";


$isok=$db->sql($sql);


if($isok==1)
{
    echo "<script>alert('创建分类成功');location.href='feedBackType.php';</script>";
}
else
{
    echo "<script>alert('创建分类失败');location.href='feedBackType.php';</script>";
}


?>
