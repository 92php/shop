<?php
require '../public/init.php';
$userinfo  = new UserInfo();
$zt=$userinfo->isok();
$userinfo=$db->select("select * from user where username='".UID."'");
$mobile=$userinfo[0]["mobile"];
$xingming=$userinfo[0]["xingming"];
$sex=$userinfo[0]["sex"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�޸����� - <?php echo $webname;?></title>
<link rel="stylesheet" rev="stylesheet" href="../css/base_v4.css" type="text/css" />
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
<form name="form_edit_profile" action="user_editSava.php" method="post" id="editInfo">
<!-- start �޸����ϱ� -->
<h2 class="title">�޸�����</h2>
<table class="edit_profile" border="0" cellpadding="0" cellspacing="0" width="100%">
<thead><tr><td colspan="2">������ϢΪ����</td></tr></thead>
<tbody> 
<tr><td width="12%">��ʵ������</td>
	<td width="88%"><input name="xingming" type="text" class="must" id="xingming" value="<?php echo $xingming;?>"><span id="xingming_error">* </span></td></tr>
		<tr><td>�����Ա�</td>
	<td><select name="sex" class="must" style="width: 206px;">
			<option value="����" selected="selected">����</option>
			<option value="����" <?php if($sex=='����') echo "selected";?>>����</option>
			<option value="Ůʿ" <?php if($sex=='Ůʿ') echo "selected";?>>Ůʿ</option>
		</select>
		<span>* </span></td></tr>
<tr><td>�ֻ����룺</td>
	<td><input name="mobile" type="text" class="must" id="mobile" value="<?php echo $mobile;?>"><span id="mobile_error">* </span></td></tr>
 <Tr><td colspan="2"></td></Tr>
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
     $('#editInfo').submit(function(){
         
         if(!$('#xingming').val())
		 {
		    $('#xingming_error').html('����д��ʵ����');
	             return false;
		  }
                  else{
                         $('#xingming_error').html('');
                  }
	
        if(!$('#mobile').val()){
             $('#mobile_error').html('�����������ֻ�����');
             return false;
        }else{
            $('#mobile_error').html('');
        }
		  
		  
		  
         
         
     });
     
 })  ;             
 </script>
	<!--content ok--><!-- OK -->

</body>
</html>
