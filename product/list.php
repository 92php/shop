<?php
require "../public/init.php";
$id=$_GET["id"];


$sql="select * from productList where id='$id'";
$listInfo=$db->select($sql,1);
if(empty($listInfo))
{
    weberror();
}



$menu=$listInfo["idpath"]."_".$id;
$weizhi=$action->getWeizhi($listInfo["idpath"]."_".$id);
$xjid=$db->select("select id from productList where idpath like '%$menu%'");
$xjids=0;

 


foreach($xjid as $k=>$v)
{
  $xjids.=",".$v["id"];   
}

$tid=$listInfo["tid"];
if($tid!=0)
{
    //echo $listInfo["idpath"];
    $tids=explode("_", $listInfo["idpath"]);
    $tid=$tids[1];
}else
{
    $tid=$id;
}
 
    
//echo $xjids;
//
//var_dump($xjid);
$sql="select title,id,price,yprice,picurl from product";
$parm=" where 1";
$parm.=" and (typeid='$id' or typeid in($xjids))"; 



//条件增加

$attr=@$_GET["attr"];

switch ($attr) {
    case 1:
    $parm.=" hot='1' ";

        break;
   case 2:
        $parm.=" and recommend='1' ";
        break;
  case 3:
        $parm.=" and drops='1' ";
         break;
    default:
        $attr=0;
        break;
}

$sql.=$parm;

//排序方式

$order=@$_GET["order"];
switch ($order) {
    case 1:
      $sql.=" order by hits desc ";  
        break;
case 2:
   $sql.=" order by id desc ";
    break;
case 3:
    $sql.=" order by price desc ";
    break;
case 4:
    $sql.=" order by price ";
    break;
    default:
      $order=2;
     $sql.=" order by id desc ";
      break;
}




$db->sql($sql);
$infocount=$db->affected();
$pagesize=20;
$page = new page($infocount,$pagesize);
$sql.=$page->limit(); 
$result=$db->select($sql);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $listInfo["typename"];?> - <?php echo $webtitle;?></title>
<link rel="stylesheet" href="../css/base_v4.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="../css/global.css" media="all"/>
<link rel="stylesheet" type="text/css" href="../css/goods_list.css" media="all"/>
<meta content="" name="Keywords"/>
<meta content="" name="Description"/> 
<script type="text/javascript" src="<?php echo $webdir?>images/global.js"></script>
</head>
<body>
 <?php
   include WEBDIR.'/include/top.php';
?>

 	<div class="wrapper location" id="1002">您所在的位置：<?php echo $weizhi;?></div>
        
		<!-- 广告 -->
		<div id="1008">
		</div>

		<div class="wrapper clearfix">
			<div class="goods-side">
				<!-- 分类 -->
				<div class="category m-bottom">
                                    <?php
                               $type=$action->getProductType(" and tid='$tid'"); 
                
                                 foreach($type as $rows)
                                 {
                                     echo "<div class='cate-head'>{$rows["typename"]}</div>";
                                     echo "<div class='cate-body'>";
                                      $types=$action->getProductType(" and tid='{$rows["id"]}'");
                                      foreach($types as $rows)
                                      { 
                                          echo "<a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a>";
                                      }
                                     echo "</div>";
                                 }
                                    ?>
           
 
 
			 
				</div>
				<div class="side-gg" id="1004"> 
</div>
				 
			</div>
			<div class="goods-main">
				<!-- 商品列表 -->
				<div id="1009">
				</div>
				<div class="glist-head m-bottom" id="1005"><div class="glist-order">
<div class="g-h-txt">排序：</div>
<a href="<?php echo $page->pageurl2('order');?>1" class="order-but <?php if($order==1) echo "down"?>">关注</a><a href="<?php echo $page->pageurl2('order');?>2" class="order-but <?php if($order==2) echo "down"?>">新品</a><a href="<?php echo $page->pageurl2('order');?>3" class="order-but <?php if($order==3) echo "down"?><?php if($order==4) echo "up"?>">价格</a>
</div><div class="select-box" id="select-box">
<div class="cur-txt">按价格从低到高排序</div>
<ul class="select-list">
<li>
<a href="">按价格从低到高排序</a>
</li>
<li>
<a href="">按价格从高到低排序</a>
</li>
<li>
<a href="">按上架时间排序</a>
</li>
<li>
<a href="">按人气排序</a>
</li>
</ul>
</div><div class="glist-show-mode">
<div class="g-h-txt">
			查看：	
			</div>
<a href="<?php echo $page->pageurl2('attr');?>0" class="show-mode-but <?php if($attr==0) echo "cur";?>">全部</a><a href="<?php echo $page->pageurl2('attr');?>1" class="show-mode-but <?php if($attr==1) echo "cur";?>">热销</a><a href="<?php echo $page->pageurl2('attr');?>3" class="show-mode-but <?php if($attr==3) echo "cur";?>">降价</a><a href="<?php echo $page->pageurl2('attr');?>2" class="show-mode-but <?php if($attr==2) echo "cur";?>">推荐</a>
</div><div class="glist-count">
			找到
			<span class="red"><?php echo $infocount;?></span>个相关商品</div>
</div>

				<div class="goods-list-body" id="1006"><ul class="h-list h-list-ul-4">
 
   <?php
if($result){
 foreach($result as $rows)
 {
     echo "<li><div class=\"pic\">";
     echo "<A href='{$webdir}product/show.php?id={$rows["id"]}' target='_blank'><img src='{$rows["picurl"]}'  title='' height='145' width='145' /></a></div>";
     echo "<h3 class=\"bb-info\"><a target=\"_blank\" class=\"bb-info-a\" href='{$webdir}product/show.php?id={$rows["id"]}'>".strLeft($rows["title"],20,"...")."123</a><span class=\"mbb-p-title-a\">盾价:</span><strong class=\"mbb-price\">￥{$rows["price"]}</strong><s>￥{$rows["yprice"]}</s></h3></li>";
 }}else{
     echo "暂无数据";
 }
 ?>

</ul>
</div>
				<!-- 分页 -->
				<div class="m-pages">	
                         
                        <?php
                        echo $page->showStyle(); 
                         
                        ?>    
                      
</div>
			</div>
		</div>

	 
		 

		<!-- footer -->

<?php
   include WEBDIR.'/include/foot.php';
?> 
	<!--content ok--><!-- OK -->
 
</body>
</html>
