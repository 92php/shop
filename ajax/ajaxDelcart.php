<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com
require "../public/init.php";
$id=$_POST["id"];
 
$cart = new cart();

if($cart->delCart($id))
{
    echo 1;
}else
{
    echo 0;
}

?>
