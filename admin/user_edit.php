<?php
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
$id=$_GET["id"];


$db = new DbMysql();
$result=$db->select("select * from user where id=$id",1);

$username=$result["username"];
$passowrd=$result["password"];
$email=$result["email"];
$tiwen=$result["tiwen"];
$huida=$result["huida"];
$zt=$result["zt"];
$xingming=$result["xingming"];
$sex=$result["sex"];
$mobile=$result["mobile"];

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��Ա�༭ҳ��</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F8F9FA;
}
-->
</style>
<link href="images/skin.css" rel="stylesheet" type="text/css" />
 <script>
function test()
{
	if(document.admin.username.value=='')
	{
		alert('�������û�����');
		return false;
    }
//	if(document.admin.password.value=='')
//	{
//	   alert('�������½����');
//	   return false;
//	}
/*	if(document.admin.email.value=='')
	{
		alert('������Email');
		return false;
	}*/
	
	return true;
}
 </script>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td width="935" height="29" valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">��Ա����</div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="images/mail_rightbg.gif"><img src="images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td height="71" valign="middle" background="images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9">
       <div>
<!---->
                  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="left_txt">��ǰλ�ã��޸Ļ�Ա</td>
          </tr>
          <tr>
            <td height="20"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;��Ա������Ϣ</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>
                <form name="admin" id="admin" method="POST" action="user_editSava.php?id=<?php echo $id;?>" onsubmit="return test();">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
			
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">��Ա���ƣ�</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input name="username" type="text"  id="username" size="30" value="<?php echo $username;?>" /></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">��Ա�ĵ�½�˺�</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">��Ա���룺</td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" name="password" size="30" id="password" /></td>
                <td height="30" class="left_txt">��½��������������ã�����Ҫ��д</td>
              </tr>
                            <tr>
                <td height="30" align="right" class="left_txt2">��Ա���䣺</td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" name="email" size="30" id="email"  value="<?php echo $email;?>" /></td>
                <td height="30" class="left_txt">&nbsp;</td>
              </tr>
                            <tr>
                <td height="30" align="right" class="left_txt2">��ʾ���⣺</td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" name="tiwen" size="30" id="tiwen" value="<?php echo $tiwen;?>" /></td>
                <td height="30" class="left_txt">�����һ�����</td>
              </tr>
                            <tr>
                <td height="30" align="right" class="left_txt2">�ش����⣺</td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" name="huida" size="30" id="huida" value="<?php echo $huida;?>" /></td>
                <td height="30" class="left_txt">�����һ�����</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">״̬��</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><select name="zt" id="zt">
                  <option value="1" <?php if($zt==1) echo "selected";?>>�����</option>
                  <option value="2" <?php if($zt==2) echo "selected";?>>����</option>
                  <option value="3" <?php if($zt==3) echo "selected";?>>����</option>
                </select></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt">&nbsp;</td>
              </tr>
              
                             <tr>
                <td height="30" align="right" class="left_txt2">��ʵ������</td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" name="xingming" size="30" id="xingming" value="<?php echo $xingming;?>" /></td>
                <td height="30" class="left_txt">&nbsp;</td>
              </tr>
                                                                 <tr>
                <td height="30" align="right" class="left_txt2">��ν��</td>
                <td>&nbsp;</td>
                <td height="30"><label for="sex"></label>
                    <select name="sex" id="sex">
                    <option value="����" <?php if($sex=='����') echo "selected";?>>����</option>
                    <option value="Ůʿ" <?php if($sex=='Ůʿ') echo "selected";?>>Ůʿ</option>
                  </select></td>
                <td height="30" class="left_txt">&nbsp;</td>
              </tr>
                                          <tr>
                <td height="30" align="right" class="left_txt2">�ֻ����룺</td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" name="mobile" size="30" id="mobile" value="<?php echo $mobile;?>" /></td>
                <td height="30" class="left_txt">&nbsp;</td>
              </tr>
              <tr>
                <td height="30" colspan="4" align="center" class="left_txt"><input type="submit" name="button" id="button" value="�޸�" />
                   &nbsp;
                   <input type="reset" name="button2" id="button2" value="����" /></td>
                </tr>
               
            </table> </form></td>
          </tr>
        </table>
                  <!---->
                  
        </div>    
    </td>
    <td background="images/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle" background="images/mail_leftbg.gif"><img src="images/buttom_left2.gif" width="17" height="17" /></td>
      <td height="17" valign="top" background="images/buttom_bgs.gif"><img src="images/buttom_bgs.gif" width="17" height="17" /></td>
    <td background="images/mail_rightbg.gif"><img src="images/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>
</body>
</html>
