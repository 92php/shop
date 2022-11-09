<?php
require '../public/init.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>品牌索引 - <?php echo $webtitle;?></title>
<link rel="stylesheet" href="../css/base_v4.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/global.css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/brands.css" media="all" />
</head>
<body>
 <?php
   include WEBDIR.'/include/top.php';
?>
		 
		<!-- header -->
		 

 	 	<div class="wrapper location">您所在的位置：<a href=""><?php echo $webname;?></a> &gt; <a href="pp.php">品牌索引</a></div>
 
		 
		<!-- 女包品牌 -->
		<div class="wrapper m-bottom ng-bar-2">
			<div id="b1004" style="height:20px;overflow:hidden;"> </div>
			<div class="floor-box" id="b1005"><div class="brand-list">
<div class="brand-wrap">
 <?php
$ppInfo=$action->getPP();
foreach($ppInfo as $rows)
{
    echo "<a class=\"b-item exc\" href='{$webdir}product/?ppid={$rows["id"]}'><img height=\"71\" width=\"111\" src='{$rows["picurl"]}' /><em>{$rows["ppname"]}</em></a>";
}
?>
 
</div>
</div></div>
		</div>
		<!-- 男包品牌 -->
		 
		<!-- 休闲/旅行/数码品牌 -->
		 

	 
<?php
   include WEBDIR.'/include/foot.php';
?>		 

		<!-- footer -->
		 
 

</body>
</html>
