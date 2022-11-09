<?php

//É¾³ýÍ¼Æ¬
session_start();

$image_id = isset($_GET["id"])?$_GET["id"]:false;

if($image_id==false)
{
    echo "not id";
    exit();
}
else
{
 unlink($_SESSION["urlfile_info"][$image_id]);
 unset($_SESSION["urlfile_info"][$image_id]);
 unset($_SESSION["file_info"][$image_id]);
}
?>
