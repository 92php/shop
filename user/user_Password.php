<?php
require '../public/init.php';
$userinfo  = new UserInfo();
$zt=$userinfo->isok();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��վ����</title>
<link rel="stylesheet" rev="stylesheet" href="../css/base_v4.css" type="text/css"/>
<link rel="stylesheet" rev="stylesheet" type="text/css"  href="../css/main.css" />
<link rel="stylesheet" rev="stylesheet" href="../css/user_reg.css" type="text/css"/>
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
			<div>
<form name="form_edit_profile" action="user_passwordSava.php" method="post" id="edit">

<!-- start �޸����ϱ� -->
<h2 class="title">�޸�����</h2>
<table class="edit_profile" border="0" cellpadding="0" cellspacing="0" width="100%">
<thead><tr><td colspan="2">������ϢΪ����</td></tr></thead>

<tbody><tr>
	<td width="15%">ԭʼ���룺</td>
	<td width="85%"><input name="yPassword" class="must" type="text" id="yPassword"><span id="ypwd_error">* </span></td></tr>
<tr>
	<td>�������룺</td>
	<td><input name="xPassword" class="must" type="text" id="xPassword"><span id="xpwd_error">* </span></td></tr>
<tr>
	<td>ȷ�����룺</td>
	<td><input name="qPassword" value="" class="must" type="text" id="qPassword"><span id="qpwd_error">* </span></td></tr>
 <Tr><td></td><td></td></Tr>
</tbody></table>

 

<fieldset style="border:0;text-align: center;margin-top:25px;">

		<input value="�� ��" class="input_button" type="submit">

</fieldset>
<!-- end �޸����ϱ� -->

				</form>
			
			</div>
		</div>

 

			<div style="clear:both;"></div>
	</div>
	</div>	<!-- member center end -->

</div>
	 

	 
		 

		<!-- footer -->
		 
<?php
   include WEBDIR.'/include/foot.php';
?>
 
 <script type="text/javascript">
 $(function(){
	$('#edit').submit(function(){
		 
		 if(!$('#yPassword').val()){
			 $('#ypwd_error').html('����д����');
 
			 return false;
			 }
                         else
                         {
                                  $('#ypwd_error').html('');
                         }
		 		 if(!$('#xPassword').val()){
			 $('#xpwd_error').html('����д������');
 
			 return false;
			 }
                         else
                         {
                                  $('#ypwd_error').html('');
                         }
                         
 		 	if(!$('#qPassword').val()){
			 $('#qpwd_error').html('����дȷ������');
 
			 return false;
			 }
                         else
                         {
                                  $('#qpwd_error').html('');
                         } 
                         
                         if($('#qPassword').val()!=$('#xPassword').val()){
                             $('#qpwd_error').html('��ȷ���������������һ��');
                             return false;
                         }
  
		}) 
	 
  })
 
 </script>
	<!--content ok--><!-- OK -->

</body>
</html>
