<?php

//����ɾ����Ʒ

require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id=@$_POST["id"];

 
$idcount=count($id);

if($idcount==0)
{
    echo "<script>alert('��ѡ��Ҫɾ������Ϣ');location.href='product.php'</script>";
    exit();
}
 


$del = new DbMysql();

foreach($id as $v)
{
  // �������Ϣ
  $del->sql("select * from product where id=$v");
  $isok=$del->affected();
  if($isok!=1)
  {
      echo "<script>alert('�������');location.href='product.php'</script>";
      exit();
  }
    $sql="delete from product where id=".$v;
    $del->sql($sql);
}

echo "<script>alert('����ɾ�������ɹ�');location.href='product.php'</script>";

?>
