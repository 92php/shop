<?php
//�����ļ���
class config {

    function configUp()
    {
        $db= new DbMysql();
        $result=$db->select("select * from webconfig");
        $filename="../config/config.php";
        if(file_exists($filename))
        {  
            //�еû����Ϳ�ʼ���ļ����в���
            //д��
            $ft=fopen($filename, "w");
            flock($ft, 3);
            fwrite($ft, "<?php\r\n");
            foreach($result as $row)
            { 
                fwrite($ft, "$".$row["varname"]."='".$row["varvalue"]);
                fwrite($ft, "';\r\n");
            }
            fwrite($ft, "?>");
            fclose($ft);   
        }
        else
        {    
            file_put_contents($filename,"");
        }
    }
}

?>