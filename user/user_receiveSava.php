<?php

//��ӭ�տ��������Ƶ�̳� ���ǵ����������� www.houdunwang.com
require "../public/init.php";

//var_dump($_POST);

$action=$_REQUEST["action"];
$receive = new receive();
 
$title="�ջ���ַ";
$info="";
$url="user_receive.php";
switch ($action) {
    case "add":
        $infos=$_POST;        
        if($receive->receiveAdd($infos,$_SESSION["editOK"])){
             $info="��ӵ�ַ�ɹ�";
        }else
        {
            $info="��ӵ�ַʧ��";
        }
       
        break;
    case "edit":
         $infos=$_POST;    
        if($receive->receiveAdd($infos,$_SESSION["editOK"])){
             $info="�޸ĵ�ַ�ɹ�";
        }else
        {
            $info="�޸ĵ�ַʧ��";
        }
         
        break;
    case "del":
        $id=$_GET["id"];
        if($receive->receiveDel($id)){
            //webAlter('ɾ���ɹ�', '/');
            $info="ɾ���ɹ�";
        }else
        {
            
            $info="ɾ��ʧ��";
        }
        break;
    default:
        break;
}
 $_SESSION["editOK"]="notok";
 include "user_savaOK.php";
?>
