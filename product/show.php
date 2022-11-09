<?php
require "../public/init.php";
$id=$_GET["id"];
$sql="select * from product inner join productList on product.typeid=productList.id where product.id='$id'";
$productInfo=$db->select($sql,1);
if(empty($productInfo))
{
    weberror();
} 
$tid=$productInfo["tid"];
if($tid!=0)
{
    //echo $listInfo["idpath"];
    $tids=explode("_", $productInfo["idpath"]);
    $tid=$tids[1];
}else
{
    $tid=$id;
}

//位置
$weizhi=$action->getWeizhi($productInfo["idpath"]."_".$productInfo["typeid"]);

//var_dump($productInfo); 
 
//echo $productInfo["picurls"];
preg_match_all("/(.*?)@(.+?)#/is", $productInfo["picurls"], $arr,PREG_SET_ORDER);

//var_dump($arr);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<meta http-equiv="Content-Language" content="zh-CN"/>
<title><?php echo $productInfo["title"]." - ".$productInfo["typename"]." - ".$webtitle;?> </title>
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<link rel="stylesheet" href="../css/base_v4.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="../css/global.css" media="all"/>
<link rel="stylesheet" type="text/css" href="../css/goods_list.css" media="all"/>
<link rel="stylesheet" type="text/css" href="../css/product.css" media="all"/>
<script type="text/javascript" src="show2_files/jquery-1.js"></script>
</head>
<body>
     <?php
   include WEBDIR.'/include/top.php';
?>
<div style="position: absolute; visibility: hidden; left: 704px; top: 68px; width: 218px;" class="suggest-container"></div>

<!--head_top-start-->
 <!-- header -->
 

<!--head_top-end-->
<div class="wrapper">		<!-- 直显 -->
	

	<!-- 伸缩 -->
	
	<!-- crumb -->
	<div class="crumb">&nbsp;&nbsp;您所在的位置：
	 <?php echo $weizhi;?>
	</div>

	<div class="mainbox clearfix">
		<!-- sidebar -->
		<div class="sidebar">
			<div class="div_sideeach div_prokinds">
            <h2 class="h2_prokinds">产品分类</h2>
         
            
             <?php
                               $type=$action->getProductType(" and tid='$tid'"); 
                
                                 foreach($type as $rows)
                                 {
                                     echo "<h3><span>{$rows["typename"]}</span></h3>";
                                     echo "<ul><li>";
                                      $types=$action->getProductType(" and tid='{$rows["id"]}'");
                                      foreach($types as $rows)
                                      { 
                                          echo "<a href='{$webdir}product/list.php?id={$rows["id"]}'>{$rows["typename"]}</a>";
                                      }
                                     echo "</li></ul>";
                                 }
                                    ?>
				
				 
			</div>



		 
		<div id="rec_banner2">
			<div class="bfd_box">
			  <h1 class="bfd_title">推荐商品</h1>
			  <div class="bfd_contentbox">
				<div class="bfd_pre_btn"></div>
				<ul class="bfd_content">
  <?php
 $productList=$action->getProduct(1,8);
 
 foreach($productList as $rows)
 {
     echo "<li  class=\"bfd_item\"><span class=\"bfd_product_img\">";
     echo "<A href='{$webdir}product/show.php?id={$rows["id"]}' target='_blank'><img src='{$rows["picurl"]}' title='' height='145' width='145' /></a></span>";
     echo " <span class=\"bfd_price\">￥6800.00</span></li>";
 }
 ?>                                   
             
  </ul>
				<div class="bfd_next_btn" style=" float:right"></div>
		 
			  </div>
			</div>
			<div style="display:none" class="bfd_page">1/2</div>
		</div>
 
		<div id="rec_banner1">
			<div class="bfd_box">
			  <h1 class="bfd_title">热销商品</h1>
			  <div class="bfd_contentbox">
				<div class="bfd_pre_btn"></div>
				<ul class="bfd_content">  
                                  <?php
 $productList=$action->getProduct(2,8);
 
 foreach($productList as $rows)
 {
     echo "<li  class=\"bfd_item\"><span class=\"bfd_product_img\">";
     echo "<A href='{$webdir}product/show.php?id={$rows["id"]}' target='_blank'><img src='{$rows["picurl"]}' title='' height='145' width='145' /></a></span>";
     echo " <span class=\"bfd_price\">￥6800.00</span></li>";
 }
 ?>   
                                </ul>
				<div class="bfd_next_btn" style=" float:right"></div>
			 
			  </div>
			</div>
 
		</div>
		 

 


		<!-- 降价商品 start -->
		<div id="reco_show">  <div class="bfd_box">    <div class="div_sideeachb" style="margin:0;">      <h2 class="h2_sideeachb h2_sidehistory">降价商品</h2>    </div>    <ul class="bfd_content">  
                            
                              <?php
 $productList=$action->getProduct(3,8);
 
 foreach($productList as $rows)
 {
     echo "<li  class=\"bfd_item\"><span class=\"bfd_product_img\">";
     echo "<A href='{$webdir}product/show.php?id={$rows["id"]}' target='_blank'><img src='{$rows["picurl"]}' title='' height='145' width='145' /></a></span>";
     echo " <span class=\"bfd_price\">￥6800.00</span></li>"; 
 }
 ?>   
                        </ul>  </div></div>
		<!-- 降价商品 end -->

		</div>

		 

		<div class="maincont">
			<!-- prodetailsinfo -->
			<div class="prodetailsinfo">
				<div class="proviewbox">
					<div class="probigshow">
						<a class="a_probigshow" href="#" ref="<?php echo $productInfo["picurl"];?>"><img src="<?php echo $productInfo["picurl"];?>" alt="" class="js_goods_image_url" width="420" height="420"></a>
					<div class="zoomplepopup"></div><div id="probig_preview"><img src="" alt="" width="1024" height="1024"></div></div>
					<div class="div_prothumb">
						<div class="thumbporbox">
							<ul class="ul_prothumb">
						<li><a href="地址" target="_blank"><img longdesc="<?php echo $productInfo["picurl"];?>" src="<?php echo $productInfo["picurl"];?>" alt="" width="60" height="60"></a></li>
                        <?php
                  
                        foreach($arr as $k=>$v){
                          echo "<li><a href='{$arr[$k][2]}' target=\"_blank\"><img longdesc=\"{$arr[$k][2]}\" src=\"{$arr[$k][2]}\" alt=\"\" width=\"60\" height=\"60\"></a></li>";  
                        }
						?>
							 			 
															</ul>
						</div>
						<span class="span_prev span_prevb">prev</span><span class="span_next">next</span>
					</div>

<!--					<div class="div_prolinks">
						 
						 
					</div>-->

				</div>

				<!-- prodbaseinfo_a -->
				<div id="protop" class="prodbaseinfo_a">
					<h2 class="h2_prodtitle"><?php echo $productInfo["title"];?></h2>
					<ul class="ul_prodinfo">
					
													<li class="li_normalprice"><span class="span_title">后盾价：</span><b class="b_proprice"><?php echo $productInfo["price"];?></b>元</li>
												<li class="li_marketprice"><span class="span_title">市场价：</span><span class="span_marketprice"><?php echo $productInfo["yprice"];?></span>元</li>
						<li class="li_prono"><span class="span_title">编号：</span><span class="span_no"><?php echo $productInfo["numbers"];?></span></li>
					 
						<li class="li_brand"><span class="span_title">品　牌：</span>
                  
                     <a class="a_brand" href=""><span style="color:#c00;">后盾网</span></a>	
						 
													</li>

					 <li class="li_brand"><span class="span_title">库&nbsp;&nbsp;&nbsp;存：<?php echo $productInfo["kucun"];?></span>  </li>
					</ul>

										 
					
					<div class="div_choose">
									 
<p class="p_inputnum">我要买：<input id="input_goods_buy_number" class="txt" name="input_goods_buy_number" value="1" type="text"> 件 <span class="red" id="input_goods_buy_number_error"></span> </p>
											</div>

					<div class="div_buybtn">
										<a id="a_js_ga_mainbuy" class="a_tobuy" title="立刻购买" style="cursor:pointer;">立即购买</a>
										<a class="a_addtofavor" title="加入收藏夹" style="cursor:pointer;">加入收藏</a></div>

					<div class="div_proabs">
						<ul class="ul_proabs">
														<li>浏览：<b style="display: ;" id="js_jiaohao_view"><?php echo $productInfo["hits"];?></b> 次  </li>
							<li>评分：<img src="../image/icon_star_5.gif" alt="" width="63" height="10"> <a class="a_tocomments" href="#h3_commentsherf"></a></li>
                            <li class="li_guarantee">消费保障计划：<img title="7天无条件退换货" src="show2_files/bz_ico_1.png"/>
                           <img src="show2_files/bz_ico_2.png" title="百万预赔金 让您购包无忧"/>
                            <img src="show2_files/bz_ico_3.png" title="7天价格保障"/>
                           <img src="show2_files/bz_ico_4.png" title="有诉必应 有问必答">
                           <img title="专业配送 支持货到付款" src="show2_files/bz_ico_5.png"></li>
						</ul>
					</div>

				</div>
				<div class="clear"></div>
			</div>

			<!-- prodetailsinfo_a over prodetailsinfo_b -->
			<div id="prodinfobox" name="prodinfobox" class="tabbox_a prodetailsinfo_b">

			  <h3 class="tabtitle tabtitle_1"><span class="now">商品展示</span></h3>
			  <div class="tabcont prodetailsdes">
				<div style="top: 31816px;" class="floatquick">
					<h3 class="h3_op">操作</h3><a class="a_totop" href="#protop">top</a>
					<p class="p_quickbtn"><a class="a_quickbuy" style="cursor:pointer;">购买</a><a class="a_addtofavor" style="cursor:pointer;">收藏</a><!-- showLogin() 加载ajaxlogin 删除页面底部直接点击弹出层 js --><a class="a_quickask" href="#addconsult">咨询</a></p>
				</div>

						<div class="output">
							<!-- 发布区域 -->
							<!---->
							 
<?php echo $productInfo["content"];?>
						</div>
			  </div>
			  <h2 class="tabtitle tabtitle_2"><span>商品参数</span></h2>
			  <h3 class="h3_eachtitle">商品参数</h3>
			  <div class="tabcont proargument">
					<ul class="ul_property">
															<li><span class="span_title">性别：</span>女</li>
															<li><span class="span_title">材质：</span>牛皮</li>
															<li><span class="span_title">颜色系：</span>桔色</li>
															<li><span class="span_title">流行元素：</span>单扣</li>
															<li><span class="span_title">大小：</span>中型包</li>
															<li><span class="span_title">风格：</span>优雅,经典,简约</li>
															<li><span class="span_title">尺寸：</span>其它</li>
															<li><span class="span_title">场合：</span>休闲,其它</li>
															<li><span class="span_title">款式：</span>水饺形</li>
															<li><span class="span_title">图案：</span>纯色</li>
															<li><span class="span_title">内部结构：</span>拉链夹层,内侧拉链袋,手机袋,证件袋</li>
															<li><span class="span_title">打开方式：</span>翻盖</li>
															<li><span class="span_title">材料产地：</span>中国</li>
															<li><span class="span_title">成品产地：</span>中国</li>
												</ul>
					</div>
					<h2 class="tabtitle tabtitle_3"><span>售前咨询</span></h2>
					<h3 class="h3_eachtitle">售前咨询</h3>
					<div class="tabcont proconsult">
						<h3 class="h3_comtip">如购买过程中有任何疑问，欢迎向我们咨询<span><a href="#addconsult" class="red">我要咨询</a></span></h3>
					
                                                    <div id="zixunList">
                                                        
                                                    </div>		 
						
												<div id="addconsult" class="addconsultbox">
							<form id="consultInfo">
								 <input type="hidden" name="pid" value="" />
								<h3>发表咨询 <span>(如购买过程中有任何疑问，欢迎向我们咨询)</span></h3>
								<p class="p_item">
								</p><div style="padding-left:10px;">
									<div><label class="itemtitle">咨询类型：</label></div>
									<div id="consultation_type" style="padding:5px 10px 5px 10px;display:inline;">
                                                                          
                                                                                 <input checked class="input_consultation_type" id="input_consultation_type" name="input_consultation_type" value=""  type="radio" />售前咨询
										 

									</div>
								</div>
					 
								<p class="p_item">
									<label class="itemtitle">咨询内容：</label>
									<textarea id="textarea_consultation_content" class="txta" name="txta"></textarea>
								    <span id="contentError"></span>
                                </p>
								<p class="p_item">
									<label class="itemtitle">验证字符：</label>
									<input id="verifycode" onfocus="codeF('#imgregister_verifycode')" class="txt" name="verifycode" type="text">
									<img id="imgregister_verifycode" src="show2_files/space.gif"  style="vertical-align: middle; cursor: pointer;" title="" alt=""><span id="codeError"></span>
								</p>
								<p class="p_item p_btn">
									<input class="btn" value="提交我的咨询" type="submit">
								</p>
							</form>
						</div>
				</div>
			 
			<h2 class="tabtitle tabtitle_4"><span>评价详情</span></h2>
			<h3 class="h3_eachtitle">评价详情</h3>
				<div class="tabcont procomments" id="comment">
					
									</div>

 


			<h2 class="tabtitle tabtitle_5"><span>如何购买</span></h2>
			  <h3 style="display: none;" class="h3_eachtitle hidden">如何购买</h3>
				<div style="display: none;" class="tabcont prohowtobuy hidden">
					<img src="show2_files/howtobuy.png" alt="如何购买" usemap="#map_howtobuy" width="740" height="803">
					<map name="map_howtobuy" id="map_howtobuy">
						<area shape="rect" coords="123,155,196,171" href="http://www.mbaobao.com/shipping-cost.html" target="_blank">
						<area shape="rect" coords="284,659,458,673" href="http://www.mbaobao.com/payment-options.html" target="_blank">
						<area shape="rect" coords="182,294,330,308" href="http://www.mbaobao.com/cod.html" target="_blank">
						<area shape="rect" coords="300,746,440,761" href="http://www.westernunion.com/info/selectCountry.asp" target="_blank">
					</map>
				</div>

			<h2 class="tabtitle tabtitle_6"><span class="">售后服务</span></h2>
			  <h3 style="display: none;" class="h3_eachtitle hidden">售后服务</h3>
				<div style="display: none;" class="tabcont proafterbuy hidden">
					<img src="show2_files/afterbuy.png" alt="售后服务" usemap="#map_afterbuy" width="740" border="0" height="777">
					<map name="map_afterbuy" id="map_afterbuy">
						<area shape="rect" coords="160,598,247,614" href="http://www.mbaobao.com/return-policy.html#return-policy" target="_blank">
					</map>
				</div>

						<div class="div_buybtn div_buybtnr">
			<a id="a_js_ga_quickbuy" class="a_tobuy" style="cursor:pointer;">立即购买</a>
            
			</div>
			
		</div>

	</div>
	</div>
<!-- wrapper over -->
<script type="text/javascript" src="show2_files/pshow2.js"></script>
</div>

<?php
   include WEBDIR.'/include/foot.php';
?> 
<script>
$(function(){
    $('#a_js_ga_mainbuy').click(function(){
        if(!$('#input_goods_buy_number').val()){
            alert('请输入要购买的数量');
        }
       
        jQuery.ajax({
           url:"../ajax/ajaxCart.php",
           type:"POST",
           data:"id=<?php echo $id?>&sum="+$('#input_goods_buy_number').val()+"",
           success:function(data){
               switch(data){
                   case "nologin":
                       alert('请您登陆');
                       location.href='../user/user_login.php';
                       break; 
                    case "2":
                        alert('库存不足');
                        break;
                    case "1":
                        location.href='../cart.php';
                         break;
                    default:
                        alert(data);
                       
               }
           },
           error:function(){
               alert('错误');
           }
        });
        
    })
    
})
</script> 	

<!--footer-start-->    
 </html>
<!--content ok-->
<!-- OK -->