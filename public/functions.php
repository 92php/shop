<?php

//��ӭ�տ��������Ƶ�̳� ���ǵ����������� www.houdunwang.com

function weberror($title='����ҳ��',$info='���Ĳ���δ�ܳɹ���'){
    global $webdir,$webname;
    include WEBDIR."/error.php";
    exit;
}

function webAlter($title,$url){
    echo "<script>alert('$title');location.href='$url';</script>";
    exit;
}

//IP
function getIP(){
    return $_SERVER["REMOTE_ADDR"]; 
}
//�ַ�
function strLeft($str,$leng=10,$sl=''){

    $strleng=mb_strlen($str,"gb2312");
    if($strleng>$leng){
        return mb_substr($str, 0,$leng,"gb2312").$sl;
    }else{
        return $str;
    }
     
}


//�����ַ���
    function guolvStr($str){
            $str=trim($str);
       if(!get_magic_quotes_gpc())
     {
        $str=addslashes($str);
     }
      return htmlspecialchars($str);
        
    }


?>
