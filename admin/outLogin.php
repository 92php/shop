<?php
//后台退出登陆处理

session_start();
session_destroy();
echo "<script>top.location.href='login.php'</script>";

?>