 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $title;?>  - <?php echo $webname;?></title>
<link rel="stylesheet" rev="stylesheet" href="../css/base_v4.css" type="text/css">
<link rel="stylesheet" rev="stylesheet" type="text/css"  href="../css/main.css" />
<link rel="stylesheet" rev="stylesheet" href="../css/user_reg.css" type="text/css">
</head>
<body>
 	 <?php
   include WEBDIR.'/include/top.php';
?>
<div id="container">
		  <!-- member center start -->
		  <div class="u_content">
		    <div class="u_header u_m_bottom">
		      <h2>我的地盘</h2>
	        </div>
		    <div class="member">
		      		 	<!--会员中心菜单开始-->
              <?php
              include WEBDIR."/include/userLeft.php";
			  ?>
    		<!--会员中心菜单结束-->		
		      <div class="main">
		        <h2 class="title"><?php echo $title;?></h2>
		        <div class="member_box_2">
		          <p class="notice"><?php echo $info;?></p>
		          <p class="button"><a href="<?php echo $url;?>">返回</a></p>
	            </div>
	          </div>
		      <div style="clear:both;"></div>
	        </div>
	      </div>
		  <!-- member center end -->
</div>
		<!-- footer -->
		 

 <?php
   include WEBDIR.'/include/foot.php';
?>
 
 
	<!--content ok--><!-- OK -->

</body>
</html>
