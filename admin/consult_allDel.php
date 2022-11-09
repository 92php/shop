<?php
//咨询批量删除
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id = @$_POST["id"];
if(count($id)==0)
{
    echo "<script>alert('请选择要操作的信息');location.href='consult.php'</script>";
    exit;
}

$db = new DbMysql();
foreach($id as $v)
{
    $db->sql("select * from consult where id =$v");
    if($db->affected()!=1)
    {
        echo "<script>alert('参数错误');location.href='consult.php';</script>";
    }
    
    $sql  = "delete from consult where id =$v";
    $isok = $db->sql($sql);
    if($isok!=1)
    {
        echo "<script>alert('未知错误');location.href='consult.php';</script>";
    }          
}

echo "<script>alert('批量删除成功');location.href='consult.php'</script>";

?>
