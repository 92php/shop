<?php
//咨询分类编辑保存处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id        = $_GET["id"];
$typename  = $_POST["typename"];
$typeorder = $_POST["typeorder"];
$typezt    = $_POST["typezt"];

$db = new DbMysql();
$db->sql("select * from consultType where typename='$typename' and not id=$id");

if($db->affected()>0)
{
    echo "<script>alert('该分类名称已经存在,请检查');location.href='consultType.php';</script>";
    exit;   
}

$sql ="update consultType set
      typename='$typename',
      typeorder='$typeorder',
      typezt='$typezt'
      where id=$id
";
 
$isok = $db->sql($sql);
if($isok==1)
{
    echo "<script>alert('售前咨询分类修改成功');location.href='consultType.php'</script>";
}
else
{
    echo "<script>alert('售前咨询分类修改失败');location.href='consultType.php'</script>";
}
?>