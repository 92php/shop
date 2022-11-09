<?php
require '../public/init.php'; 
$id=$_GET["id"];
$info=$db->select("select * from article inner join articleType on article.typeid=articleType.id  where article.id='$id' and articleType.leixing='帮助中心'",1);
if(empty($info))
{
    weberror();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $info["title"]." - ".$info["typename"]." - ".$webtitle;?></title>
<link rel="stylesheet" rev="stylesheet" href="../css/base_v4.css" type="text/css"/>
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/help.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php
   include WEBDIR.'/include/top.php';
?>
	 <div class="wrapper">
	<!-- member center start -->
	<div class="member_container">
	<div class="helpcenter_title"></div>
	<div class="member helpcenter">
		<div class="menu">
			<div class="box">
				<!-- 会员中心菜单 开始 -->
                             <?php
    
        $articleType=$action->getArticleType(' and leixing=\'帮助中心\'','order by id');
        $i=1;
        foreach($articleType as $rows)
        {   $i++;
           
            echo "<dl>";
            echo "<dt>{$rows["typename"]}</dt>";
            
                  $list=$action->getArticle(" and typeid='{$rows["id"]}'",' order by id ');
            foreach($list as $rows){
                if($id==$rows["id"]){
                 echo "<dd class=\"current\"><a href=\"{$webdir}help/?id={$rows["id"]}\">{$rows["title"]}</a></dd>";
            }else{
                echo "<dd><a href=\"{$webdir}help/?id={$rows["id"]}\">{$rows["title"]}</a></dd>";
            }
                
            }
            
            echo "</dl>";
        }
    ?>     
	 
				<div class="div_help_left_service">
            		<h3 class="h3_contact">联系客服</h3>
                    <p class="p_tel_number">热线：<strong style="color:#cc0000">15220187909</strong></p>
                    <a href="" target="_blank" class="a_gomessage">在线客服</a>
            	</div>
				<!-- 会员中心菜单 结束 -->

			</div>
			<div style="clear:both;"></div>
		</div>
		<div class="helpcontent">
			<h2 class="title"><?php echo $info["title"];?></h2>
			<div class="content"> <?php echo $info["content"];?></div>
		</div>
		<div style="clear:both;"></div>
	</div>
	</div>
	<!-- member center end -->
	</div>
		<!-- footer -->
	<!--content ok--><!-- OK -->
 <?php
   include WEBDIR.'/include/foot.php';
?>
</body>
</html>
