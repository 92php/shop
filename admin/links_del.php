<?php
//????ɾ??????
 require_once 'islogin.php';
 require_once '../plus/DbMysql.php';
 $id=$_GET["id"];
 
 $del = new DbMysql();
 $isok=$del->sql("delete from links where id=$id");
 if($isok==1)
 {
     echo "<script>alert('ɾ???ɹ?');location.href='links.php'</script>";
 }
 else
 {
     echo "<script>alert('ɾ??ʧ??');location.href='links.php'</script>";
 }
 
?>
