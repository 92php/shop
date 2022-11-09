<?php
//Á´½ÓÉ¾³ý´¦Àí
 require_once 'islogin.php';
 require_once '../plus/DbMysql.php';
 $id=$_GET["id"];
 
 $del = new DbMysql();
 $isok=$del->sql("delete from links where id=$id");
 if($isok==1)
 {
     echo "<script>alert('É¾³ý³É¹¦');location.href='links.php'</script>";
 }
 else
 {
     echo "<script>alert('É¾³ýÊ§°Ü');location.href='links.php'</script>";
 }
 
?>
