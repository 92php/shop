<?php
//��̨��־��ѡɾ������
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id = @$_POST["id"];

//��������Ա�ſ���ɾ��
if ($_SESSION['rights']!=1) {
	 echo "<script>alert('����ɾ������Ϣ��Ȩ�޲���');location.href='log.php';</script>";
     exit; 
}

if(count($id)<1)
{
     echo "<script>alert('��ѡ��һ��Ҫɾ������Ϣ��');location.href='log.php';</script>";
     exit;    
}

$logDel = new DbMysql();

foreach ($id as $row)
{
    $logDel->sql("delete from adminLog where id=$row"); 
}

$result = $logDel->affected();

if($result==1)
    {
    echo "<script>alert('ɾ���ɹ�');location.href='log.php';</script>";
    }
    else
    {
    echo "<script>alert('ɾ��ʧ��');location.href='log.php'</script>";
    }

?>
