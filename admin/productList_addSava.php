<?php
//��Ʒ���� ��ӱ��洦��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$tid=$_POST["tid"];
$typename=$_POST["typename"];
$sd=1; //Ĭ�������1
$db = new DbMysql();
if($tid!=0)
{
    
    $result=$db->select("select * from productList where id=$tid", 1);
    $sd=$result["sd"]+1;
   // echo "��ʾ����һ�����࣬��Ҫ����ϼ���������+1";
   
}

          
$isok=$db->sql("insert into productList(tid,typename,sd) values('$tid','$typename','$sd')");

if($isok==1)
{
    echo "<script>alert('��Ʒ���ഴ���ɹ�');location.href='productList.php';</script>";
}
else
{
    echo "<script>alert('��Ʒ���ഴ��ʧ��');location.href='productList.php';</script>";
}
?>
