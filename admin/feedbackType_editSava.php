<?php

//���Է���༭���洦��
require_once 'islogin.php';
require_once '../Plus/DbMysql.php';
$db= new DbMysql();

//var_dump($_POST);




$id=$_POST["id"];
$typename=$_POST["typename"];
$typeorder=$_POST["typeorder"];
$typezt=$_POST["typezt"];


if($typename=="")
{
    echo "<script>alert('�������Ʋ���Ϊ��');location.href='feedbackType.php'</script>";
    exit();
}

$result=$db->select("select * from feedbackType where id=$id",1);
//echo $result["typename"];
//echo "���ݿ��Ƿ����SQL��";




 if($db->affected()!=1)
 {
     echo "<script>alert('�޸�ID������,����');location.href='feedbackType.php'</script>";
     exit();
      
 }

$db->sql("select * from feedbackType where typename='$typename' and not id=$id");

//echo "<hr>���ݿ��� $typename �Ƿ�����";
if($db->affected()!=0)
{
    echo "<script>alert('���������ظ���������ٽ��в���');location.href='feedbackType.php'</script>";
    exit(); 
}

 
$sql="update feedBackType set
  typename='$typename',
  typeorder='$typeorder',
  typezt='$typezt' where id=$id
";


$isok=$db->sql($sql);


if($isok==1)
{
    echo "<script>alert('�޸ĳɹ�');location.href='feedbackType.php'</script>";
}
else
{
    echo "<script>alert('�޸�ʧ��');location.href='feedbackType.php';</script>";
}

//echo $sql;


?>
