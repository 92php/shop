<?php
//��ѯ���´���
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$db = new DbMysql();
$id = @$_POST["id"];

if(count($id)==0)
{
    echo "<script>alert('��ѡ��Ҫ���µ���Ϣ');location.href='consult.php';</script>";
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
        echo "<script>alert('����');location.href='consult.php'</script>";
        exit();
    }
}
echo "<script>alert('�������ĳɹ�');location.href='consult.php';</script>";
?>