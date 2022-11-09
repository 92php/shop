<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com

require "../public/init.php";
session_destroy();
$_SESSION=array();

webAlter("退出成功","$webdir");

?>
