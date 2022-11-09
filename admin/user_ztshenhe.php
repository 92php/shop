<?php

//会员批量审核
require_once 'islogin.php';
require_once '../Plus/DbMysql.php';

$db = new DbMysql();
//如何的判断 现在要执行什么状态的更新

$zt=$_POST["zt"];
$id=@$_POST["id"];

if(count($id)==0)
    {
       echo "<script>alert('没有选择要修改的信息,请进行选择');location.href='user.php'</script>";
       exit();       
    }

foreach($id as $v)
{
    $sql="update user set zt='$zt' where id=$v";
    $isok=$db->sql($sql);
     if($isok!=1)
     {
         echo "<script>alert('修改出现错误');location.href='user.php'</script>";
     }
}

echo "<script>alert('批量更改状态成功');location.href='user.php';</script>";
?>
