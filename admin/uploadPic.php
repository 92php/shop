<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
<style>
body{

	margin:0px;
	pading:0px;
	font-size:14px;
	}
</style>
</head>

<body>
    <?php
    if(@$_GET["action"]=="sava")
    {
        //1�������ж�һ���ǲ�����Ч�ļ�
            if(!is_uploaded_file($_FILES["upfile"]["tmp_name"]))
            {
             echo "<script>alert('��ѡ����������ͼ�ļ�');location.href='uploadpic.php';</script>";
             exit(0);
            }
        $file=$_FILES["upfile"];
        $savadir="../upload/"; 
        $isoktype=array(
            "image/jpeg","image/gif","image/pjpeg"
        );
        $isoksize=102400; //�����ϴ��Ĵ�С
        //2���ж��ļ���ʽ
        if(!in_array($file["type"],$isoktype))
        {
            echo "<script>alert('������ĸ�ʽ');location.href='uploadpic.php'</script>";
            exit(0);
        }
        
        //3���ж�ͼƬ��С
        if($isoksize<$file["size"])
        {
            echo "<script>alert('�ļ�����');location.href='uploadpic.php'</script>";
            exit(0);
        }   
        
        //4��ˮӡ
        //5������ͼ
        
$exe=substr($file["name"],  (stripos($file["name"],".")+1));               
        
$newname=time();
$newname.=rand()*1000;
//echo $newname;
//echo $exe;
//
//exit;
        //ִ�б������
        move_uploaded_file($file["tmp_name"],$savadir.$newname.".".$exe);
        $picurl=$savadir.$newname.".".$exe;
        echo "�ϴ��ɹ� <a href='uploadPic.php'>�����ϴ�</a>";
        //JS�ѵõ��ĵ�ַ��ֵ�����ǵ�FORM�����PICURL
        echo "<script>parent.document.admin.picurl.value='$picurl';</script>";
    }
    else{
    ?>
<form action="?action=sava" method="post"  enctype="multipart/form-data">
<input name="upfile" type="file" /> <input name="" type="submit" value="�ϴ�" />
</form>
    <?php
    }
    ?>
</body>
</html>