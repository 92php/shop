<?php
require_once 'islogin.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>添加配置文件页面</title>
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
         alert('请输入显示名称');
         return false;
      }
    if(document.admin.varname.value=='')
        {
          alert('请输入变量名称');
          return false;
        }
    if(document.admin.varinfo.value=='')
        {
            alert('请输入一个变量的描述');
            return false;
        }
     if(document.admin.varvalue.value=='')
         {
             alert('请输入一个默认内容');
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
        <td height="31"><div class="titlebt">基本配置</div></td>
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
            <td class="left_txt">当前位置：添加基本配置变量</td>
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
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;基本配置变量信息</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>	<form name="admin" id="admin" method="POST" action="config_addSava.php" onsubmit="return test();"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">显示名称：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="35%" height="30" bgcolor="#f2f2f2"><input name="varshowname" type="text" id="varshowname" size="30" /></td>
                <td width="42%" height="30" bgcolor="#f2f2f2" class="left_txt">修改时候的文本提示</td>
              </tr>		
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">变量名称：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="35%" height="30" bgcolor="#f2f2f2"><input name="varname" type="text" id="varname" size="30" /></td>
                <td width="42%" height="30" bgcolor="#f2f2f2" class="left_txt">变量名称,用于在使用的时候调用</td>
              </tr>
              <tr>
                <td height="30" align="right" class="left_txt2">变量描述：</td>
                <td>&nbsp;</td>
                <td height="30"><input type="text" name="varinfo" size="30" id="varinfo" /></td>
                <td height="30" class="left_txt">变量描述,用于配置时候有一个提示</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">变量类型：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"  class="left_txt2"><input name="vartype" type="radio" id="radio" value="string" checked="checked" />
                  文本 
                    <input type="radio" name="vartype" id="radio2" value="bool" />
                    布尔值(是/否) 
                    <input type="radio" name="vartype" id="radio3" value="strings" />
                    多行文本</td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt">配置时显示形式</td>
              </tr>
                  <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">变量内容：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" bgcolor="#f2f2f2"><input type="text" name="varvalue" size="30" id="varvalue" /></td>
                <td height="30" bgcolor="#f2f2f2" class="left_txt">默认内容</td>
              </tr>          
 
              
              <tr>
                <td height="30" colspan="4" align="center" class="left_txt"><input type="submit" name="button" id="button" value="创建" />
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
