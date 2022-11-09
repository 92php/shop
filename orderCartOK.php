<?php
require "public/init.php";
if(!ISLOGIN)
{
    weberror();
}
unset($_SESSION["productCart"]);
$orderID=$_GET["id"];
//echo $orderID;
$sql="select * from productOrder where orderID='$orderID'";
$orderInfo=$db->select($sql,1);
//var_dump($orderInfo);
if(empty($orderInfo))
{
    weberror();
}


$order = new order;

$orderList = $order->getOrderList($orderID);

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=gb2312"/>
<meta http-equiv="Content-Language" content="zh-CN"/>
<meta name="author" content="mshop-team"/>
<meta name="generator" content="mshop-1.6832-production"/>
<title>选择支付方式 - </title>
<link rel="stylesheet" type="text/css" href="css/cart_payment_v3.css"/>
<link rel="stylesheet" type="text/css" href="css/passport_skin.css" media="all" />
</head>
<body>
 
<div class="wrapper">
	<!-- start cart_crumb -->
	<div class="cart_header">
		<h1>后盾购物车</h1>
		<a href="">
		<img src="images/logo.gif" class="logo" alt="">		</a>
		 <img src="images/cart/g.gif" height="1" width="1">
				<div class="cart_steps cart_steps_3">
			<strong>我的购物车</strong>
			<span>填写核对订单信息</span>
			<span>成功提交订单</span>
		</div>
	</div>
	<!-- end cart_crumb -->
</div>

<div class="wrapper">
	<form action="" method="post" id="form_payment" >
	<input name="payment_submit_sign" value="" type="hidden">	<div class="success_tips" style="margin: 45px auto 35px auto;width: 540px;">
		<p class="s_txt"><strong>
                        <?php
                        if($orderInfo["payment"]=='货到付款'){
                            echo "恭喜，您的订单已经提交成功，将在确认后发货，请耐心等待！";
                        }else{
                             echo "恭喜，您的订单已经成功，请尽快完成支付";
                        }
                        ?>
                        
                           
                    
                        </strong></p>
	</div>
	<table class="order_info" cellspacing="0">
		<thead>
			<tr>
				<td width="13%">订单号</td>
				<td width="12%">应付金额</td>
				<td width="11%">配送方式</td>
				<td width="21%">订单商品</td>
				 
			</tr>
		</thead>
		<tbody>
						<tr>
					<td rowspan="1" class="red f16"><?php echo $orderID;?></td>
				    <td rowspan="1" class="red f16">￥<?php echo $orderInfo["price"]?></td>
                    <Td class="red f16">  城市配送</td>
                    <td class="pro_hadbuy tal">
                        <?php
                        foreach($orderList as $rows)
                        {
                            echo "<img src='".str_replace("../","",$rows["picurl"])."' height='40' width='40' /> ";
                        }
                        ?>
                                
                                                                  
                                                           			
								</td>
				 
			</tr>
					</tbody>
	</table>
 
              <?php
                        if($orderInfo["payment"]=='货到付款'){
                            ?>
            <div class="kind_remind">
		<h3>温馨提示</h3>
				<p>请在收到货时将货款交付给配送员。</p>
		<p>付款前请先验货，若配送员不允许验货可联系客服处理。</p>
					
	</div><?php
                        }else{?>
<div class="pay_tab">
		<h3 class="paychoose_t">请选择支付方式</h3>
		<h4 class="pay_tab_a now">在线支付</h4>
		<div class="cont_box show_box">
			<div class="paychoose onlinepay">
				
												<h3>国内银行卡或信用卡</h3>				<ul class="clearfix">	
																																													<li>
						<label for="input_bank_icbc_perbank_b2c">
							<input name="payment_id" value="icbc_perbank_b2c" id="input_bank_icbc_perbank_b2c" type="radio">							<img src="image/payment/logo_icbc_perbank_b2c.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_ccb_b2c">
							<input name="payment_id" value="ccb_b2c" id="input_bank_ccb_b2c" type="radio">							<img src="image/payment/logo_ccb_b2c.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_cmb">
							<input name="payment_id" value="cmb" id="input_bank_cmb" type="radio">							<img src="image/payment/logo_cmb.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_alipay_spdb">
							<input name="payment_id" value="alipay_spdb" id="input_bank_alipay_spdb" type="radio">							<img src="image/payment/logo_alipay_spdb.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_alipay_bocb2c">
							<input name="payment_id" value="alipay_bocb2c" id="input_bank_alipay_bocb2c" type="radio">							<img src="image/payment/logo_alipay_bocb2c.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_alipay_abc">
							<input name="payment_id" value="alipay_abc" id="input_bank_alipay_abc" type="radio">							<img src="image/payment/logo_alipay_abc.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_alipay_comm">
							<input name="payment_id" value="alipay_comm" id="input_bank_alipay_comm" type="radio">							<img src="image/payment/logo_alipay_comm.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_alipay_cib">
							<input name="payment_id" value="alipay_cib" id="input_bank_alipay_cib" type="radio">							<img src="image/payment/logo_alipay_cib.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_alipay_gdb">
							<input name="payment_id" value="alipay_gdb" id="input_bank_alipay_gdb" type="radio">							<img src="image/payment/logo_alipay_gdb.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_alipay_sdb">
							<input name="payment_id" value="alipay_sdb" id="input_bank_alipay_sdb" type="radio">							<img src="image/payment/logo_alipay_sdb.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_alipay_cmbc">
							<input name="payment_id" value="alipay_cmbc" id="input_bank_alipay_cmbc" type="radio">							<img src="image/payment/logo_alipay_cmbc.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_alipay_citic">
							<input name="payment_id" value="alipay_citic" id="input_bank_alipay_citic" type="radio">							<img src="image/payment/logo_alipay_citic.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_alipay_hzcbb2c">
							<input name="payment_id" value="alipay_hzcbb2c" id="input_bank_alipay_hzcbb2c" type="radio">							<img src="image/payment/logo_alipay_hzcbb2c.gif">						</label>
					</li>
																				<li>
						<label for="input_bank_alipay_cebbank">
							<input name="payment_id" value="alipay_cebbank" id="input_bank_alipay_cebbank" type="radio">							<img src="image/payment/logo_alipay_cebbank.gif">						</label>
					</li>
														</ul>
				
		                            
				<h3>支付平台</h3>                  
				<ul class="clearfix">
		            										<li class="alipay_gg">
						<div class="alipay_gg_con"><img src="image/payment/alipay_1.png" alt=""></div>						<label for="input_bank_alipay">
							<input name="payment_id" value="alipay" id="input_bank_alipay" type="radio">							<img src="image/payment/logo_alipay.gif">						</label>
					</li>
																				<li>
												<label for="input_bank_99bill">
							<input name="payment_id" value="99bill" id="input_bank_99bill" type="radio">							<img src="image/payment/logo_99bill.gif">						</label>
					</li>
																				<li>
												<label for="input_bank_tenpay">
							<input name="payment_id" value="tenpay" id="input_bank_tenpay" type="radio">							<img src="image/payment/logo_tenpay.gif">						</label>
					</li>
																																																																								
																																																																								
										</ul>
								
				              
				<h3>支付宝快捷支付，无需开通网银，无额度限制：</h3>
				<ul class="ul_pay_mtp clearfix">
										<li>
						<label for="input_bank_alipay_ccb_mtp">
															<input name="payment_id" value="alipay_ccb_mtp" id="input_bank_alipay_ccb_mtp" type="radio">								<img src="image/payment/logo_alipay_ccb_mtp.gif">													</label>
						
					</li>
										<li>
						<label for="input_bank_alipay_bocb2c_mtp">
															<input name="payment_id" value="alipay_bocb2c_mtp" id="input_bank_alipay_bocb2c_mtp" type="radio">								<img src="image/payment/logo_alipay_bocb2c_mtp.gif">													</label>
						
					</li>
										<li>
						<label for="input_bank_alipay_icbc_mtp">
															<input name="payment_id" value="alipay_icbc_mtp" id="input_bank_alipay_icbc_mtp" type="radio">								<img src="image/payment/logo_alipay_icbc_mtp.gif">													</label>
						
					</li>
										<li>
						<label for="input_bank_alipay_more_mtp">
															<input id="alipay_more_payment_id" name="alipay_more_payment_id" value="" type="hidden">								<img src="image/payment/logo_alipay_more_mtp.gif" onclick="cart.payment_form('alipay_more_mtp');">													</label>
						
					</li>
									</ul>
								 
			</div>
		</div>
		
		<h4 class="pay_tab_b">银行汇款</h4>
		<div class="cont_box">
			<div class="remit_choose">
				<p>小贴士：您付款成功后务必及时通知我们，以便我们能及时为您发货。</p>
		 sss
			</div>
		</div>
	</div>
 
<?php
                        }
?>
		

		<div class="clearfix"></div>
                
		<!-- start action button -->
		<div class="action_buttons clearfix">
			<div id="id_action_submit" class="">
                            <a href="user/user_orderInfo.php?id=">查看订单详情</a>&nbsp;&nbsp;
                                <a href="">继续购物</a>
				 
			</div>
		</div>
		<!-- end action button -->

	</form></div>
	<!-- end message -->

	
 

</body></html>