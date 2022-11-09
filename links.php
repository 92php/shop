<?php
require 'public/init.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>友情链接 - <?php echo $webtitle;?></title>
<link rel="stylesheet" rev="stylesheet" href="css/base_v4.css" type="text/css"/>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/aboutus.css" rel="stylesheet" type="text/css" />
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
                            $list=$action->getArticle(' and typeid=9 ',' order by id ');
    foreach($list as $rows){
 
 
        echo "<li><a href=\"{$webdir}about/?id={$rows["id"]}\">{$rows["title"]}</a></li>";
 
    
    }
                            ?>
		          <li class="now"><a>友情链接</a></li>
	            </ul>
	          </div>
	        </div>
		    <div class="right_box">
		      <h2 class="h2_rb_about_us">友情链接</h2>
		      <div class="right_box_cont rb_links_cont">
		        <div class="pic_links">
		          <h3 class="h3_links_title">图片链接</h3>
                  
		          <ul class="ul_pic_links">
                              <?php
                                $links=$action->getLinks(" and styleid=1");
                              foreach($links as $rows)
                              {
                                   
                                  echo "<li><A href=\"{$rows["weburl"]}\" target=\"_blank\"><img src=\"{$rows["logourl"]}\" alt=\"{$rows["webname"]}\"  height=\"30\" width=\"88\"/></a></li>";
                              }
                              ?>
		            
		            
	              </ul>
	            </div>
		        <div class="txt_links">
		          <h3 class="h3_links_title">文字链接</h3>
		          <ul class="ul_pic_links">
		         <?php
                                $links=$action->getLinks(" and styleid=2");
                              foreach($links as $rows)
                              {
                                  
                                  echo "<li><A href=\"{$rows["weburl"]}\" target=\"_blank\">{$rows["webname"]}</a></li>";
                              }
                              ?>
		             
	              </ul>
	            </div>
		        <div class="link_desc">
		          <h3 class="h3_links_title">链接说明</h3>
		          <div class="link_desc_cont">  
		  
		            <ul class="ul_link_info">
		              <li> &middot;LOGO（88&times;30像素）或要链接的文字，链接指定的URL，以及您认为必要的其他资料。</li>
		              <li> &middot;并请在贵网站适当位置加入下列HTML链接代码（显示结果如图例为88&times;30像素大小Logo标示）
		                <textarea name="textarea" cols="20" rows="4" style="width: 700px;" onclick="this.select()">&lt;a
 href=&quot;http://www.houdunwnag.com&quot;&gt;&lt;img 
src=&quot;images/logoLinks.gif&quot; border=&quot;0&quot; 
alt=&quot;后盾网商城！&quot;/&gt;&lt;/a&gt;</textarea>
	                  </li>
	                </ul>
		            <div class="example">
		              <p class="pic_example"><strong>图例：</strong><img src="images/logoLinks.gif" alt="" height="30" width="88" /></p>
		              <p><strong>文字链接：</strong><br />
		                链接文字：后盾网 ( http://www.houdunwang.com )</p>
	                </div>
	              </div>
	            </div>
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
