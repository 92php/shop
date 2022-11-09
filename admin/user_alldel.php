<?php

//批量删除会员
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id=@$_POST["id"];

if(count($id)<1)
{
    echo "<script>alert('请选择一个要删除的用户信息');location.href='user.php';</script>";
    exit;
}

$del = new DbMysql();

foreach ($id as $v)
{
   $sql="delete from user where id=$v";
   $isok=$del->sql($sql);
   if($isok!=1)
   {
       echo "出现错误ID：$v";
       exit;
   }
}

echo "<script>alert('批量删除成功!!');location.href='user.php';</script>";

?>
