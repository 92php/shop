<?php

//��̨���±༭���洦��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
require_once '../plus/maig.class.php';
$mag=new maig();
$edit=new DbMysql(); 
$id=$_GET["id"];
$title=$mag->str($_POST['title']);
$typeid =$mag->str($_POST["typeid"]);
$author=$mag->str($_POST["author"]);
$com = $mag->str($_POST["com"]);
$hits=$mag->str($_POST["hits"]);
$content=$_POST["content"];
$inputer=$_SESSION["username"]; //��ǰ��¼�Ĺ���Ա ��Ϣ¼��Ա
$time=time();


$isok=$edit->sql("update article set title='$title',typeid='$typeid',author='$author',com='$com',hits='$hits',content='$content' where id=$id");


if($isok==1)
{
    echo "<script>alert('�����޸ĳɹ�');location.href='article.php'</script>";
}
else
{
    echo "<script>alert('�����޸�ʧ��');location.href='article.php'</script>";
}

?>