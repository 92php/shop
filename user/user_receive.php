<?php
require '../public/init.php';
$userinfo  = new UserInfo();
$zt=$userinfo->isok();

$receive= new receive();
$tj=" and username='".UID."' ";
$info= $receive->receiveList($tj);

 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ջ���ַ - <?php echo $webname;?></title>
<link rel="stylesheet" rev="stylesheet" href="<?php echo $webdir;?>css/base_v4.css" type="text/css">
<link rel="stylesheet" rev="stylesheet" type="text/css"  href="<?php echo $webdir;?>css/main.css" />
<link rel="stylesheet" rev="stylesheet" href="<?php echo $webdir;?>css/user_reg.css" type="text/css">
</head>
<body>
  	 <?php
   include WEBDIR.'/include/top.php';
?>

	    <div id="container">
		   <!-- member center start -->
		   <div class="u_content">
		     <div class="u_header u_m_bottom">
		       <h2>�ҵĵ���</h2>
	         </div>
		     <div class="member">
		           			     		<!--��Ա���Ĳ˵���ʼ-->
              <?php
              include WEBDIR."/include/userLeft.php";
			  ?>
    		<!--��Ա���Ĳ˵�����-->	
		       <div class="main">
		         <h2 class="title">�����ջ���ַ</h2>
		         <p style="text-align:right;"><img src="shouhuo_files/li_02.gif" alt="" />&nbsp;&nbsp;<a href="user_receive_add.php">����µ��ջ���ַ</a></p>
		         <div class="member_box">
		           <table>
		             <thead>
		               <tr>
		                 <td width="8%">�ջ���</td>
		                 <td width="43%">��ַ</td>
		                 <td width="7%">�ʱ�</td>
		                 <td width="15%">�绰</td>
		                 <td width="15%">�ֻ�</td>
		                 <td width="12%">����</td>
	                   </tr>
	                 </thead>
		             <tbody>
                                 <?php
                                 foreach($info as $rows)
                                 {
                                 ?>
		               <tr>
		                 <td><?php echo $rows["shren"];?></td>
		                 <td align="left"><?php echo $rows["shdizhi"];?></td>
		                 <td><?php echo $rows["youbian"];?></td>
		                 <td><?php echo $rows["tel"];?></td>
		                 <td><?php echo $rows["mobile"];?></td>
		                 <td><a href="user_receive_edit.php?id=<?php echo $rows["id"];?>">�޸�</a> | <a href="user_receiveSava.php?action=del&id=<?php echo $rows["id"];?>">ɾ��</a></td>
	                   </tr>
                                 <?php
                                 
                                 }
                                 ?>
	                 </tbody>
	               </table>
	             </div>
	           </div>
		       <div style="clear:both;"></div>
	         </div>
	      </div>
		   <!-- member center end -->
</div>
<!-- footer -->
		 
 <?php
   include WEBDIR.'/include/foot.php';
?>
 
	<!--content ok--><!-- OK -->

</body>
</html>
