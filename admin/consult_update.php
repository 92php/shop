<?php
//咨询更新处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$db = new DbMysql();
$id = @$_POST["id"];

if(count($id)==0)
{
    echo "<script>alert('请选择要更新的信息');location.href='consult.php';</script>";
    exit();
}

$infozt = $_POST["infozt"];
$ziduan = $_POST["ziduan"];

foreach($id as $v)
{
	$sql  = "update consult set $ziduan='$infozt' where id=$v";
	$isok = $db->sql($sql);
    if($isok!=1)
    {
        echo "<script>alert('错误');location.href='consult.php'</script>";
        exit();
    }
}
echo "<script>alert('批量更改成功');location.href='consult.php';</script>";
?>