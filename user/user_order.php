<?php
require '../public/init.php';
$userinfo  = new UserInfo();
$zt=$userinfo->isok();

$order = new order();

$sql="select * from productOrder  where username='".UID."'";
$result=$db->select($sql);
$infocount=$db->affected();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ҵĶ��� - <?php echo $webname;?></title>
<link rel="stylesheet" rev="stylesheet" href="../css/base_v4.css" type="text/css"/>
<link rel="stylesheet" rev="stylesheet" type="text/css"  href="../css/main.css" />
<link rel="stylesheet" rev="stylesheet" href="../css/user.css" type="text/css" />
</head>
<body>		 	 <?php
   include WEBDIR.'/include/top.php';
?> 
		<div class="wrapper">
	 
		  <!--��Ա����ͨ��-->
		  <div class="u_top_gg u_m_bottom"></div>
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
		       
		      <div class="u_con_box">
		        <div class="u_c_header">
		          <h3>�ҵĶ���</h3>
	            </div>
		        <form name="orderForm" id="orderForm" method="post" action="">
		          <div class="u_c_main">
		            <div class="u_list">
		              <div class="u_l_body">
		                <table class="list_base def_list_2">
		                  <thead>
		                    <tr>
		                      <th width="10%">������</th>
		                      <th>������Ʒ</th>
		                      <th width="11%">�ջ���</th>
		                      <th width="11%">�������</th>
		                      <th width="10%">�µ�ʱ��</th>
		                      <th width="12%"> ֧��״̬ </th>
		                      <th width="12%"> ����״̬ </th>
		                      <th width="12%">����</th>
	                        </tr>
	                      </thead>
		                  <tbody>
  <?php
  if($result){
  foreach($result as $rows)
  {
  ?>                                    
 <tr>
    											<td><?php echo $rows["orderID"]?></td>
    											<td class="l">
  <div class="pics">
  <?php
    $infos=$order->getOrderList($rows["orderID"]);
    foreach($infos as $rowsd)
    {
        echo "<img src='{$rowsd["picurl"]}' height='60' width='60'/>";
    }
  ?>
      <a href='' title=''><img src='' alt='' height='60' width='60' /></a>
  </div></td>
    											<td class="l"> <?php echo $rows["shren"]?> </td>
    											<td><span class="red"><strong>��<?php echo $rows["price"]?></strong></span><br></td>
    											<td><span class="cbrown"><?php echo date("Y-m-d",$rows["addtime"])?><br> <?php echo date("H:i:s",$rows["addtime"])?></span></td>
    											<td>
                                                                                        <?php
                                                                                        if($rows["payment"]=='��������')
                                                                                        {
                                                                                            echo "��������";
                                                                                        }else{
                                                                                            echo $order->getPaymentState($rows["paymentState"]);
                                                                                        }
                                                                                        ?>
                                                                                        </td>
    											<td>
    											     <?php
                                                                                             echo $order->getOrderState($rows["orderState"]);
                                                                                             ?>
    											</td>
    											<td class="nobr">
                                                                                            <a class="blue2" target="_blank" href="user_orderInfo.php?id=<?php echo $rows["id"];?>">��������</a></td>
    										</tr>
                                      <?php
  }}else{
                                      ?>
                      <tr><td colspan='8' class='nobr'><div class=\"list_msg\">���޶���</div></td></tr> 
		            <?php
  }
                            ?>    
	                      </tbody>
	                    </table>
	                  </div>
		              <div class="u_l_active">
		                <!-- ��ҳ -->
		                <span class="u_list_pages fr"> ����<?php echo $infocount;?>������ </span> </div>
	                </div>
	              </div>
	            </form>
	          </div>
	        </div>
	      </div>
		  <!--�ҵĶ���----end-->
</div>
		<!-- footer -->
		 

 <?php
   include WEBDIR.'/include/foot.php';
?>
 
	<!--content ok--><!-- OK -->

</body>
</html>
