<?php

//���Է�����ӱ��洦��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
 



$typename=$_POST["typename"];
$typeorder=$_POST["typeorder"];
$typezt=$_POST["typezt"];


if($typename=="")
{
    echo "ERROR ";
    exit;
}




$db= new DbMysql();
$db->sql("select * from feedbackType where typename='$typename'");
if($db->affected()!=0)
{
    echo "<Script>alert('���и÷�������<$typename>������ٽ������');location.href='feedBackType.php'</script>";
    exit();    
}

$sql="insert into feedbackType(typename,typeorder,typezt) 
  values('$typename','$typeorder','$typezt')    
";


$isok=$db->sql($sql);


if($isok==1)
{
    echo "<script>alert('��������ɹ�');location.href='feedBackType.php';</script>";
}
else
{
    echo "<script>alert('��������ʧ��');location.href='feedBackType.php';</script>";
}


?>
