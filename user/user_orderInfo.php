<?php
require '../public/init.php';
$userinfo  = new UserInfo();
$zt=$userinfo->isok();

$id=$_GET["id"];

$order = new order();

$sql="select * from productOrder  where username='".UID."' and id='$id'";
$result=$db->select($sql,1);
$infocount=$db->affected();

 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<link rel="stylesheet" rev="stylesheet" href="../css/base_v4.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="../css/user.css" media="all"/>
<title>�ҵĶ���<?php echo $result["orderID"];?>����</title>
<style type="text/css" id="suggest-style">html{color:#333;background:#fff;}body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td{margin:0;padding:0;}table{border-collapse:collapse;border-spacing:0;}fieldset,img{border:0;}address,caption,cite,code,dfn,em,th,var{font-style:normal;font-weight:normal;}li{list-style:none;}caption,th{text-align:left;}h1,h2,h3,h4,h5,h6{font-size:100%;}q:before,q:after{content:'';}abbr,acronym{border:0;font-variant:normal;}sup{vertical-align:text-top;}sub{vertical-align:text-bottom;}input,textarea,select{font-family:inherit;font-size:inherit;font-weight:inherit;}input,textarea,select{*font-size:100%;}legend{color:#333;}.clear{height:0;font-size:0;line-height:0;clear:both;}
body{font-size:12px;background:#fff;font-family:tahoma,verdana,arial,helvetica,sans-serif;text-align:center;color:#333;}
a{color:#333;text-decoration:none;}
a:hover{color:#cc0000;}.suggest-container{background:white;border:1px solid #999;z-index:99999}.suggest-shim{z-index:99998}.suggest-container li{color:#404040;padding:1px 0 2px;font-size:12px;line-height:18px;float:left;width:100%}.suggest-container li.selected{background-color:#39F;cursor:default}.suggest-key{float:left;text-align:left;padding-left:5px}.suggest-result{float:right;text-align:right;padding-right:5px;color:green}.suggest-container li.selected span{color:#FFF;cursor:default}.suggest-bottom{padding:0 5px 5px}.suggest-close-btn{float:right}.suggest-container li,.suggest-bottom{overflow:hidden;zoom:1;clear:both}.suggest-container{*margin-left:2px;_margin-left:-2px;_margin-top:-3px}</style>
 
</head>
<body>
 	 	 <?php
   include WEBDIR.'/include/top.php';
?> 
	<!--head_top-start-->
 
		<!-- header -->
		 


<!--head_top-end-->	<div class="wrapper">
		<!--�ҵĶ�������start-->
		<!--��Ա����ͨ��-->
		    <div class="u_top_gg u_m_bottom">     </div>
		<div class="u_header u_m_bottom">
			<h2>��Ա����</h2>
		</div>
		<div class="u_content">
    	 
   <!--��Ա���Ĳ˵�-->
    			<div class="u_wrap_l">
    <?php
              include WEBDIR."/include/userLeft.php";
			  ?>
	           </div>
             <!--��Ա���Ĳ˵�����-->  
			<div class="u_wrap_r2">
							 
				 
                        
                                 
				<div class="order_base_info">
                                                   
                                    <h2><span>�����ţ�<?php echo $result["orderID"];?></span><span>�µ�ʱ�䣺<?php echo date($result["addtime"]);?></span><span>��ǰ����״̬��<strong id="order_status"> 
                                                  <?php
                                                  echo  $order->getOrderState($result["orderState"]);
                                                  ?>
                                          </strong></span></h2>
 
			 
				</div>
         
              
																			 
								<div class="u_con_box">
					<div class="u_c_header">
						<h3>��������</h3>
					</div>
					<div class="u_c_main">
						<div class="u_c_p15">
							<dl class="order_info_dl">
								<dt>
									<h4>�ջ���Ϣ</h4>
								</dt>
								<dd>
									<table>
										<tbody><tr>
											<th>��&nbsp;&nbsp;��&nbsp;�ˣ�</th>
											<td><?php echo $result["shren"];?></td>
										</tr>
										<tr>
											<th>�ջ���ַ��</th>
											<td><?php echo $result["shdizhi"];?></td>
										</tr>
										<tr>
											<th>��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</th>
											<td><?php echo $result["tel"];?></td>
										</tr>
										<tr>
											<th>��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</th>
											<td><?php echo $result["mobile"];?></td>
										</tr>
									</tbody></table>
								</dd>
								<dt>
									<h4>֧����������Ϣ</h4>
								</dt>
								<dd>
									<table>
										<tbody><tr>
											<th>֧����ʽ��</th>
                                                                                    <td><?php echo $result["payment"];?></td> 
										</tr>
										<tr>
											<th>���ͷ�ʽ��</th>
											<td>���п��</td>
										</tr>
										<tr>
											<th>��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѣ�</th>
											<td>��<?php echo $result["yunfei"];?></td>
										</tr>
										<tr>
											<th>�ͻ�ʱ�䣺</th>
											<td><?php echo $result["dTime"];?></td>
										</tr>
									</tbody></table>
								</dd>
															</dl>
							
							<div class="my_goods_list">
								<h4 style="display:inline;">��Ʒ�嵥</h4> 								<table class="list_base def_list">
									<thead>
										<tr>
											<th>��Ʒ</th>
											<th width="20%">�����</th>
											<th width="20%">����</th>
											<th width="20%">�����ֿ�</th>
										</tr>
									</thead>
									<tbody>	
                                                                            
                                                                       
                                                                  <?php
                                                                  $qd= $order->getOrderList($result["orderID"]);
                                                                 foreach($qd as $row){
                                                                  ?>        
                                                               <tr> 
								    <td class=\"l\">
								   <div class=\"m_g_info\"> 
									 <div class=\"m_g_title\"><A href='../product/show.php?id=<?php echo $row["pid"]?>' target='_blank' title='".$v["title"]."'><img src='<?php echo $row["picurl"]?>' height='40' width='40' /></a></div> 
                                     </div> 
								 </td> 
							 <td><span class=\"red\">��<?php echo $row["unitPrice"]?> </span></td> 
							 <td><?php echo $row["total"];?></td> 
								 <td>����</td> 												
								 </tr> 	
                                                                            <?php
                                                                 }
                                                                            ?>
                                                                        </tbody>
								</table>
								<div class="my_goods_count">
									<ul>
										<li>�����<span>��<?php echo $result["price"]?></span></li>
										<li>�˷ѣ�<span>��<?php echo $result["yunfei"]?></span></li>
										<li>�Żݣ�<span>��<?php echo $result["youhui"]?></span></li>
										<li class="red b">֧����<?php echo $result["price"]?><span></span></li>
									</ul>
								</div>
                  
								 
															</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		 
	</div>
 
 <?php
   include WEBDIR.'/include/foot.php';
?>
 
<!--footer-end-->

</body></html>