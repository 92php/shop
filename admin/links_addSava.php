<?php
//������ӱ��洦��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$fifel   = $_FILES["logourl"]; 
$webname = $_POST["webname"];
$weburl  = $_POST["weburl"];
$styleid = $_POST["styleid"];
$intro   = $_POST["intro"];
$time    = time();
$ftype   = $fifel["type"];
$fsize   = $fifel["size"];

if($styleid==1){

if(($ftype=="image/gif"||$ftype=="image/jpeg"||$ftype=="image/pjpeg") && $fsize<102400)
{   
    move_uploaded_file($fifel["tmp_name"], "../upload/".$fifel["name"]);
    $logourl="upload/".$fifel["name"];
}
else
{
    echo "<script>alert('LOGO�ļ����Ϸ�');location.href='links.php'</script>";
    exit;
}
}
else
{
    $logourl="�ı�����";
}

// �ж�һ���ļ��ĸ�ʽ����׺          jpg gif
// �ж�һ�´�С���ϲ��������ǵ�Ҫ�� 300KB

$add= new DbMysql();
$isok=$add->sql("insert into links(webname,weburl,styleid,logourl,addtime,intro) values('$webname','$weburl','$styleid','$logourl','$time','$intro')");
if($isok==1)
{
    echo "<script>alert('����������ӳɹ�');location.href='links.php'</script>";
}
else
{
    echo "<script>alert('���ʧ��');location.href='links.php'</script>";
}
?>
