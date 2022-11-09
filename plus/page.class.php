<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com
class page {
     private $infoCount;   // 信息总数
     private $pagesize;    // 每页数量
     private $pagecount;   // 总页数量
     private $currpage;    // 当前页面
     
     function __construct($ifcount,$pgsize,$pgcount=1,$cupage=1) {
         $this->infoCount=$ifcount;
         $this->pagesize=$pgsize;
         $this->pagecount=ceil($this->infoCount/$this->pagesize);
         $this->currpage=min($this->pagecount,max((int)@$_GET["page"],1));
     }
     
     function hello()
     {
         echo "信息总数:";
         echo $this->infoCount;
         echo "每页显示数量：";
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
             $s.= "<a href='".$this->pageurl()."1'>首页</a>";
             $s.="<a href='".$this->pageurl().($this->currpage-1)."'>上一页</a>";
         }else
         {
             $s.="<a>首页</a><a>上一页</a>";
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
             $s.="<A href='".$this->pageurl().($this->currpage+1)."'>下一页</a>";
             $s.="<A href='".$this->pageurl().$this->pagecount."'>末页</a>";
         }else
         {
                          $s.="<A>下一页</a>";
             $s.="<A>末页</a>";
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
         
        return "页码: $s";
     }
     
     function limit()
     {
         return "limit ".($this->currpage-1)*$this->pagesize.",".$this->pagesize;
     }
     
     function pageurl() //当前页面的URL地址
     {
         //return @$_GET["typeid"]; // 比较原始的方法。
         //return "article.php?typeid=";
     
         $url=isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING'];
         $request_arr=parse_url($url);
         
         if(isset($request_arr['query']))
         {
            // echo "有参数";
            parse_str($request_arr['query'], $arr);
            
            //注销掉其中的某个值
            unset($arr['page']);
            
            //重新的把这个网址组合起来
             
             $url=$request_arr['path']."?".http_build_query($arr)."&page=";
         }
         else
         {
            // echo "没参数";
             //咱们也要给一个网址组合起来
             $url=strstr($url, "?")?$url."page=":$url."?page=";
         }
         
         return $url;  
       
         
 
         
     }
    
          function pageurl2($dq) //当前页面的URL地址
     {
         //return @$_GET["typeid"]; // 比较原始的方法。
         //return "article.php?typeid=";
     
         $url=isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING'];
         $request_arr=parse_url($url);
         
         if(isset($request_arr['query']))
         {
            // echo "有参数";
            parse_str($request_arr['query'], $arr);
            
            //注销掉其中的某个值
            unset($arr['page']);
            unset($arr[$dq]);
            
            //重新的把这个网址组合起来
             
             $url=$request_arr['path']."?".http_build_query($arr)."&$dq=";
         }
         else
         {
            // echo "没参数";
             //咱们也要给一个网址组合起来
             $url=strstr($url, "?")?$url."$dq=":$url."?$dq=";
         }
         
         return $url;  
       
         
 
         
     }
}

?>
