<?php
//�ж��Ƿ��½
session_start();

if(empty ($_SESSION["username"]))
    {
       echo "<script>alert('����ȷ��½��̨����ϵͳ');top.location.href='login.php'</script>";
       exit;
    }

?>
