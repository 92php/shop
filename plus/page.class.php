<?php

//��ӭ�տ��������Ƶ�̳� ���ǵ����������� www.houdunwang.com
class page {
     private $infoCount;   // ��Ϣ����
     private $pagesize;    // ÿҳ����
     private $pagecount;   // ��ҳ����
     private $currpage;    // ��ǰҳ��
     
     function __construct($ifcount,$pgsize,$pgcount=1,$cupage=1) {
         $this->infoCount=$ifcount;
         $this->pagesize=$pgsize;
         $this->pagecount=ceil($this->infoCount/$this->pagesize);
         $this->currpage=min($this->pagecount,max((int)@$_GET["page"],1));
     }
     
     function hello()
     {
         echo "��Ϣ����:";
         echo $this->infoCount;
         echo "ÿҳ��ʾ������";
         echo $this->pagesize;
//         echo "<br>";
//         echo $this->pagecount;
//         echo "<br>";
//         echo $this->currpage;
     }
     
     function showStyle($q=5,$h=5){
         $s="";
         $sID=$this->currpage-$q;
         $eID=$this->currpage+$h;
         
         if($sID<=1)
         {
             $eID=$eID+abs($sID-1)-1;
         }
         
         if($eID>=$this->pagecount){
             $sID=$sID-abs($this->pagecount-$eID)+1;
             $eID=$eID-abs($this->pagecount-$eID);
         }
         
         if($this->currpage>1)
         {
             $s.= "<a href='".$this->pageurl()."1'>��ҳ</a>";
             $s.="<a href='".$this->pageurl().($this->currpage-1)."'>��һҳ</a>";
         }else
         {
             $s.="<a>��ҳ</a><a>��һҳ</a>";
         }
         
         for($i=$sID;$i<=$eID;$i++)
         {
             if($i<1)  continue;
             if($i==$this->currpage)
             {
              $s.="<strong>$i</strong>";   
             }else{
              $s.="<A href='".$this->pageurl()."$i'>$i</a>";
                 }
         
         }
         
         if($this->currpage<$this->pagecount)
         {
             $s.="<A href='".$this->pageurl().($this->currpage+1)."'>��һҳ</a>";
             $s.="<A href='".$this->pageurl().$this->pagecount."'>ĩҳ</a>";
         }else
         {
                          $s.="<A>��һҳ</a>";
             $s.="<A>ĩҳ</a>";
         }
         if($this->infoCount>0)
         {
         return $s;
         } 
     }
     
     function show($b)
     {
        
         $s='';
         for($i=1;$i<=$this->pagecount;$i++)
         {
             if($i==$this->currpage)
             {
              $s.="<span style='color:#ff0000;font-weight:bold;'>$i</span>&nbsp;" ;
             }
             else
             {
                $s.="<a href='".$this->pageurl()."$i'>$i</a>&nbsp;";
             }
         }
         
        return "ҳ��: $s";
     }
     
     function limit()
     {
         return "limit ".($this->currpage-1)*$this->pagesize.",".$this->pagesize;
     }
     
     function pageurl() //��ǰҳ���URL��ַ
     {
         //return @$_GET["typeid"]; // �Ƚ�ԭʼ�ķ�����
         //return "article.php?typeid=";
     
         $url=isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING'];
         $request_arr=parse_url($url);
         
         if(isset($request_arr['query']))
         {
            // echo "�в���";
            parse_str($request_arr['query'], $arr);
            
            //ע�������е�ĳ��ֵ
            unset($arr['page']);
            
            //���µİ������ַ�������
             
             $url=$request_arr['path']."?".http_build_query($arr)."&page=";
         }
         else
         {
            // echo "û����";
             //����ҲҪ��һ����ַ�������
             $url=strstr($url, "?")?$url."page=":$url."?page=";
         }
         
         return $url;  
       
         
 
         
     }
    
          function pageurl2($dq) //��ǰҳ���URL��ַ
     {
         //return @$_GET["typeid"]; // �Ƚ�ԭʼ�ķ�����
         //return "article.php?typeid=";
     
         $url=isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING'];
         $request_arr=parse_url($url);
         
         if(isset($request_arr['query']))
         {
            // echo "�в���";
            parse_str($request_arr['query'], $arr);
            
            //ע�������е�ĳ��ֵ
            unset($arr['page']);
            unset($arr[$dq]);
            
            //���µİ������ַ�������
             
             $url=$request_arr['path']."?".http_build_query($arr)."&$dq=";
         }
         else
         {
            // echo "û����";
             //����ҲҪ��һ����ַ�������
             $url=strstr($url, "?")?$url."$dq=":$url."?$dq=";
         }
         
         return $url;  
       
         
 
         
     }
}

?>
