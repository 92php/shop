<!-- top -->
		<div class="top">
			<div id="1021"><div class="wrapper">
<div class="top-fav">
    <a   href="javascript:addFavorite('http://<?php echo $weburl;?>','<?php echo $webname;?>');">收藏商城</a>
</div>
<div class="top-tel">
<span class="fl">订购热线：</span><strong class="top-tel-num"><?php echo $webtel;?></strong>
</div>
<div class="top-mobile">
 
</div>
<ul class="top-my-link">
<li class="top-my-mbb">
<a target="_blank" href="">快速导航</a>
<ul class="top-my-nav">
<li>
<a target="_blank" href="">我的收藏</a>
</li>
<li>
<a target="_blank" href="">我的积分</a>
</li>
</ul>
</li>
<li class="top-my-order">
<a target="_blank" href="">我的订单</a>
</li>
<li class="top-map">
<a target="_blank" href="">网站导航</a>
</li>
</ul>
                                <?php
                                if(!ISLOGIN){
                                ?>
<div   id="dom_top_welcome_unlogin" class="top-login">
<span class="gray">您好,欢迎光临商城!</span>[<a class="a-login" id="login-path" href="<?php echo $webdir;?>user/user_login.php">登 录</a>/<a class="a-register" href="<?php echo $webdir;?>user/user_login.php">注 册</a>]</div>
<?php
                                }else{
?><div   id="dom_top_welcome_logined" class="top-login">您好，<a href="<?php echo $webdir;?>user/user_main.php" id="dom_i_link"><?php echo UID;?></a> [<a href="<?php echo $webdir;?>user/loginOut.php" class="a-logout">退出登录</a>]</div>
<?php
                                }
?>
</div>
</div>
		</div>

		<!-- header -->
<div class="header">
 
			 <div class="wrapper clearfix">
<h1 class="header-logo">
<a href="<?php echo $webdir;?>" class="header-logo-a"><img src="<?php echo $webdir;?>Images/sprite_header_footer.png" alt=""></a>
</h1>
 <img src="Images/mbaobao.gif" class="fl" height="1" width="1">
<div class="header-search">
    <form action="<?php echo $webdir?>product/" class="header-search-form">
<input maxlength="50" autocomplete="off" value="<?php echo $sk;?>" class="header-search-input" name="k" id="input_goods_search_keyword" type="text"><input value="搜索" class="header-search-but" type="submit">
</form>
<div class="hot-keywords">
<strong>热门搜索词：</strong><a href=''>培训</a> <a href=''>光盘发售</a>
</div>
</div>
</div><div class="main-nav">
<ul class="main-nav-l">
<li class="m-n-i">
    <a href="<?php echo $webdir;?>" class="main-nav-a main-nav-1">首页</a>
</li>
<li class="m-n-i">
    <a href="<?php echo $webdir;?>product/list.php?id=1" class="main-nav-a main-nav-2">女装</a>
<div class="sub-nav">
<div class="sub-nav-wrap">
    <?php
      $menu = $action->getProductType(" and tid='1'");
      foreach($menu as $rows){
       echo "<dl>";
        echo "<dt><a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a></dt>";
        echo "<dd>";
           $menus=$action->getProductType(" and tid='{$rows["id"]}'");
           foreach($menus as $rows){
               echo "<a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a>";
           }
        echo "</d>";
       echo "</dl>";
      }
    ?>
</div>
<div class="sub-link">
<a rel="nofollow" target="_blank" href="">热销商品</a><a rel="nofollow" target="_blank" href="">降价商品</a>
<a href="">推荐商品</a>
</div>
</div>
</li>
<li class="m-n-i">
<a href="<?php echo $webdir;?>product/list.php?id=2" class="main-nav-a main-nav-3">男装</a>
 <div class="sub-nav">
<div class="sub-nav-wrap">
     <?php
      $menu = $action->getProductType(" and tid='2'");
      foreach($menu as $rows){
       echo "<dl>";
        echo "<dt><a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a></dt>";
        echo "<dd>";
           $menus=$action->getProductType(" and tid='{$rows["id"]}'");
           foreach($menus as $rows){
               echo "<a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a>";
           }
        echo "</d>";
       echo "</dl>";
      }
    ?>
 
</div>
<div class="sub-link">
<a rel="nofollow" target="_blank" href="">热销商品</a><a rel="nofollow" target="_blank" href="">降价商品</a>
<a href="">推荐商品</a>
</div>
</div>
</li>
<li class="m-n-i">
<a href="<?php echo $webdir;?>product/list.php?id=3" class="main-nav-a main-nav-4">靴子</a>
 <div class="sub-nav">
<div class="sub-nav-wrap">
    <?php
      $menu = $action->getProductType(" and tid='3'");
      foreach($menu as $rows){
       echo "<dl>";
        echo "<dt><a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a></dt>";
        echo "<dd>";
           $menus=$action->getProductType(" and tid='{$rows["id"]}'");
           foreach($menus as $rows){
               echo "<a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a>";
           }
        echo "</d>";
       echo "</dl>";
      }
    ?>
 
</div>
<div class="sub-link">
<a rel="nofollow" target="_blank" href="">热销商品</a><a rel="nofollow" target="_blank" href="">降价商品</a>
<a href="">推荐商品</a>
</div>
</div>
</li>
<li class="m-n-i">
<a href="<?php echo $webdir;?>product/list.php?id=4" class="main-nav-a main-nav-6">时尚饰品</a>
<div class="sub-nav">
<div class="sub-nav-wrap">
    <?php
      $menu = $action->getProductType(" and tid='4'");
      foreach($menu as $rows){
       echo "<dl>";
        echo "<dt><a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a></dt>";
        echo "<dd>";
           $menus=$action->getProductType(" and tid='{$rows["id"]}'");
           foreach($menus as $rows){
               echo "<a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a>";
           }
        echo "</d>";
       echo "</dl>";
      }
    ?>
 
</div>
<div class="sub-link">
<a rel="nofollow" target="_blank" href="">热销商品</a><a rel="nofollow" target="_blank" href="">降价商品</a>
<a href="">推荐商品</a>
</div>
</div>
</li>
<li class="m-n-i">
<a href="<?php echo $webdir;?>product/list.php?id=5" class="main-nav-a main-nav-7">家具饰品</a>
<div class="sub-nav sub-nav-r1">
<div class="sub-nav-wrap">
    <?php
      $menu = $action->getProductType(" and tid='5'");
      foreach($menu as $rows){
       echo "<dl>";
        echo "<dt><a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a></dt>";
        echo "<dd>";
           $menus=$action->getProductType(" and tid='{$rows["id"]}'");
           foreach($menus as $rows){
               echo "<a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a>";
           }
        echo "</d>";
       echo "</dl>";
      }
    ?>
 
</div>
<div class="sub-link">
<a rel="nofollow" target="_blank" href="">热销商品</a><a rel="nofollow" target="_blank" href="">降价商品</a>
<a href="">推荐商品</a>
</div>
</div>
</li>
<li class="m-n-i">
<a href="<?php echo $webdir;?>product/list.php?id=6" class="main-nav-a main-nav-8">时尚数码</a>
<div class="sub-nav sub-nav-r2">
<div class="sub-nav-wrap">
    <?php
      $menu = $action->getProductType(" and tid='6'");
      foreach($menu as $rows){
       echo "<dl>";
        echo "<dt><a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a></dt>";
        echo "<dd>";
           $menus=$action->getProductType(" and tid='{$rows["id"]}'");
           foreach($menus as $rows){
               echo "<a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a>";
           }
        echo "</d>";
       echo "</dl>";
      }
    ?>
 
</div>
<div class="sub-link">
<a rel="nofollow" target="_blank" href="">热销商品</a><a rel="nofollow" target="_blank" href="">降价商品</a>
<a href="">推荐商品</a>
</div>
</div>
</li>
</ul>
<ul class="main-nav-r">

</ul>
</div><div class="header-bar">
<div class="top-notice">
<span>公告：</span>最新发布的一则公告显示到这里来 
</div>
<div class="head-quickbuy">
    <a target="_blank" href="<?php echo $webdir?>cart.php" class="head-quickbuy-a">购物车中有<strong class="head-quickbuy-num" id="js_cart_goods_number">0</strong>件商品</a>
<div class="head-quickbuy-detail" id="top_cart_goods_list"></div>
</div>
</div>
 
</div>