<?php
require '../public/init.php'; 
$id=$_GET["id"];

$sql="select title,addtime from article where typeid='$id'";
$parm=" ";

$sql.=$parm." order by id desc ";

$db->sql($sql);

$infocount=$db->affected();
$pagesize=10;

$page = new page($infocount,$pagesize);
$sql.= $page->limit();
 
$listInfo=$db->select($sql);

//var_dump($listInfo);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link rel="stylesheet" rev="stylesheet" href="../css/base_v4.css" type="text/css"/>
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/aboutus.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <?php
   include WEBDIR.'/include/top.php';
?>
		 
		<div class="wrapper">
		  <!-- about_main start -->
		  <div class="about_main">
		    <div class="left_box">
		      <h2 class="h2_about_menu_title">关于我们</h2>
		      <div class="about_menu">
		        <ul class="ul_about_menu">
		     <?php
    
        $articleType=$action->getArticleType(' and leixing=\'文章动态\'','order by id');
    foreach($articleType as $rows){ 
        if($id==$rows["id"])
        {
        echo "<li class='now'><a href=\"{$webdir}article/?id={$rows["id"]}\">{$rows["typename"]}</a></li>";
    }else{
        echo "<li><a href=\"{$webdir}article/?id={$rows["id"]}\">{$rows["typename"]}</a></li>";
    }
    
    }
    ?>     
	            </ul>
	          </div>
	        </div>
		    <div class="right_box">
		      <h2 class="h2_rb_about_us">最新动态</h2>
		      <div class="right_box_cont">
		        <div class="news_list">
		          <ul class="ul_news_list">
                              <?php
                              if($listInfo){
                              foreach($listInfo as $rows)
                              {
                              ?>
		            <li><span><?php echo date("Y-m-d H:i:s",$rows["addtime"]); ?></span><a href=""><?php echo $rows["title"];?></a></li>
		             <?php
                              }
                              
                              }else{
                                  echo "暂无信息";
                              }
                             ?>
	              </ul>
	            </div>
		        <!-- aboutus_page start -->
		        <div class="aboutus_page">
		          <div id="pagination" class="page_turn"> <?php
                          echo $page->show(2);
                          ?></div>
	            </div>
		        <!-- aboutus_page end -->
	          </div>
	        </div>
	      </div>
		  <!-- about_main end -->
</div>
		<!-- footer -->
   
 <?php
   include WEBDIR.'/include/foot.php';
?>
	<!--content ok--><!-- OK -->

</body>
</html>
