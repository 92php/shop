<?php
//��ѯ����༭���洦��
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
    echo "<script>alert('�÷��������Ѿ�����,����');location.href='consultType.php';</script>";
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
    echo "<script>alert('��ǰ��ѯ�����޸ĳɹ�');location.href='consultType.php'</script>";
}
else
{
    echo "<script>alert('��ǰ��ѯ�����޸�ʧ��');location.href='consultType.php'</script>";
}
?>