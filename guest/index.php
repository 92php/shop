<?php
require "../public/init.php";
$sql="select * from feedback";
$parm=" where 1 ";
$parm.=" and issh=1";
$sql.=$parm." order by id desc ";

$db->sql($sql);
$infocount=$db->affected();
$pagesize=10;

$page= new page($infocount, $pagesize);

$sql.=$page->limit();
 
 
$list=$db->select($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���Ա� - <?php echo $webtitle;?></title>
<link rel="stylesheet" rev="stylesheet" href="../css/base_v4.css" type="text/css"/>
<link href="../css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
   include '../include/top.php';
?>
 <div class="wrapper">
	<!-- list_main start -->

	<div class="page_main page_all">
		<div class="location eventlocation"><a href="">�����</a> <span>&gt;&gt;</span> <a href="">���԰�</a></div>
		<div style="background:#F2F5F5;margin-top:5px;font-size:14px;padding:13px 0;">
			<div style="width:930px;margin:0 auto;overflow: hidden;background-color: #fff;">
			
				<div style="background:#fff;width:464px;float: left;">
					<div style="padding:0px 15px 25px 15px;font-size:14px;">
						<div>
						<img style="padding: 20px 0pt 25px 10px;" src="../images/message_board01.jpg" alt="��������" height="117" width="239">
							 <?php
                                                         foreach($list as $rows)
                                                         {
                                                         ?>
                                                    <div class="feedback_message bg1">
								<div class="info"><span class="addtime">������ <?php echo date("Y-m-d H:i:s",$rows["addtime"]);?></span><span class="name"><?php echo $rows["usernameshow"]?></span> </div>
								<div class="content"><?php echo $rows["content"]?></div>
								<div class="reply">
                                                                    <?php
                                                                    if($rows["ishf"]==0)
                                                                    {
                                                                        echo "��ȴ��ظ���";
                                                                    }else
                                                                    {
                                                                        echo "����Ա�ظ���{$rows["recontent"]}";
                                                                    }
                                                                    ?>
                                                                     </div>
							</div>
								<?php
                                                         }
                                                                ?>											</div>
												<div class="pages tac"><?php echo $page->show(1);?></div>
											</div>
				</div>

				<div style="background:#fff;float: left;display: inline;margin-top: 20px; width:465px;border-left: 1px dashed #999; overflow:hidden;">
				
					<!-- start -->
					<div style="width:434px;margin:0 auto;padding:0 15px;">
						<form id="messageForm" name="messageForm" method="post" action="sava.php">
						<div>
							<div style="padding:20px 0 0;">
							<span style="display:block;text-align:center;font-size:14px;font-weight:bold;color:red;"></span>
                           	 <div style="line-height:22px;overflow:hidden;zoom:1; padding:0 0 10px;margin:0 0 10px;border-bottom:1px dotted #ccc;"><span style="float:left;font-size:14px;font-weight:bold;color:#c00;">���Է��ࣺ</span><div style="float:left;width:350px;font-size:12px;font-weight:normal;color:#333;"><input name="message_kind_s" value="3" type="radio">�ۺ�����&nbsp;&nbsp; <input name="message_kind_s" value="4" type="radio">��Ʒ��ѯ&nbsp;&nbsp; <input name="message_kind_s" value="5" type="radio">���ѯ&nbsp;&nbsp; <input name="message_kind_s" value="6" type="radio">���Ϳ����ѯ <br><input name="message_kind_s" value="7" type="radio">֧����ѯ&nbsp;&nbsp; <input name="message_kind_s" value="8" type="radio">������ѯ&nbsp;&nbsp; <input name="message_kind_s" value="9" type="radio">��ǰ����</div></div>
								<div style="line-height:22px;font-size:14px;font-weight:bold;color:#c00;">�������ݣ�<span style="color:#999;">(300������)</span></div>
							</div>
							<div style="padding:5px 0 0 0;">
								<textarea id="content" name="content" rows="10" style="padding: 5px; border: 2px solid rgb(204, 204, 204); width: 420px; font-size: 14px; background: url(&quot;../images/thanks.gif&quot;) no-repeat scroll 180px 150px rgb(255, 255, 255);"></textarea>
								<p><span id="content_error" style="color:red;font-size:12px"></span></p>
							</div>
<div style="margin: 10px 0 0 0;color: #c00;line-height: 170%;">��ܰ���ѣ��ύ���Ժ����ҳ��ײ�����ͨ������ʱ��д���ֻ����롢emai�Ȳ�ѯ�ͷ��ظ�</div>
							<!-- ��ϵ��Ϣ ��ʼ -->
							<div style="padding:15px 0 0 15px;">
							<table border="0" cellpadding="0" cellspacing="0">
								<tbody><tr>
									<td height="38" width="82">&nbsp;�����ˣ�</td>
								  <td width="337"><input id="uname" name="uname" size="20" style="border: 2px solid rgb(204, 204, 204); height: 22px; background: none repeat scroll 0% 0% rgb(255, 255, 255);" type="text"> <span style="font-size:12px;color:#999;"></span><p><span id="uname_error" style="color:red;font-size:12px"></span></p></td>
							  </tr>
								<tr>
									<td style="background: none repeat scroll 0% 0% rgb(255, 255, 238);" height="38">&nbsp;�ֻ����룺</td>
									<td style="background: none repeat scroll 0% 0% rgb(255, 255, 238);"><input id="phone" name="phone" size="20" style="border: 2px solid rgb(204, 204, 204); height: 22px; background: none repeat scroll 0% 0% rgb(255, 255, 255);" type="text"><span style="color:red">*</span> <span style="font-size:12px;color:#999;">��ʵ����</span><p><span id="phone_error" style="display:none;color:red;font-size:12px"></span></p></td>
								</tr>
								<tr>
									<td style="background: none repeat scroll 0% 0% rgb(255, 255, 238);" height="38">&nbsp;QQ��</td>
									<td style="background: none repeat scroll 0% 0% rgb(255, 255, 238);"><input id="qq" name="qq" size="20" style="border: 2px solid rgb(204, 204, 204); height: 22px; background: none repeat scroll 0% 0% rgb(255, 255, 255);" type="text"> <span style="font-size:12px;color:#999;"></span></td>
								</tr>
								<tr>
									<td style="background: none repeat scroll 0% 0% rgb(255, 255, 238);" height="38">&nbsp;���䣺</td>
									<td style="background: none repeat scroll 0% 0% rgb(255, 255, 238);"><input id="email" name="email" size="40" style="border: 2px solid rgb(204, 204, 204); height: 22px; background: none repeat scroll 0% 0% rgb(255, 255, 255);" type="text"> <span style="font-size:12px;color:#999;">����д��������</span></td>
								</tr>
								<tr>
									<td style="background: none repeat scroll 0% 0% rgb(255, 255, 238);" height="38">&nbsp;������</td>
									<td style="background: none repeat scroll 0% 0% rgb(255, 255, 238);"><input id="wangwang" name="wangwang" size="20" style="border: 2px solid rgb(204, 204, 204); height: 22px; background: none repeat scroll 0% 0% rgb(255, 255, 255);" type="text"> <span style="font-size:12px;color:#999;">���������û���</span></td>
								</tr>
								<tr>
									<td colspan="2" style="color: rgb(153, 153, 153); font-size: 12px; padding-top: 10px;" height="24">&nbsp;Ϊ��ֹ���Ⱥ����������������ԣ����ͷ�����������֤�룺</td>
								</tr>
								<tr>
									<td height="38">&nbsp;��֤�룺</td>
									<td><input id="input_message_verifycode" name="verifycode" maxlength="4" size="6" style="border: 2px solid rgb(204, 204, 204); height: 22px; background: none repeat scroll 0% 0% rgb(255, 255, 255);" type="text" onfocus="codeF('#img_feedback_verifycode')"> <img src="book_files/verifycode.png" id="img_feedback_verifycode" alt=""><p><span id="verifycode_error" style="color:red;font-size:12px"></span></p></td>
								</tr>
							</tbody></table>
							</div>
							<!-- ��ϵ��Ϣ ���� -->

							<div style="padding:5px 0 0 95px;color:#999;font-size:12px;">������Ϣ��������˽���������ŵ�����������͸¶��</div>
							<div style="text-align:center;padding:20px 0 30px 0;"><input onclick="return checkForm();" src="../images/feedback_btn.gif" type="image"></div>
							<div style="padding:30px 0 30px 0;text-align:center;font-size:14px;"></div>
						</div>
						</form>
					</div>
					<!-- end -->

				</div>
 
			</div>
		</div>
	</div>
	<!-- list_main end -->
	
<script>

function checkForm()
{
	var content = $('#content').val();
	var uname = $('#uname').val();
	var qq = $('#qq').val();
	var wangwang = $('#wangwang').val();
	var email = $('#email').val();
	var phone = $('#phone').val();
	var input_message_verifycode = $('#input_message_verifycode').val();

	if (content == '')
	{
		$('#content_error').html('����д��������');
		$('#content_error').show();
		return false;
	}
	else
	{
		$('#content_error').hide();
	}

	if(uname == '')
	{
		$('#uname_error').html('��ϵ�˱�����д');
		$('#uname_error').show();
		return false;
	}
	else
	{
		$('#uname_error').hide();
	}

	if(phone=='')
	{
		$('#phone_error').html('�ֻ����������д');
		$('#phone_error').show();
		return false;
	}
	else if( phone.length != 11)
	{
		$('#phone_error').html('�ֻ������ʽ����ȷ');
		$('#phone_error').show();
		return false;
	}else
	{
		$('#phone_error').hide();
	}

	if (input_message_verifycode == '')
	{
		$('#verifycode_error').html('��֤�벻��Ϊ��');
		$('#verifycode_error').show();
		return false;
	}

}

</script>

<style type="text/css">
input.feedback_input {
	border:2px solid #D8D8D8;
	padding:2px;
	width:176px;
	height:19px;
	background:#fff;
	color:#294B61;
	font-size:14px;
}
.feedback_message {
	margin-bottom:10px;
	padding:8px 10px;
	color:#294B61;
}
.feedback_message .info {
	border-top:1px dashed #ADCBD3;
	border-bottom:1px dashed #ADCBD3;
	background:#F1F5F5;
	height:26px;
	line-height:26px;
	font-size:12px;
}
.feedback_message .info span.name {
	padding-left:10px;
	font-weight:bold;
}
.feedback_message .info span.addtime {
	color:#999;
	float:right;
	padding-right:10px;
}
.feedback_message .content {
	padding:10px;
	line-height:1.6;
}
.feedback_message .reply {
	font-size:12px;
	padding-left:30px;
	color:#D75509;
	background:url(../images/icon_replay.gif) no-repeat 10px 2px;
	line-height:1.6;
}
</style>

	
	</div>

	 
	
<?php
   include '../include/foot.php';
?>	 

		 
	<!--content ok--><!-- OK -->

</body>
</html>
