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
<title>修改资料 - <?php echo $webname;?></title>
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
		<h2>我的地盘</h2>
	</div>
	<div class="member">
		     			 	<!--会员中心菜单开始-->
              <?php
              include WEBDIR."/include/userLeft.php";
			  ?>
    		<!--会员中心菜单结束-->		
		<div class="main">
			<div>
<form name="form_edit_profile" action="user_editSava.php" method="post" id="editInfo">
<!-- start 修改资料表单 -->
<h2 class="title">修改资料</h2>
<table class="edit_profile" border="0" cellpadding="0" cellspacing="0" width="100%">
<thead><tr><td colspan="2">以下信息为必填</td></tr></thead>
<tbody> 
<tr><td width="12%">真实姓名：</td>
	<td width="88%"><input name="xingming" type="text" class="must" id="xingming" value="<?php echo $xingming;?>"><span id="xingming_error">* </span></td></tr>
		<tr><td>您的性别：</td>
	<td><select name="sex" class="must" style="width: 206px;">
			<option value="保密" selected="selected">保密</option>
			<option value="先生" <?php if($sex=='先生') echo "selected";?>>先生</option>
			<option value="女士" <?php if($sex=='女士') echo "selected";?>>女士</option>
		</select>
		<span>* </span></td></tr>
<tr><td>手机号码：</td>
	<td><input name="mobile" type="text" class="must" id="mobile" value="<?php echo $mobile;?>"><span id="mobile_error">* </span></td></tr>
 <Tr><td colspan="2"></td></Tr>
</tbody></table>
<fieldset style="border:0;text-align: center;margin-top:25px;">

		<input value="保 存" class="input_button" type="submit">

</fieldset>
<!-- end 修改资料表单 -->

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
		    $('#xingming_error').html('请填写真实姓名');
	             return false;
		  }
                  else{
                         $('#xingming_error').html('');
                  }
	
        if(!$('#mobile').val()){
             $('#mobile_error').html('请输入您的手机号码');
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
