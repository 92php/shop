<?php
//��ѯ����ɾ��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id = @$_POST["id"];
if(count($id)==0)
{
    echo "<script>alert('��ѡ��Ҫ��������Ϣ');location.href='consult.php'</script>";
    exit;
}

$db = new DbMysql();
foreach($id as $v)
{
    $db->sql("select * from consult where id =$v");
    if($db->affected()!=1)
    {
        echo "<script>alert('��������');location.href='consult.php';</script>";
    }
    
    $sql  = "delete from consult where id =$v";
    $isok = $db->sql($sql);
    if($isok!=1)
    {
        echo "<script>alert('δ֪����');location.href='consult.php';</script>";
    }          
}

echo "<script>alert('����ɾ���ɹ�');location.href='consult.php'</script>";

?>
