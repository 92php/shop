<?php
require 'public/init.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $title;?></title>
<style type="text/css">
body {
	background: #fff;
	font: 12px tahoma, arial, verdana, geneva, sans-serif;
	color: #333;
	text-align:left;
}

img{border:none;}
h2,h3{font-size:1em;margin:0; }
a{color:#333;text-decoration:none;}
a:hover{color:#c00;}

.header {
border-bottom:1px solid #333333;
height:75px;}
.header .help{
float:right;
padding:50px 25px 0 0;}

.baobao_hot{width:960px;overflow:hidden;background:url("images/bg_catalog.gif") repeat-x 0 0;margin:20px 0 0;padding:20px 0 10px;}
.h2_baobaohot{position:relative;color:#c00;height:30px;font-size:14px;}
.h2_baobaohot a.a_morehot{position:absolute;top:3px;right:3px;font-family:"宋体";width:70px;text-align:right;font-size:12px;font-weight:normal;text-decoration:none;}
.h2_baobaohot a.a_morehot:hover{text-decoration:underline;color:#c00;}
.ul_hotbaobao{padding:0;margin:0;width:1100px;list-style:none;overflow:hidden;zoom:1;}
.ul_hotbaobao li{float:left;width:192px;height:310px;}
.ul_hotbaobao img{padding:1px;border:1px solid #eaeaea;}
.ul_hotbaobao a:hover img{border:1px solid #ea7b5a;}
.ul_hotbaobao h3{font-weight:normal;line-height:1.8;padding:8px 10px 0 0; }
.ul_hotbaobao h3 a{text-decoration:none;}
.ul_hotbaobao h3 a:hover{color:#c00;text-decoration:underline;}
.ul_hotbaobao span{display:block;}
.ul_hotbaobao span.marketprice{color:#999;}
.ul_hotbaobao span.ourprice strong{color:#c00;}

.footer{
background:none repeat scroll 0 0 #1E1E1E;
clear:both;
color:#DDDDDD;
height:20px;
line-height:20px;
margin-top:25px;
text-align:center;}
</style>
</head>
<body>
 



<div style="width:960px;margin:0 auto;">

<div class="header">
		<span style="font-size: 14px; font-weight: bold;" class="help"><a target="_blank" href="">帮助</a></span>
		<div style="padding: 12px 0pt 0pt 15px;"><img alt="" src="<?php echo $webdir;?>images/logo.gif"></div>
</div>

	<div>
		<p style="padding-left:10px;margin:22px 0 10px;"><b><?php echo $info;?></b></p>

		<ul style="line-height:22px;list-style-type:none;list-style-position:outside;padding-left:10px;margin:0;">
                    <li><b>试试下面的方法吧：</b></li>
                        <li>1、检查网址是否正确。</li>
			<li>2、直接访问<a style="color: rgb(204, 0, 0);" href="<?php echo $webdir;?>"><?php echo $webname;?></a>首页。</li>
			<li>3、去其他地方逛逛。
				<ul style="list-style-type:none;list-style-position:outside;padding-left:15px;margin:0;">
				 
				</ul>
			</li>
		</ul>



	 



	</div>
	<div class="footer">后盾网商城系统 2010-2011</div><br>
</div>



 

</body>
</html>