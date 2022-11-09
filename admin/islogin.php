<?php
//判断是否登陆
session_start();

if(empty ($_SESSION["username"]))
    {
       echo "<script>alert('请正确登陆后台管理系统');top.location.href='login.php'</script>";
       exit;
    }

?>
