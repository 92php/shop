<?php
require "public/init.php";

if(!ISLOGIN)
{
    webAlter("���½", "user/user_login.php");
}
if(empty($_SESSION["productCart"]))
{
     webAlter("��ѡ����Ʒ", "index.php");
}

$cart = new cart();
$cartList=$cart->cartInfo();
$orderID=  time().  rand(100, 999);
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=gb2312"/>
 <title>ȷ�϶��� - <?php echo $webtitle;?></title>
<link rel="stylesheet" type="text/css" href="css/cart_v3.css"/>
<link rel="stylesheet" type="text/css" href="css/passport_skin.css" media="all"/>
</head>
<body>
<div class="wrapper">
	<!-- start cart_crumb -->
	<div class="cart_header">
		<h1>���ﳵ</h1>
		<a href="">
		<img src="images/logo.gif" class="logo" alt="">		</a>
			 <img src="images/cart/g.gif" height="1" width="1">
			<div class="cart_steps cart_steps_2">
			<strong>�ҵĹ��ﳵ</strong>
			<span>��д�˶Զ�����Ϣ</span>
			<span>�ɹ��ύ����</span>
		</div>
	</div>
	<!-- end cart_crumb -->
</div>

<div class="wrapper checkout_form_head">
    <h2>��д�˶Զ�����Ϣ</h2>
    <span class="tip">��д��ȷ��������Ϣ��Ȼ���ύ����</span>
</div>

<div class="wrapper checkout_form">
 

<form method="post" id="form_checkout"  action="orderCartOK.php">
	<fieldset>
<div class="checkout_title" id="consignee_tag">
	<h3 class="c_t_1">�ջ���ַ</h3>
    <span class="tip"><a href="javascript:void(0);" id="edit_but_addrss" class="edit_but blue"></a></span>
</div>

<div class="checkout_box">
	 
        <div id="consignee_area_select"></div>
        <div style="display: block;" id="consignee_area" class="consignee_area">
        <div style="display: block;" id="address_area" class="address_area">
		</div>
            <div style="padding-left: 40px;">
              <?php
              $sql="select * from receive where username='".UID."'";
              $receive=$db->select($sql);
              foreach($receive as $rows)
              {
                  echo "<div class='receive' style=\"line-height: 30px;\" shren='{$rows["shren"]}' shdizhi='{$rows["shdizhi"]}' youbian='{$rows["youbian"]}' tel='{$rows["tel"]}' mobile='{$rows["mobile"]}' ><b>�ջ���</b>��{$rows["shren"]} ��ַ��{$rows["shdizhi"]} {$rows["youbian"]} {$rows["tel"]} {$rows["mobile"]}</div>";
              }  
               ?> 
            </div>
		<div style="display:block;" id="div_consignee" class="">
		  <dl class="clearfix">
			    <dt><span class="red">*</span> ��&ensp;��&ensp;�ˣ�</dt>
			    <dd><input type="hidden" value="<?php echo $orderID;?>" name="orderid"/>
			        <input name="shren" type="text" id="shren" size="20" maxlength="20"><span class="red" id="shren_error">&nbsp;</span>
			    </dd>
			</dl>
 
		  <dl class="clearfix">
			    <dt><span class="red">*</span> �ջ���ַ��</dt>
			    <dd>
			        <input name="shdizhi" type="text" id="shdizhi" size="40" maxlength="100">
					<span class="red" id="shdizhi_error">&nbsp;</span>
			    </dd>
			</dl>
			<dl class="clearfix">
			    <dt><span class="red">*</span> �������룺</dt>
			    <dd>
			        <input name="youbian" type="text" id="youbian" size="12" maxlength="6">
					<span class="red" id="youbian_error">&nbsp;</span>
			        <span class="tip gray" >����д��λ��������</span>
			    </dd>
			</dl>
			<dl class="clearfix"> 
			    <dt><span class="red">*</span> ��&emsp;&emsp;����</dt>
			    <dd>
		          <input name="mobile" type="text" class="focusInput focusTxt" id="mobile" value="" size="26" maxlength="20" rel="�̶��绰���ֻ��б���һ��">�̶��绰��<input name="tel" type="text" class="focusInput focusTxt" id="tel" value="" size="26" maxlength="20" />
					<span class="red" id="dianhua_error">&nbsp;</span>
			    </dd>
			</dl>
	 
		</div>
	</div>
        
</div>
	<!-- end consignee -->

	<!-- start choose payment method -->
	
<!-- start choose payment method -->
<div class="checkout_title" id="pay_tag"><h3 class="c_t_2">֧�������ͷ�ʽ</h3>
	<span class="tip"><a href="javascript:void(0);" id="edit_but_pay" class="edit_but blue"></a></span>
	<span class="tip">
			    <span>����ȫ������</span>
				<span>������ <b class="price">50.00</b> ��ʹ�û������� (���������)</span>
			</span>
</div>
<div class="checkout_box">
 
    <div id="pay_delivery_set" style="display: block;">
    	<dl class="pay_delivery_set" id="pay_list">
    	    
    	    <dd>
    	    	<ul id="ul_pay_list" class="delivery"><li><label for="delivery_item_7_cod"><input name="delivery_id" value="��������" id="delivery_item_7_cod" class="pay_item" type="radio"> <strong>��������</strong></label><span class="pay_tip">������󸶿�ֽ�֧��</span></li><li><label for="delivery_item_1_online"><input name="delivery_id" value="����֧��" id="delivery_item_1_online" class="pay_item" type="radio"> <strong>����֧��</strong></label><span class="pay_tip">��ʹ��֧�������Ƹ�ͨ�����С����С����е����е����������ÿ�֧��</span></li><li><label for="delivery_item_1_offline"><input name="delivery_id" value="���л��" id="delivery_item_1_offline" class="pay_item" type="radio"> <strong>���л��</strong></label><span class="pay_tip">֧���ʾ֡����С����С����е����л��֧��</span></li></ul>
    	    </dd>
        </dl>
        <dl class="pay_delivery_set" id="delivery_list" style="display: none;">
    	    <dt>���ͷ�ʽ</dt>
    	    <dd>
    	    
    	        <ul id="ul_delivery_area" class="delivery"><li><label><em>��������</em></label><span class="delivery_tip"></span></li></ul>
    	    </dd>
        </dl>
        <dl class="pay_delivery_set" id="sendtime_list" style="display: block;">
    	    <dt>�ͻ�ʱ��</dt>
    	    <dd>
    	    	<ul id="ul_delivery_time" class="delivery">
    	            <li>
    	                <label for="delivery_time2">
    	                    <input id="delivery_time2" value="�����ա�˫���պͼ��վ����ͻ�" name="delivery_time" type="radio">
    	                    <strong>�����ա�˫���պͼ��վ����ͻ�</strong> 
    	                </label>
    	            </li>
    	            <li>
    	                <label for="delivery_time1">
    	                    <input id="delivery_time1" value="ֻ�������ͻ���˫���ա����ղ��ͣ�" name="delivery_time" type="radio">
    	                    <strong>ֻ�������ͻ���˫���ա����ղ��ͣ�</strong>
    	                </label>
    	            </li>
    	            <li>
    	                <label for="delivery_time3">
    	                    <input id="delivery_time3" value="ֻ˫���ա������ͻ��������ղ��ͣ�" name="delivery_time" type="radio">
    	                    <strong>ֻ˫���ա������ͻ��������ղ��ͣ�</strong>
    	                </label>
    	            </li>
    	        </ul>
    	    </dd>
    	</dl>
 
    </div>
 <!--END-->
</div>
<!-- end choose payment method -->
	<!-- end choose payment method -->

	<!-- start product list -->
	

    <div class="checkout_title">
    <h3 class="c_t_3">��Ʒ�嵥</h3>
    <span class="tip"><a href="cart.php" class="blue">[���ع��ﳵ���޸Ķ�����Ʒ]</a></span>
    <span id="js_warehouse_tip" class="tip tip_fr "><span class="red"> </span> </span>
    </div>
		<!-- start item grid -->
		<div class="items clearfix">
			<table class="grid" style="width: 917px;" cellspacing="0">
				<thead>
					<tr>
						<td width="70">&nbsp;</td>
						<td style="text-align: left; padding-left: 5px;" width="*">��Ʒ����</td> 
						<td width="130">��ܼ�</td>
						<td width="100">����</td>
 
						<td width="90">С��</td>
 
					</tr>
				</thead>
				<tbody>
                             <?php
                                           foreach($cartList as $k=>$v)
              {
                             ?>
            <tr>
        <td><a href="product/show.php?id=<?php echo $k;?>" alt="" target="_blank"><img src="<?php echo str_replace("../", "",$v["picurl"])?>" alt="" class="item" /></a></td>
          <td class="tal"><ul>
            <li><a href="product/show.php?id=<?php echo $k;?>" target="_blank"><?php echo $v["title"]?></a></li>
            <li><?php echo $v["numbers"]?></li>
          </ul></td>
 
          <td><div class="price">��<?php echo $v["unitPrice"]?></div></td>
          <td><?php echo $v["total"]?></td>
          
          <td><?php echo $v["Price"]?></td>
 
        </tr>
                                    <?php
              }
                                    ?>
          
									</tbody>
			</table>
		</div>
		<!-- end item grid -->

	<!-- end product list -->

	
	
	<!--start dm_card-->
     
    <!--end dm_card-->
	
	<!-- start order total -->
    <div class="checkout_title"><h3 class="c_t_4">������Ϣ</h3></div>
	<div class="checkout_box ordertotal">
		<p>
<span><em>��Ʒ������</em><font id="font_total_count"><?php echo $_SESSION["cartCount"];?>��</font></span>
 
<span><em>��Ʒ��</em>��<font id="font_total_price"><?php echo $_SESSION["cartPrice"];?></font></span> + 
<span><em>�˷ѣ�</em>��<font id="font_freight">0.00</font></span> - 
            <span><em>�Żݣ�</em>��<font id="font_total_cashback">00</font></span>
		</p>
		<p>
			<span class="total_amount"><span class="price f14"><em>Ӧ���ܽ�</em>��<font id="font_total_amount"><?php echo $_SESSION["cartPrice"];?></font></span></span>
		</p><input name="price"  value="<?php echo $_SESSION["cartPrice"];?>" type="hidden" />
	</div>
	<!-- end order total -->
	

	<div class="checkout_sub">
   
    <!-- start message -->
    	<div class="checkout_sub_title" rel="message_panl" id="message_panl_box">
    		<button class="open_panl_but" id="message_but" type="button"></button><h3 class="open_panl_but">��������</h3><span class="tip"><a style="display: none;" href="javascript:void(0);" id="edit_but_message" class="edit_but blue">[�޸�]</a></span><span class="tip" id="message_tip" style="">�����������100����</span>
    	</div>
        <div class="checkout_sub_body get_message_body" id="message_panl_return">
        </div>
        <div class="checkout_sub_body get_message_body" id="message_panl"  >
            <textarea class="focusTxt" name="message" id="message" rel=""></textarea>
    
        </div>
	<!-- end message -->
    </div>
	</fieldset>
	
	<!-- start action button -->
	<div class="action_buttons clearfix">
			<div class="action_wrap">
				<div id="id_action_submit" class="">
					<input name="��ť" type="button" class="checkout_submit sprite" id="orderOK" value="ȷ�������ύ����">
			  </div>
				<div id="id_action_waiting" class="action_waiting">
					<img src="images/cart/loading.gif">				<span>ϵͳ�����У����Ժ�&hellip;&hellip;</span>
				</div>
			</div>
	</div>
	<!-- end action button -->

	</form>
</div>

<!-- start hidden box -->
<div class="hidden">
	<font id="font_hidden_freight_type">0</font>
	<font id="font_hidden_meet_free_freight">0</font>
	<font id="font_hidden_font_total_cashback">20.00</font>
	<font id="font_hidden_total_amount">3865.00</font>
</div>
<!-- end hidden box -->

<!-- start footer -->
<div class="footer">
	<div class="special-service">
		<h2 class="spe-ser-title">���Է���</h2>
		<ul class="spe-ser-con">
			<li>
				<a class="s-ser-1">ÿ������ ����ʱ��</a>
			</li>
			<li>
				<a  class="s-ser-2">���Լ۱� Ʒ����ȫ</a>
			</li>
			<li>
				<a  class="s-ser-3">Ʒ����Ʒ ���Ʒ���</a>
			</li>
			<li>
				<a class="s-ser-4">רҵ���� ֧�ֻ�������</a>
			</li>
			<li>
				<a class="s-ser-5">7�����������˻���</a>
			</li>
		</ul>
	</div>
	<div class="copyright">
		 banquan
	</div>
</div>
<!-- end footer -->
<script src="Images/jquery.js" type="text/javascript"></script> 
<script>
$(function(){
    
        $('.receive').click(function(){
             $('#shren').val($(this).attr('shren'));
             $('#shdizhi').val($(this).attr('shdizhi'));
             $('#youbian').val($(this).attr('youbian'));
             $('#tel').val($(this).attr('tel'));
             $('#mobile').val($(this).attr('mobile'));
          //   alert(); 
        });
    
     //�ύ
     $('#orderOK').click(function(){
         if(!$('#shren').val()){
             alert('����д�ջ��ˣ�');
             return false;
         }
         if(!$('#shdizhi').val())
             {
                 alert('����д�ջ���ַ');
                 return false;
             }
         if(!$('#youbian').val())
             {
                 alert('����д�ʱ�');
                 return false;
             }
         if(!$('#tel').val()){
             alert('����д�绰');
             return false;
         }    
         if(!$('#mobile').val())
             {
                 alert('����д�ֻ�');
                 return false;
             }
       
         if($('input[name=delivery_id]:checked').length<1){
             alert('��ѡ�񸶿ʽ!');
             return false;
         }
         
         if($('input[name=delivery_time]:checked').length<1){
             alert('��ѡ���ͻ�ʱ��!');
             return false;
         }
         $('#id_action_submit').hide();
         $('#id_action_waiting').show();
         
         
        jQuery.ajax({
            url:"ajax/orderSava.php",
            type:"POST",
            data:$('#form_checkout').serialize(),
            success:function(data){
                alert(data);
                if(data=="1")
                    {
                        location.href="orderCartOK.php?id=<?php echo $orderID;?>";
                    }
            },
            error:function(){
                alert('����');
            }
        })
       
       return false;
     });
})
</script>
</body></html>