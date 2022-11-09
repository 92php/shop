<?php
//批量删除评论
require_once 'islogin.php';
require_once '../Plus/DbMysqL.PHP';

$db = new DbMysql();
$id = @$_POST["id"];
if(count($id)==0)
{
    echo "<script>alert('请选择你要删除的信息！');location.href='assess.php'</script>";
    exit();
}

foreach($id as $v)
{
    $sql = "delete from assess where id =$v";
    $db->sql($sql);
    if($db->affected()!=1)
    {
        echo "<script>alert('删除过程中 $v 发生错误');location.href='assess.php'</script>";
    }    
}

echo "<script>alert('批量删除已经成功');location.href='assess.php'</script>";

?>