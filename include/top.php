<!-- top -->
		<div class="top">
			<div id="1021"><div class="wrapper">
<div class="top-fav">
    <a   href="javascript:addFavorite('http://<?php echo $weburl;?>','<?php echo $webname;?>');">�ղ��̳�</a>
</div>
<div class="top-tel">
<span class="fl">�������ߣ�</span><strong class="top-tel-num"><?php echo $webtel;?></strong>
</div>
<div class="top-mobile">
 
</div>
<ul class="top-my-link">
<li class="top-my-mbb">
<a target="_blank" href="">���ٵ���</a>
<ul class="top-my-nav">
<li>
<a target="_blank" href="">�ҵ��ղ�</a>
</li>
<li>
<a target="_blank" href="">�ҵĻ���</a>
</li>
</ul>
</li>
<li class="top-my-order">
<a target="_blank" href="">�ҵĶ���</a>
</li>
<li class="top-map">
<a target="_blank" href="">��վ����</a>
</li>
</ul>
                                <?php
                                if(!ISLOGIN){
                                ?>
<div   id="dom_top_welcome_unlogin" class="top-login">
<span class="gray">����,��ӭ�����̳�!</span>[<a class="a-login" id="login-path" href="<?php echo $webdir;?>user/user_login.php">�� ¼</a>/<a class="a-register" href="<?php echo $webdir;?>user/user_login.php">ע ��</a>]</div>
<?php
                                }else{
?><div   id="dom_top_welcome_logined" class="top-login">���ã�<a href="<?php echo $webdir;?>user/user_main.php" id="dom_i_link"><?php echo UID;?></a> [<a href="<?php echo $webdir;?>user/loginOut.php" class="a-logout">�˳���¼</a>]</div>
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
<input maxlength="50" autocomplete="off" value="<?php echo $sk;?>" class="header-search-input" name="k" id="input_goods_search_keyword" type="text"><input value="����" class="header-search-but" type="submit">
</form>
<div class="hot-keywords">
<strong>���������ʣ�</strong><a href=''>��ѵ</a> <a href=''>���̷���</a>
</div>
</div>
</div><div class="main-nav">
<ul class="main-nav-l">
<li class="m-n-i">
    <a href="<?php echo $webdir;?>" class="main-nav-a main-nav-1">��ҳ</a>
</li>
<li class="m-n-i">
    <a href="<?php echo $webdir;?>product/list.php?id=1" class="main-nav-a main-nav-2">Ůװ</a>
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
<a rel="nofollow" target="_blank" href="">������Ʒ</a><a rel="nofollow" target="_blank" href="">������Ʒ</a>
<a href="">�Ƽ���Ʒ</a>
</div>
</div>
</li>
<li class="m-n-i">
<a href="<?php echo $webdir;?>product/list.php?id=2" class="main-nav-a main-nav-3">��װ</a>
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
<a rel="nofollow" target="_blank" href="">������Ʒ</a><a rel="nofollow" target="_blank" href="">������Ʒ</a>
<a href="">�Ƽ���Ʒ</a>
</div>
</div>
</li>
<li class="m-n-i">
<a href="<?php echo $webdir;?>product/list.php?id=3" class="main-nav-a main-nav-4">ѥ��</a>
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
<a rel="nofollow" target="_blank" href="">������Ʒ</a><a rel="nofollow" target="_blank" href="">������Ʒ</a>
<a href="">�Ƽ���Ʒ</a>
</div>
</div>
</li>
<li class="m-n-i">
<a href="<?php echo $webdir;?>product/list.php?id=4" class="main-nav-a main-nav-6">ʱ����Ʒ</a>
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
<a rel="nofollow" target="_blank" href="">������Ʒ</a><a rel="nofollow" target="_blank" href="">������Ʒ</a>
<a href="">�Ƽ���Ʒ</a>
</div>
</div>
</li>
<li class="m-n-i">
<a href="<?php echo $webdir;?>product/list.php?id=5" class="main-nav-a main-nav-7">�Ҿ���Ʒ</a>
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
<a rel="nofollow" target="_blank" href="">������Ʒ</a><a rel="nofollow" target="_blank" href="">������Ʒ</a>
<a href="">�Ƽ���Ʒ</a>
</div>
</div>
</li>
<li class="m-n-i">
<a href="<?php echo $webdir;?>product/list.php?id=6" class="main-nav-a main-nav-8">ʱ������</a>
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
<a rel="nofollow" target="_blank" href="">������Ʒ</a><a rel="nofollow" target="_blank" href="">������Ʒ</a>
<a href="">�Ƽ���Ʒ</a>
</div>
</div>
</li>
</ul>
<ul class="main-nav-r">

</ul>
</div><div class="header-bar">
<div class="top-notice">
<span>���棺</span>���·�����һ�򹫸���ʾ�������� 
</div>
<div class="head-quickbuy">
    <a target="_blank" href="<?php echo $webdir?>cart.php" class="head-quickbuy-a">���ﳵ����<strong class="head-quickbuy-num" id="js_cart_goods_number">0</strong>����Ʒ</a>
<div class="head-quickbuy-detail" id="top_cart_goods_list"></div>
</div>
</div>
 
</div>