<?php
//��Ʒ�޸ı��洦��
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
require_once '../plus/maig.class.php';

$maig = new maig();
$sava = new DbMysql();

$id = $_GET["id"];
$result = $sava->select("select * from product where id=$id",1);

$picurlArray = array_filter(explode("#",$result["picurls"]));
$piccount = count($picurlArray);

$newpicurls = '';
foreach($picurlArray as $key=>$v)
{
    $picinfo = explode("@",$v);
    if(isset($_POST["editimginfo".$key]))
    {
        $newpicurls.=$_POST["editimginfo".$key]."@";
        $newpicurls.=$picinfo["1"];
        $newpicurls.="#";
           //echo "�����INPUT ��ʾͼƬû��ɾ��";
           //echo "<hr>"; 
    }
    else
    {
           //echo "unlink $picinfo[1]";
           //echo $v;
           //echo "û�����input��ʾͼƬ��ɾ����";
           //echo "<hr>"; 
    }

}

$picurls = "";
foreach($_SESSION["urlfile_info"] as $row=>$v)
{
     
    
    $picurls.=$_POST["picinfook".$row]."@".$v;
    $picurls.="#";
     
}
 
$title     = $maig->str($_POST["title"]);
$numbers   = $_POST["numbers"];
$typeid    = $_POST["typeid"];
$hot       = empty($_POST["hot"])?0:$_POST["hot"];
$drops     = empty($_POST["drop"])?0:$_POST["drop"];
$recommend = empty($_POST["recommend"])?0:$_POST["recommend"];
$kucun     = $_POST["kucun"];
$hits      = $_POST["hits"];
$picurl    = $_POST["picurl"];
$content   = $_POST["content"];
$ppid      = $_POST["ppid"];

$isok=$sava->sql("update product set title='$title',numbers='$numbers',typeid='$typeid',ppid='$ppid',hot='$hot',drops='$drops',recommend='$recommend',kucun='$kucun',hits='$hits',picurl='$picurl',content='$content',picurls='$newpicurls$picurls' where id=$id" );

if($isok==1)
{
    echo "<script>alert('�޸ĳɹ�');location.href='product.php'</script>";
}
else
{
    echo "<script>alert('�޸�ʧ��');location.href='product.php';</script>";
}
?>