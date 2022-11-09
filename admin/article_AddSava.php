<?php

//后台文章添加保存处理
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
require_once '../plus/maig.class.php';
$mag=new maig();
$add=new DbMysql(); 

$title=$mag->str($_POST['title']);
$typeid =$mag->str($_POST["typeid"]);
$author=$mag->str($_POST["author"]);
$com = $mag->str($_POST["com"]);
$hits=$mag->str($_POST["hits"]);
$content=$_POST["content"];
$inputer=$_SESSION["username"]; //当前登录的管理员 信息录入员
$time=time();

 
 
 $add->sql("insert into article(title,typeid,author,com,hits,content,inputer,addtime) values('$title','$typeid','$author','$com','$hits','$content','$inputer','$time')");
 $isok=$add->affected();

  if($isok==1)
  {
      echo "<script>alert('文章添加成功');location.href='article.php'</script>";
  }
  else
  {
      echo "<script>alert('文章添加失败');location.href='article.php'</script>";
  }
?>
