<?php
require_once '../config/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>会员登录 - <?php echo $webname;?></title>
<link rel="stylesheet" rev="stylesheet" href="<?php echo $webdir;?>css/common.css" type="text/css">
<link rel="stylesheet" rev="stylesheet" href="<?php echo $webdir;?>css/cart.css" type="text/css">
</head>

<body>
<div id="container">
	<div class="header">
		<span class="help" style="font-size: 14px; font-weight: bold;"><a href="" target="_blank">帮助</a></span>
		<div style="padding:12px 0 0 15px;"><a href=""><img src="<?php echo $webdir;?>images/logo.gif" alt=""></a>
        </div>
	</div>
 
<style type="text/css">
.reglogin_box{border:0px;}
.h2_reglogin_a1{height:28px;text-indent:-999em;background:url(<?php echo $webdir;?>images/reglogin_titlebg.png) no-repeat 0 0;}
.h2_login_a1{background-position:0 0;}
.h2_reg_a1{background-position:-404px 0;}
.div_reglogin{margin:10px 0 0 0;height:260px;border:1px solid #dfdfdf;}
.btn_reglogin{background:#ed1b24;height:23px;line-height:23px;color:#fff;font-weight:bold;padding:0 25px;*padding:0 12px;border:0px;}
.shopping_cart_login_box div.bottom{padding:8px 0 0 0;overflow:hidden;zoom:1;margin:20px 13px 0;border-top:1px solid #ccc;}
</style>

	<div class="shopping_cart_login_box">
		<div class="login_box reglogin_box">
			<h2 class="h2_reglogin_a1 h2_login_a1">会员登录</h2>
			<div class="div_reglogin">
				<form name="form_login2" action="user_loginSava.php" method="post" id="formLogin">
				<input name="action" value="login" type="hidden">
			 
				<table class="login_table" border="0" cellpadding="5" cellspacing="5" width="90%">
				<tbody><tr>
					<td align="right" height="34" width="25%">E-mail：</td>
					<td width="75%">
						<input class="txtinput" id="login_username" name="login_username" style="width: 140px;" type="text">
						<span class="post_error" id="username_error">&nbsp;</span>
					</td>
				</tr>
				<tr>
					<td align="right" height="34">密　码：</td>
					<td>
						<input class="txtinput" id="login_password" name="login_password" style="width: 140px;" value="" type="password">
						<span class="post_error" id="password_error">&nbsp;</span>
					</td>
				</tr>
				<tr>
					<td align="right" height="26">验证码：</td>
					<td> 
    <input class="txtinput" onfocus="codeF('#imglogin_verifycode')" name="login_code" style="width:65px;" maxlength="4" type="text" id="login_code">
						<img id="imglogin_verifycode" class="vam hand dpn" >
						<span class="login_code_error" id="login_code_error">&nbsp;</span>
					</td>
				</tr>
				<tr>
					<td height="34">&nbsp;</td>
					<td><span class="login_btn"><input class="btn_reglogin js_login" value="登 录" type="submit"></span><span class="forget"><a href="" target="_blank" style="padding-top: 15px; color: rgb(236, 29, 39);">忘记密码？</a></span></td>
				</tr>
				</tbody></table>
				</form>
				<div class="bottom">
					 欢迎登陆
				</div>
			</div>
		</div>
		<div class="reg_box reglogin_box">
			<h2 class="h2_reglogin_a1 h2_reg_a1">快速注册</h2>
			<div class="div_reglogin">
				<form name="form_register" id="regform" action="" method="post" style="padding-top:5px;">
				<input name="action" value="register" type="hidden">
				<input name="referer_url" value="" type="hidden">
				<table class="login_table" border="0" cellpadding="5" cellspacing="5" width="95%">
				<tbody><tr>
					<td align="right" width="30%">您的Email地址：</td>
					<td width="70%">
						<input class="txtinput" id="input_register_username" name="username" style="width: 140px;" type="text">
						<span id="span_register_username" class="post_error">&nbsp;</span>
					</td>
				</tr>
				<tr>
					<td align="right"></td>
					<td style="color: rgb(136, 136, 136); line-height: 1.5;">请填写有效的 Email，我们会给这个地址发送您的帐户信息、订单通知等。</td>
				</tr>
				<tr>
					<td align="right" height="25">设置密码：</td>
					<td>
						<input class="txtinput" id="input_register_password" name="password" style="width: 140px;" value="" type="password">
						<span id="span_register_password" class="post_error">&nbsp;</span>
					</td>
				</tr>
				<tr>
					<td align="right" height="25">再次输入密码：</td>
					<td>
						<input class="txtinput" id="input_register_password_confirm" name="password_confirm" style="width: 140px;" value="" type="password">
						<span id="span_register_password_confirm" class="post_error">&nbsp;</span>
					</td>
				</tr>
				<tr>
					<td align="right" height="24">验证码：</td>
					<td>
					 <input class="txtinput" onfocus="codeF('#regcode')" name="code" style="width:65px;" maxlength="4" type="text" id="code">
						<img id="regcode" class="vam hand dpn" >
						<span id="regcode_error" class="code_error">&nbsp;</span>
					</td>
				</tr>
				<tr>
					<td height="30">&nbsp;</td>
					<td><input class="btn_reglogin js_register" value="同意协议并注册" type="submit"></td>
				</tr>
				<tr>
					<td align="right" height="24">&nbsp;</td>
					<td>
						阅读《<a href="" target="_blank">用户注册协议</a>》
					</td>
				</tr>
				</tbody></table>
				</form>
			</div>
		</div>
		<div style="clear:both;"></div>
			</div>

	<div style="clear:both;"></div>
	<!-- footer start -->
<div class="footer_checkout"> 后盾网商城系统 2010-2011 </div>
<script src="../Images/jquery.js" type="text/javascript"></script>
<script src="../Images/index_v5.js" type="text/javascript"></script>  
<script>
$(function(){
//注册
$('#regform').submit(function(){
     var username = $('#input_register_username').val();
        if(!username)
           {
               $('#span_register_username').html('请输入账号！');
                return false;
           }
           else
           {
                //进入判断
                if(isemail(username))
                    {
                    $('#span_register_username').html('');  
                    }
                    else
                     {
                    $('#span_register_username').html('错误的账号格式！'); 
                    return false;
                     }
              
           }
           
                   var password =$('#input_register_password').val();
        if(!password)
            {
                 $('#span_register_password').html('请输入密码');
                   return false;
            }
            else
                {
                 $('#span_register_password').html('');
                
                }
         var password =$('#input_register_password_confirm').val();
        if(!password)
            {
                 $('#span_register_password_confirm').html('请输入密码');
                 return false;
            }
            else
            {
                 if($('#input_register_password_confirm').val()!=$('#input_register_password').val()){
                  $('#span_register_password_confirm').html('请输入相同的密码');
                  return false;
                 }else{
                 $('#span_register_password_confirm').html('');}
            }    
            
     jQuery.ajax({
	url:"../ajax/ajaxUserRegSava.php",
	data:$('#regform').serialize(),
	type:"POST",
	success:function(data){
		  //alert(data);
		  switch(data)
		  {
			  case "0":
			     $('#regcode_error').html('验证码错误！');
				break;
			  case "5":
			    $('#span_register_username').html('账号已存在!');
				break;	
			  case "1":
			     alert('账号注册成功，但是需要管理员审核后才能使用!');
				 break;
			  case "2":
			     location.href="user_Main.php";
				 break;	 
			   default:
			   alert('未知错误,登陆失败，请联系管理员');	 		
		  }
		  
		},
	error:function(e){
		 //错误的页面.
		  alert('表单提交错误');
		}
	});	
	
 
  
    return false;
});
    $('#code').blur(function(){
       // var code=$('#input_register_password').val();
        if(!$(this).val()) 
            {
                 $('#regcode_error').html('请输入验证码');
            }
            else
                {
                 $('#regcode_error').html('');
                }
    });
    $('#input_register_password').blur(function(){
        var password =$('#input_register_password').val();
        if(!password)
            {
                 $('#span_register_password').html('请输入密码');
            }
            else
                {
                 $('#span_register_password').html('');
                }
    });
    $('#input_register_password_confirm').blur(function(){
        var password =$('#input_register_password_confirm').val();
        if(!password)
            {
                 $('#span_register_password_confirm').html('请输入密码');
            }
            else
            {
                 if($('#input_register_password_confirm').val()!=$('#input_register_password').val()){
                  $('#span_register_password_confirm').html('请输入相同的密码');
                 }else{
                 $('#span_register_password_confirm').html('');}
            }
    });    
    $('#input_register_username').blur(function(){
        var username = $('#input_register_username').val();
        if(!username)
           {
               $('#span_register_username').html('请输入账号！');
           }
           else
           {
                //进入判断
                if(isemail(username))
                    {
                    $('#span_register_username').html('');  
                    }
                    else
                     {
                    $('#span_register_username').html('错误的账号格式！');      
                     }
              
           }
    });


//登陆	
$('#formLogin').submit(function(){
var username=$('#login_username').val();
if(!username)
{
    $('#username_error').html('请输入账号！');
    return false;
}

 if(!isemail(username))
{
    $('#username_error').html('错误的账号格式！'); 
    return false;
}

var password=$('#login_password').val();
if(!password)
    {
     $('#password_error').html('请输入密码！'); 
       return false;
    }
var code = $('#login_code').val();
if(!code)
    {
        $('#login_code_error').html('请输入验证码!');
        return false;
    }
jQuery.ajax({
	url:"userLoginSava.php",
	data:$('#formLogin').serialize(),
	type:"POST",
	success:function(data){
		  //alert(data);
		  switch(data)
		  {
			  case "0":
			    $('#login_code_error').html('验证码错误！');
				break;
			  case "-1":
			    $('#username_error').html('账号不存在!');
				break;	
			  case "-2":
			    $('#password_error').html('密码错误！');
				break;
			  case "1":
			     $('#username_error').html('账号未通过审核!');
				 break;
			  case "3":
			     $('#username_error').html('账号被锁定！');
				 break;	 
			  case "2":
			      location.href="user_main.php";
				 break;	 
			   default:
			   alert('未知错误,登陆失败，请联系管理员');	 		
		  }
		  
		},
	error:function(e){
		 //错误的页面.
		  alert('表单提交错误');
		}
	});	
	
return false; 
});
	});

    $('#login_password').blur(function(){
        var password =$('#login_password').val();
        if(!password)
            {
                 $('#password_error').html('请输入密码');
            }
            else
                {
                 $('#password_error').html('');
                }
    });
    $('#login_username').blur(function(){
        var username = $('#login_username').val();
        if(!username)
           {
               $('#username_error').html('请输入账号！');
           }
           else
           {
                //进入判断
                if(isemail(username))
                    {
                    $('#username_error').html('');  
                    }
                    else
                     {
                    $('#username_error').html('错误的账号格式！');      
                     }
              
           }
    });
function isemail(str)
{
    var search_str=/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
    if(!search_str.test(str))
        {
            return false;
        }
 return true;       
}
</script>
	<!-- footer end -->
</div>
</body>
</html>
