<?php
require_once 'islogin.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������ļ�ҳ��</title>
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
    if(document.admin.varshowname.value=='')
      {
         alert('��������ʾ����');
         return false;
      }
    if(document.admin.varname.value=='')
        {
          alert('�������������');
          return false;
        }
    if(document.admin.varinfo.value=='')
        {
            alert('������һ������������');
            return false;
        }
     if(document.admin.varvalue.value=='')
         {
             alert('������һ��Ĭ������');
            return false;
        }
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
        <td height="31"><div class="titlebt">��������</div></td>
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
            <td class="left_txt">��ǰλ�ã���ӻ������ñ���</td>
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
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;�������ñ�����Ϣ</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>	<form name="admin" id="admin" method="POST" action="config_addSava.php" onsubmit="return test();"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">��ʾ���ƣ�</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="35%" height="30" bgcolor="#f2f2f2"><input name="varshowname" type="text" id="varshowname" size="30" /></td>
                <td width="42%" height="30" bgcolor="#f2f2f2" class="left_txt">�޸�ʱ����ı���ʾ</td>
              </tr>		
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">�������ƣ�</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="35%" height="30" bgcolor="#f2f2f2"><input name="varname" type="text" id="varname" size="30" /></td>
                <td width="42%" height="30" bgcolor="#f2f2f2" class="left_txt">��������,������ʹ�õ�ʱ�����</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">����������</td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" name="varinfo" size="30" id="varinfo" /></td>
                <td height="30" class="left_txt">��������,��������ʱ����һ����ʾ</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">�������ͣ�</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"  class="left_txt2"><input name="vartype" type="radio" id="radio" value="string" checked="checked" />
                  �ı� 
                    <input type="radio" name="vartype" id="radio2" value="bool" />
                    ����ֵ(��/��) 
                    <input type="radio" name="vartype" id="radio3" value="strings" />
                    �����ı�</td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt">����ʱ��ʾ��ʽ</td>
              </tr>
                  <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">�������ݣ�</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="varvalue" size="30" id="varvalue" /></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt">Ĭ������</td>
              </tr>          
 
              
              <tr>
                <td height="30" colspan="4" align="center" class="left_txt"><input type="submit" name="button" id="button" value="����" />
                   &nbsp;</td>
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
