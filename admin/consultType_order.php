<?php
//��ѯ��������
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id     = @$_POST["id"];
$ziduan = @$_POST["ziduan"];
$zt     = @$_POST["zt"];

if(count($id)==0)
{
    echo "<script>alert('��ѡ��Ҫ���µ���Ϣ');location.href='consultType.php'</script>";
    exit();
}
$db = new DbMysql();
foreach($id as $v)
{
    $nr = $_POST["order".$v];
     if($ziduan=="typezt")
     {
         $nr = $zt;
     }
    $sql = "update consultType set $ziduan='$nr' where id=$v";
    $isok = $db->sql($sql);
    if($isok!=1)
    {
       echo "<script>alert('δ֪����');location.href='consultType.php'</script>";
    }
    echo "<script>alert('��������ɹ�');location.href='consultType.php'</script>";  
}

?>
