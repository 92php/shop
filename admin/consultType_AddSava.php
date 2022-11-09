<?php
//咨询分类添加处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$typename  = $_POST["typename"];
$typeorder = $_POST["typeorder"];
$typezt    = $_POST["typezt"];

$db = new DbMysql();

$db->sql("select * from consultType where typename='$typename'");
if($db->affected()>0)
{
    echo "<script>alert('分类名称重复,请检查');location.href='consultType.php'</script>";
    exit;
}

$sql ="insert into consultType(typename,typeorder,typezt)
values('$typename','$typeorder','$typezt')    
";

$isok=$db->sql($sql);
if($isok==1)
{
    echo "<script>alert('创建售前咨询分类成功');location.href='consultType.php'</script>";
}
else
{
    echo "<script>alert('创建售前咨询分类失败');location.href='consultType.php'</script>";
}
?>
