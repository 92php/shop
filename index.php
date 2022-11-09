<?php
require 'public/init.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $webtitle;?></title>
<link rel="stylesheet" rev="stylesheet" href="css/base_v4.css" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<meta content="<?php echo $webkey;?>" name="Keywords" /> 
<meta content="<?php echo $webDescription;?>" name="Description" /> 
</head>
<body>
<?php
   include WEBDIR.'/include/top.php';
?>

		

		<div class="wrapper m-bottom" id="1018"><div style="width:960px;height:70px;">
<a target="_blank" href=""><img alt="" src="Images/banner_s.jpg"></a>
</div>
</div>

		<!-- 焦点 -->
		<div class="wrapper m-bottom lazybox mbb-survey">
			 
			<div id="1001"><div class="banner-focus" id="js-index-banner">
<div class="focus-title">
<span title="抢福袋 99/199/299元3件" class="span-focus"><b>1</b><span class="span-bg"></span></span><span title=""大"女人新包宠" class="span-focus span-focus-now"><b>2</b><span class="span-bg"></span></span><span title="购梵贝斯品牌正价商品 即赠音乐家限量版拖鞋" class="span-focus"><b>3</b><span class="span-bg"></span></span><span title="男包让利 一年仅一次" class="span-focus"><b>4</b><span class="span-bg"></span></span> 
</div>
<div class="focusbanner" style="visibility: hidden;">
<a target="_blank" title="抢福袋 99/199/299元3件" href="http://www.houdunwang.com"><img src="Images/event_01.jpg" height="338" width="698"></a>
</div>
<div class="focusbanner" style="visibility: visible;">
<a target="_blank" title=""大"女人新包宠" href="http://www.houdunwang.com"><img alt=""大"女人新包宠" src="Images/lm_06.jpg" height="338" width="698"></a>
</div>
<div class="focusbanner" style="visibility: hidden;">
<a target="_blank" title="购梵贝斯品牌正价商品 即赠音乐家限量版拖鞋" href="http://www.houdunwang.com"><img alt="购梵贝斯品牌正价商品 即赠音乐家限量版拖鞋" src="Images/event_fbs_01.jpg" height="338" width="698"></a>
</div>
<div class="focusbanner" style="visibility: hidden;">
<a target="_blank" title="男包让利 一年仅一次" href="http://www.houdunwang.com"><img alt="男包让利 一年仅一次" src="Images/geb_02.jpg" height="338" width="698"></a>
</div>
 
</div>
</div>
			<div id="1002"><div class="news-tab m-bottom" id="news-tab">
<h2 class="news-tab-h2 tabnow">
<a href="#" class="news-tab-a">热门活动</a>
</h2>
<div style="visibility: visible;" class="news-box">
<ul class="ul-list-s2">
    <?php
    $list=$action->getArticle(' and typeid=10 ');
    foreach($list as $rows){
        echo "<li><a href=\"article/show.php?id={$rows["id"]}\" target=\"_blank\" class=\"ul-list-s1-a\">".strLeft($rows["title"],15,'...')."</a></li>";
    }
    ?>
</ul>
</div>
<h2 class="news-tab-h2 news-tab-2">
<a href="#" class="news-tab-a">最新动态</a>
</h2>
<div class="news-box" style="visibility: hidden">
<ul class="ul-list-s2">
    <?php
    $list=$action->getArticle(' and typeid=11 ');
    foreach($list as $rows){
        echo "<li><a href=\"article/show.php?id={$rows["id"]}\" target=\"_blank\" class=\"ul-list-s1-a\">".strLeft($rows["title"],15,'...')."</a></li>";
    }
    ?>
</ul>
</div>
</div><div class="gg-2 m-bottom">
<a target="_blank" href=""><img src="Images/header_1.png" title="越早越划算 时间就是金钱" height="88" width="248"></a>
</div><div class="gg-2">
<a target="_blank" href=""><img src="Images/header_2.png" title="积分8月" height="88" width="248"></a>
</div>
</div>
		</div>
		<!-- 热门分类 热门分类右侧 -->
 

		<!-- 广告1 -->
		<div class="gg-4 lazybox" id="1019"><a title="金鱼品牌上线" target="_blank" href=""><img src2="ad/2.jpg" src="Images/blank.png"></a>
</div>

 
		<!-- 2F -->
		<div class="wrapper m-bottom" id="1017"><div class="h-floor lazybox" id="hotbrand">
<div class="floor-title">
<h2>
<a target="_blank" class="f-t-pic" href="">热门品牌</a>
</h2>
<span class="f-t-plus"><a target="_blank" class="red" href="">更多品牌
									&gt;&gt;
								</a></span>
</div>
<div class="floor-box">
<div class="brand-list">
<div class="brand-wrap">
<?php
$ppInfo=$action->getPP(' and recommend=\'1\'');
foreach($ppInfo as $rows)
{
    echo "<a class=\"b-item exc\" href='{$webdir}product/?ppid={$rows["id"]}'><img height=\"48\" width=\"111\" src='".str_replace("../","",$rows["picurl"])."' /><em>{$rows["ppname"]}</em></a>";
}
?>

</div>
</div>
</div>
</div>
</div>
		 
		 
		 
		<div class="wrapper m-bottom lazybox" id="1008" goodspicsize="145"><div class="side-bb-2">
<a target="_blank" href=""><img src2="ad/1.jpg" src="Images/blank.png" title="魅力流苏 淑女可爱" height="452" width="280"></a>
</div><div class="bb-list-home">
<ul class="h-list h-list-ul">
 <?php
 $productList=$action->getProduct(1,8);
 
 foreach($productList as $rows)
 {
     echo "<li><div class=\"pic\">";
     echo "<A href='{$webdir}product/show.php?id={$rows["id"]}' target='_blank'><img src2='".str_replace("../","",$rows["picurl"])."' src='Images/blank.png' title='' height='145' width='145' /></a></div>";
     echo "<h3 class=\"bb-info\"><a target=\"_blank\" class=\"bb-info-a\" href='{$webdir}product/show.php?id={$rows["id"]}'>".strLeft($rows["title"],20,"...")."</a><span class=\"mbb-p-title-a\">盾价:</span><strong class=\"mbb-price\">￥{$rows["price"]}</strong><s>￥{$rows["yprice"]}</s></h3></li>";
 }
 ?>
</ul>
</div>
</div>

		<!-- 广告2 -->
		<div class="gg-4 lazybox" id="1020"><a title="精品包包鉴赏汇" target="_blank" href="ad2"><img src2="ad/2.jpg" src="Images/blank.png"></a>
</div>

		 

	 
 

		<!-- 6F -->
		<div class="wrapper m-bottom lazybox" id="1012"><div class="h-floor" id="bbdigital">
<div class="floor-title">
<h2>
<a target="_blank" class="f-t-pic" rel="nofollow">时尚数码</a>
</h2>
 
</div>
 
<ul class="h-list h-list-ul-2">
  <?php
 $productList=$action->getProduct(2,5);
 
 foreach($productList as $rows)
 {
     echo "<li><div class=\"pic\">";
     echo "<A href='{$webdir}product/show.php?id={$rows["id"]}' target='_blank'><img src2='".str_replace("../","",$rows["picurl"])."' src='Images/blank.png' title='' height='174' width='174' /></a></div>";
     echo "<h3 class=\"bb-info\"><a target=\"_blank\" class=\"bb-info-a\" href='{$webdir}product/show.php?id={$rows["id"]}'>".strLeft($rows["title"],20,"...")."</a><span class=\"mbb-p-title-a\">盾价:</span><strong class=\"mbb-price\">￥{$rows["price"]}</strong><s>￥{$rows["yprice"]}</s></h3></li>";
 }
 ?>
 

</ul>
</div>
</div>

		<!-- 本周特价 热门评论 -->
		<div class="wrapper m-bottom">
			<div id="1013"><div id="bbsale">
<div class="h-floor">
<div class="floor-title">
<h2>
<a target="_blank" class="f-t-pic">本周特价</a>
</h2>
</div>
</div>
<div class="floor-box sale-list">
<ul class="h-list h-list-ul-3 lazybox">
  <?php
 $productList=$action->getProduct(3,6);
 foreach($productList as $rows)
 {
     echo "<li><div class=\"pic\">";
     echo "<A href='{$webdir}product/show.php?id={$rows["id"]}' target='_blank'><img src2='".str_replace("../","",$rows["picurl"])."' src='Images/blank.png' title='' height='174' width='174' /></a></div>";
     echo "<h3 class=\"bb-info\"><a target=\"_blank\" class=\"bb-info-a\" href='{$webdir}product/show.php?id={$rows["id"]}'>".strLeft($rows["title"],20,"...")."</a><span class=\"mbb-p-title-a\">盾价:</span><strong class=\"mbb-price\">￥{$rows["price"]}</strong><s>￥{$rows["yprice"]}</s></h3></li>";
 }
 ?>

</ul>
</div>
</div>
</div>
			<div id="1014"><div id="hotcomment">
<div class="h-floor">
<div class="floor-title">
<h2>
<a target="_blank" class="f-t-pic" rel="nofollow">热门评论</a>
</h2>
</div>
</div>
<div class="floor-box comment-list lazybox">
<div class="item">
<div class="pic">
<a target="_blank" rel="nofollow" href=""><img src2="zs/纯棉！秋装新款！男装男士中长款水洗休闲修身单排扣翻领风衣.jpg" src="Images/blank.png" title="纯棉！秋装新款！男装男士中长款水洗休闲修身单排扣翻领风衣" class="comm-img" height="80" width="80"></a>
</div>
<div class="con">
<p class="info">
<strong class="fl">masuk</strong><span class="star star-5"></span>
</p>
<p class="c-con">
<a target="_blank" class="gray" rel="nofollow" href="">非常好看，跟照片没有色差，质量好！！！！！</a>
</p>
</div>
</div>
<div class="item">
<div class="pic">
<a target="_blank" rel="nofollow" href=""><img src2="zs/新款2011秋装女装加大码加肥显瘦MY595蕾丝娃娃衫长款上衣连衣裙.jpg" src="Images/blank.png" title="纯棉！秋装新款！男装男士中长款水洗休闲修身单排扣翻领风衣" class="comm-img" height="80" width="80"></a>
</div>
<div class="con">
<p class="info">
<strong class="fl">80470</strong><span class="star star-4"></span>
</p>
<p class="c-con">
<a target="_blank" class="gray" rel="nofollow" href="">很好 很好 很漂亮，跟图片一样的，而且正反两面是不一样的。。正面很大气，反面很...</a>
</p>
</div>
</div>
<div class="item">
<div class="pic">
<a target="_blank" rel="nofollow" href=""><img src2="zs/新款精品商务正装 长袖衬衫 条纹男士衬衫 抗皱免烫 时尚休闲.jpg" src="Images/blank.png" title="[浪美]青春米拉系列牛皮单肩包 肉粉色" class="comm-img" height="80" width="80"></a>
</div>
<div class="con">
<p class="info">
<strong class="fl">mengx</strong><span class="star star-5"></span>
</p>
<p class="c-con">
<a target="_blank" class="gray" rel="nofollow" href="">终于可以评价了，这款质量真的是超级好啊，发货速度特别快第二天就收到了...</a>
</p>
</div>
</div>
<div class="item">
<div class="pic">
<a target="_blank" rel="nofollow" href=""><img src2="zs/悠然大码女装2011秋装新款加大码2088翻领两穿假两件修身长袖衬衫.jpg" src="Images/blank.png" title="『米奇』  粉红色  斜挎包" class="comm-img" height="80" width="80"></a>
</div>
<div class="con">
<p class="info">
<strong class="fl">jill.</strong><span class="star star-5"></span>
</p>
<p class="c-con">
<a target="_blank" class="gray" rel="nofollow" href="">质量很好呢，布料非常不错，做工也很齐整，拉链拉锁都很精致。小口袋很多...</a>
</p>
</div>
</div>
<div class="item">
<div class="pic">
<a target="_blank" rel="nofollow" href=""><img src2="zs/胖mm 2011新款 加大码女装 高领蕾丝长袖打底衫 高品质T恤 秋装.jpg" src="Images/blank.png" title="[哈森]午夜奇葩系列时尚牛皮手提/斜挎包 咖啡色" class="comm-img" height="80" width="80"></a>
</div>
<div class="con">
<p class="info">
<strong class="fl">luozh</strong><span class="star star-5"></span>
</p>
<p class="c-con">
<a target="_blank" class="gray" rel="nofollow" href="">质量很好，我很满意，以后就在这个买东东了。</a>
</p>
</div>
</div>
</div>
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
