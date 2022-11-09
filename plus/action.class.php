<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com
class action {
    //put your code here
    private $db;
    function __construct() {
        $this->db = new DbMysql();
    }
    
    //获取文章分类
    function getArticleType($tj='',$order='order by id desc',$limit=' limit 0,4'){
        $sql="select * from articleType ";
        $parm=" where 1 ".$tj.$order.$limit;
        $sql.=$parm;
      //   echo $sql; 
        return $this->db->select($sql);
    }
    
    //获取文章列表信息 
    function getArticle($tj='',$order='order by id desc',$limit=' limit 0,4'){
        $sql="select title,addtime,id from article";
        $parm=" where 1 ".$tj.$order.$limit;
        $sql.=$parm;
        //echo $sql;
        return $this->db->select($sql);
        
    }
    
    //友情链接
    function getLinks($tj='',$order=' order by id desc ',$limit=''){
           
        $sql="select * from links";
        $parm=" where 1 ".$tj;
        $sql.=$parm.$order.$limit;
        
       return $this->db->select($sql);
    }
    
    
    //获取分类
    function getProductType($tj=''){
        $sql="select typename,id from productList";
        $parm=" where 1 ".$tj;
        $sql.=$parm;
       // echo $sql;
        return $this->db->select($sql);
    }
    
    //获取商品
    function getProduct($zt,$limit){
        $sql="select id,title,price,yprice,picurl from product ";
        $parm=" where 1";
        switch ($zt) {
            case "1":
          $parm.=" and recommend='1' ";
                break;
            case "2":
          $parm.=" and hot='1' ";
                break;
            case "3":
          $parm.=" and drops='1' ";      
                break;            
            default:
                break;
        }
        $sql.=$parm." order by id desc limit 0,".$limit;
     
       return  $this->db->select($sql);
        
        
        
    }
    
    //当前位置
    function getWeizhi($ids,$lj=' > '){        
        global $webname,$webdir;
        $ids=explode("_", $ids);
        $menu="<a href='$webdir'>$webname</a>";
        foreach($ids as $k=>$v)
        {
            
            $typename=$this->db->select("select typename from productList where id='$v'",1);
            if(empty($typename))                continue;
            $menu.=$lj;
            $menu.="<A href='{$webdir}product/list.php?id=$v'>{$typename["typename"]}</a>";
            //echo ",";
        }
        return $menu;
    }
    //品牌信息
    function getPP($tj='',$limit=10){
        $sql="select * from productPP ";
        $parm=" where 1 ".$tj;
        $sql.=$parm." order by pporder limit 0,$limit";
        return $this->db->select($sql);
    }
    
}

?>
