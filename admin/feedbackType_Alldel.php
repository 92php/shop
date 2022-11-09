<?php

//留言分类批量删除

require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$db= new DbMysql();
$id=@$_POST["id"];

if(count($id)==0)
{
    echo "<script>alert('请选择要删除的信息');location.href='feedbackType.php'</script>";
    exit();
}

foreach ($id as $v)
{
    $sql="delete from feedbackType where id=$v";
    
     $db->sql($sql);
     
     if($db->affected()!=1)
     {
         echo "<Script>alert('批量删除失败,ID:$v');location.href='feedbackType.php';</script>";
         exit();
     }
}

echo "<script>alert('批量删除成功');location.href='feedbackType.php'</script>";



?>
