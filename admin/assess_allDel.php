<?php
//����ɾ������
require_once 'islogin.php';
require_once '../Plus/DbMysqL.PHP';

$db = new DbMysql();
$id = @$_POST["id"];
if(count($id)==0)
{
    echo "<script>alert('��ѡ����Ҫɾ������Ϣ��');location.href='assess.php'</script>";
    exit();
}

foreach($id as $v)
{
    $sql = "delete from assess where id =$v";
    $db->sql($sql);
    if($db->affected()!=1)
    {
        echo "<script>alert('ɾ�������� $v ��������');location.href='assess.php'</script>";
    }    
}

echo "<script>alert('����ɾ���Ѿ��ɹ�');location.href='assess.php'</script>";

?>