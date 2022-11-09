<?php
require_once 'islogin.php';
require_once '../plus/DbMySQL.PHP';

$db = new DbMysql();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>留言添加页面</title>
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
<link href="images/skin.css" rel="stylesheet" type="text/css"  />
<script>
function test()
{
    if(document.admin.typeid.value=='')
        {
            alert('请选择留言所属分类');
            return false;
        }
     if(document.admin.content.value=='')
         {
             alert('请填写留言内容');
             return false;
         }
     if(document.admin.usernameshow.value=='')
         {
            alert('请填写提交用户名称');
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
        <td height="31"><div class="titlebt">留言管理</div></td>
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
            <td class="left_txt">当前位置：添加新留言</td>
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
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;留言基本信息</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<form name="admin" id="admin" method="POST" action="feedback_addSava.php" onsubmit="return test();">
               
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">所属分类：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><label for="typeid"></label>
                  <select name="typeid" id="typeid">
                  <option value="">请选择分类</option>
                  <?php
                  $result= $db->select("select id,typename from feedbackType where typezt=1 order by typeorder");
                 
                  foreach($result as $row)
                  {
                      echo "<option value='".$row["id"]."'>".$row["typename"]."</option>";
                  }
                  ?>
                  </select></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">所属分类,用于后台归类显示</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">信息状态：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input type="radio" name="issh" id="radio" value="0" />
                  待审核 
                    <input name="issh" type="radio" id="radio2" value="1" checked="checked" />
                    <label for="issh"></label>
                    已审核
                    <label for="issh"></label></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">待审核的信息在前台不显示</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">回复状态：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input type="radio" name="ishf" id="radio3" value="0" />
                  待回复 
                    <input name="ishf" type="radio" id="radio4" value="1" checked="checked" />
                    <label for="ishf">已回复</label></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
             
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">留言内容：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" colspan="2" bgcolor="#f2f2f2"> 
                  <textarea name="content" id="content" cols="45" rows="5"></textarea></td>
                </tr>
                              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">回复内容：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" colspan="2" bgcolor="#f2f2f2"> 
                  <textarea name="recontent" id="recontent" cols="45" rows="5"></textarea></td>
                </tr>
                 <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">提交用户：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input name="usernameshow" type="text" id="usernameshow" size="30" /></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">前台显示提交人姓名,可以是一个虚拟人</td>
              </tr>
 
              <tr>
                <td height="30" colspan="4" align="center" class="left_txt"><input type="submit" name="button" id="button" value="创建" />
                   &nbsp;
                   <input type="reset" name="button2" id="button2" value="重置" /></td>
                </tr>
                </form>
            </table></td>
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
