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

//λ��
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
<div class="wrapper">		<!-- ֱ�� -->
	

	<!-- ���� -->
	
	<!-- crumb -->
	<div class="crumb">&nbsp;&nbsp;�����ڵ�λ�ã�
	 <?php echo $weizhi;?>
	</div>

	<div class="mainbox clearfix">
		<!-- sidebar -->
		<div class="sidebar">
			<div class="div_sideeach div_prokinds">
            <h2 class="h2_prokinds">��Ʒ����</h2>
         
            
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
			  <h1 class="bfd_title">�Ƽ���Ʒ</h1>
			  <div class="bfd_contentbox">
				<div class="bfd_pre_btn"></div>
				<ul class="bfd_content">
  <?php
 $productList=$action->getProduct(1,8);
 
 foreach($productList as $rows)
 {
     echo "<li  class=\"bfd_item\"><span class=\"bfd_product_img\">";
     echo "<A href='{$webdir}product/show.php?id={$rows["id"]}' target='_blank'><img src='{$rows["picurl"]}' title='' height='145' width='145' /></a></span>";
     echo " <span class=\"bfd_price\">��6800.00</span></li>";
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
			  <h1 class="bfd_title">������Ʒ</h1>
			  <div class="bfd_contentbox">
				<div class="bfd_pre_btn"></div>
				<ul class="bfd_content">  
                                  <?php
 $productList=$action->getProduct(2,8);
 
 foreach($productList as $rows)
 {
     echo "<li  class=\"bfd_item\"><span class=\"bfd_product_img\">";
     echo "<A href='{$webdir}product/show.php?id={$rows["id"]}' target='_blank'><img src='{$rows["picurl"]}' title='' height='145' width='145' /></a></span>";
     echo " <span class=\"bfd_price\">��6800.00</span></li>";
 }
 ?>   
                                </ul>
				<div class="bfd_next_btn" style=" float:right"></div>
			 
			  </div>
			</div>
 
		</div>
		 

 


		<!-- ������Ʒ start -->
		<div id="reco_show">  <div class="bfd_box">    <div class="div_sideeachb" style="margin:0;">      <h2 class="h2_sideeachb h2_sidehistory">������Ʒ</h2>    </div>    <ul class="bfd_content">  
                            
                              <?php
 $productList=$action->getProduct(3,8);
 
 foreach($productList as $rows)
 {
     echo "<li  class=\"bfd_item\"><span class=\"bfd_product_img\">";
     echo "<A href='{$webdir}product/show.php?id={$rows["id"]}' target='_blank'><img src='{$rows["picurl"]}' title='' height='145' width='145' /></a></span>";
     echo " <span class=\"bfd_price\">��6800.00</span></li>"; 
 }
 ?>   
                        </ul>  </div></div>
		<!-- ������Ʒ end -->

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
						<li><a href="��ַ" target="_blank"><img longdesc="<?php echo $productInfo["picurl"];?>" src="<?php echo $productInfo["picurl"];?>" alt="" width="60" height="60"></a></li>
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
					
													<li class="li_normalprice"><span class="span_title">��ܼۣ�</span><b class="b_proprice"><?php echo $productInfo["price"];?></b>Ԫ</li>
												<li class="li_marketprice"><span class="span_title">�г��ۣ�</span><span class="span_marketprice"><?php echo $productInfo["yprice"];?></span>Ԫ</li>
						<li class="li_prono"><span class="span_title">��ţ�</span><span class="span_no"><?php echo $productInfo["numbers"];?></span></li>
					 
						<li class="li_brand"><span class="span_title">Ʒ���ƣ�</span>
                  
                     <a class="a_brand" href=""><span style="color:#c00;">�����</span></a>	
						 
													</li>

					 <li class="li_brand"><span class="span_title">��&nbsp;&nbsp;&nbsp;�棺<?php echo $productInfo["kucun"];?></span>  </li>
					</ul>

										 
					
					<div class="div_choose">
									 
<p class="p_inputnum">��Ҫ��<input id="input_goods_buy_number" class="txt" name="input_goods_buy_number" value="1" type="text"> �� <span class="red" id="input_goods_buy_number_error"></span> </p>
											</div>

					<div class="div_buybtn">
										<a id="a_js_ga_mainbuy" class="a_tobuy" title="���̹���" style="cursor:pointer;">��������</a>
										<a class="a_addtofavor" title="�����ղؼ�" style="cursor:pointer;">�����ղ�</a></div>

					<div class="div_proabs">
						<ul class="ul_proabs">
														<li>�����<b style="display: ;" id="js_jiaohao_view"><?php echo $productInfo["hits"];?></b> ��  </li>
							<li>���֣�<img src="../image/icon_star_5.gif" alt="" width="63" height="10"> <a class="a_tocomments" href="#h3_commentsherf"></a></li>
                            <li class="li_guarantee">���ѱ��ϼƻ���<img title="7���������˻���" src="show2_files/bz_ico_1.png"/>
                           <img src="show2_files/bz_ico_2.png" title="����Ԥ��� ������������"/>
                            <img src="show2_files/bz_ico_3.png" title="7��۸���"/>
                           <img src="show2_files/bz_ico_4.png" title="���߱�Ӧ ���ʱش�">
                           <img title="רҵ���� ֧�ֻ�������" src="show2_files/bz_ico_5.png"></li>
						</ul>
					</div>

				</div>
				<div class="clear"></div>
			</div>

			<!-- prodetailsinfo_a over prodetailsinfo_b -->
			<div id="prodinfobox" name="prodinfobox" class="tabbox_a prodetailsinfo_b">

			  <h3 class="tabtitle tabtitle_1"><span class="now">��Ʒչʾ</span></h3>
			  <div class="tabcont prodetailsdes">
				<div style="top: 31816px;" class="floatquick">
					<h3 class="h3_op">����</h3><a class="a_totop" href="#protop">top</a>
					<p class="p_quickbtn"><a class="a_quickbuy" style="cursor:pointer;">����</a><a class="a_addtofavor" style="cursor:pointer;">�ղ�</a><!-- showLogin() ����ajaxlogin ɾ��ҳ��ײ�ֱ�ӵ�������� js --><a class="a_quickask" href="#addconsult">��ѯ</a></p>
				</div>

						<div class="output">
							<!-- �������� -->
							<!---->
							 
<?php echo $productInfo["content"];?>
						</div>
			  </div>
			  <h2 class="tabtitle tabtitle_2"><span>��Ʒ����</span></h2>
			  <h3 class="h3_eachtitle">��Ʒ����</h3>
			  <div class="tabcont proargument">
					<ul class="ul_property">
															<li><span class="span_title">�Ա�</span>Ů</li>
															<li><span class="span_title">���ʣ�</span>ţƤ</li>
															<li><span class="span_title">��ɫϵ��</span>��ɫ</li>
															<li><span class="span_title">����Ԫ�أ�</span>����</li>
															<li><span class="span_title">��С��</span>���Ͱ�</li>
															<li><span class="span_title">���</span>����,����,��Լ</li>
															<li><span class="span_title">�ߴ磺</span>����</li>
															<li><span class="span_title">���ϣ�</span>����,����</li>
															<li><span class="span_title">��ʽ��</span>ˮ����</li>
															<li><span class="span_title">ͼ����</span>��ɫ</li>
															<li><span class="span_title">�ڲ��ṹ��</span>�����в�,�ڲ�������,�ֻ���,֤����</li>
															<li><span class="span_title">�򿪷�ʽ��</span>����</li>
															<li><span class="span_title">���ϲ��أ�</span>�й�</li>
															<li><span class="span_title">��Ʒ���أ�</span>�й�</li>
												</ul>
					</div>
					<h2 class="tabtitle tabtitle_3"><span>��ǰ��ѯ</span></h2>
					<h3 class="h3_eachtitle">��ǰ��ѯ</h3>
					<div class="tabcont proconsult">
						<h3 class="h3_comtip">�繺����������κ����ʣ���ӭ��������ѯ<span><a href="#addconsult" class="red">��Ҫ��ѯ</a></span></h3>
					
                                                    <div id="zixunList">
                                                        
                                                    </div>		 
						
												<div id="addconsult" class="addconsultbox">
							<form id="consultInfo">
								 <input type="hidden" name="pid" value="" />
								<h3>������ѯ <span>(�繺����������κ����ʣ���ӭ��������ѯ)</span></h3>
								<p class="p_item">
								</p><div style="padding-left:10px;">
									<div><label class="itemtitle">��ѯ���ͣ�</label></div>
									<div id="consultation_type" style="padding:5px 10px 5px 10px;display:inline;">
                                                                          
                                                                                 <input checked class="input_consultation_type" id="input_consultation_type" name="input_consultation_type" value=""  type="radio" />��ǰ��ѯ
										 

									</div>
								</div>
					 
								<p class="p_item">
									<label class="itemtitle">��ѯ���ݣ�</label>
									<textarea id="textarea_consultation_content" class="txta" name="txta"></textarea>
								    <span id="contentError"></span>
                                </p>
								<p class="p_item">
									<label class="itemtitle">��֤�ַ���</label>
									<input id="verifycode" onfocus="codeF('#imgregister_verifycode')" class="txt" name="verifycode" type="text">
									<img id="imgregister_verifycode" src="show2_files/space.gif"  style="vertical-align: middle; cursor: pointer;" title="" alt=""><span id="codeError"></span>
								</p>
								<p class="p_item p_btn">
									<input class="btn" value="�ύ�ҵ���ѯ" type="submit">
								</p>
							</form>
						</div>
				</div>
			 
			<h2 class="tabtitle tabtitle_4"><span>��������</span></h2>
			<h3 class="h3_eachtitle">��������</h3>
				<div class="tabcont procomments" id="comment">
					
									</div>

 


			<h2 class="tabtitle tabtitle_5"><span>��ι���</span></h2>
			  <h3 style="display: none;" class="h3_eachtitle hidden">��ι���</h3>
				<div style="display: none;" class="tabcont prohowtobuy hidden">
					<img src="show2_files/howtobuy.png" alt="��ι���" usemap="#map_howtobuy" width="740" height="803">
					<map name="map_howtobuy" id="map_howtobuy">
						<area shape="rect" coords="123,155,196,171" href="http://www.mbaobao.com/shipping-cost.html" target="_blank">
						<area shape="rect" coords="284,659,458,673" href="http://www.mbaobao.com/payment-options.html" target="_blank">
						<area shape="rect" coords="182,294,330,308" href="http://www.mbaobao.com/cod.html" target="_blank">
						<area shape="rect" coords="300,746,440,761" href="http://www.westernunion.com/info/selectCountry.asp" target="_blank">
					</map>
				</div>

			<h2 class="tabtitle tabtitle_6"><span class="">�ۺ����</span></h2>
			  <h3 style="display: none;" class="h3_eachtitle hidden">�ۺ����</h3>
				<div style="display: none;" class="tabcont proafterbuy hidden">
					<img src="show2_files/afterbuy.png" alt="�ۺ����" usemap="#map_afterbuy" width="740" border="0" height="777">
					<map name="map_afterbuy" id="map_afterbuy">
						<area shape="rect" coords="160,598,247,614" href="http://www.mbaobao.com/return-policy.html#return-policy" target="_blank">
					</map>
				</div>

						<div class="div_buybtn div_buybtnr">
			<a id="a_js_ga_quickbuy" class="a_tobuy" style="cursor:pointer;">��������</a>
            
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
            alert('������Ҫ���������');
        }
       
        jQuery.ajax({
           url:"../ajax/ajaxCart.php",
           type:"POST",
           data:"id=<?php echo $id?>&sum="+$('#input_goods_buy_number').val()+"",
           success:function(data){
               switch(data){
                   case "nologin":
                       alert('������½');
                       location.href='../user/user_login.php';
                       break; 
                    case "2":
                        alert('��治��');
                        break;
                    case "1":
                        location.href='../cart.php';
                         break;
                    default:
                        alert(data);
                       
               }
           },
           error:function(){
               alert('����');
           }
        });
        
    })
    
})
</script> 	

<!--footer-start-->    
 </html>
<!--content ok-->
<!-- OK -->