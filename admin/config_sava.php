<?php
//更新配置文件处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
require_once '../plus/config.class.php';

$sava= new DbMysql();

$result=$sava->select("select * from webconfig");

foreach ($result as $row)
{
    $sql="update webconfig set varvalue='".$_POST[$row["varname"]]."' where varname='".$row["varname"]."'";
   
    $isok=$sava->sql($sql);
//    echo $isok;
//    echo "<br>";
}

$config = new config();

$config->configUp();

echo "<script>alert('修改完成');location.href='config.php'</script>";

 

?>
