<?php

//��Ʒ���� �༭���洦��
require_once 'islogin.php';
require_once '../Plus/DbMysql.php';
require_once '../plus/ProductType.class.php';

$editsava = new DbMysql();
$id=$_GET["id"];

//$result=$editsava->select("select * from productList where id=$id",1);
//if($result["tid"]==0)
//{
//    echo "<script>alert('һ�����಻�����ٴ��޸�');location.href='productList.php'</script>";
//    exit;
//}

$tid=$_POST["tid"];
 
$typename=$_POST["typename"];

$sd=1;


 

$ptype = new ProductType();
$ptype->updateSd($id, $sd);

 
if($tid!=0)
{
    
    $result=$editsava->select("select * from productList where id=$tid", 1);
    $sd=$result["sd"]+1;
   // echo "��ʾ����һ�����࣬��Ҫ����ϼ���������+1"; 
}


 
 


$isok=$editsava->sql("update productList set tid='$tid',typename='$typename',sd='$sd' where id=$id");

if($isok==1)
{
    echo "<script>alert('�޸ĳɹ�');location.href='productList.php'</script>";
}
else
{
    echo "<script>alert('�޸�ʧ��');location.href='productList.php'</script>";
}


?>
