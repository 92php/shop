<?php
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
$id=$_GET["id"];
$db= new DbMysql();

$result=$db->select("select * from assess where id=$id",1);

$pid=$result["pid"];
$issh=$result["issh"];
$istop=$result["istop"];
$recommend=$result["recommend"];
$pinglun=$result["pinglun"];
$content=$result["content"];
$usernameshow=$result["usernameshow"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���۱༭ҳ��</title>
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
	if(document.admin.pid.value=='')
	{
		alert('��ƷID����Ϊ��');
		return false;
	}	
	if(document.admin.content.value=='')
	{
		alert('�������ݲ���Ϊ��');
		return false;
	}
	if(document.admin.usernameshow.value=='')
	{
		alert('�ύ�˲���Ϊ��');
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
        <td height="31"><div class="titlebt">���۹���</div></td>
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
            <td class="left_txt">��ǰλ�ã��޸�����</td>
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
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;���۹���������Ϣ</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><form name="admin" id="admin" method="POST" action="assess_editSava.php" onsubmit="return test();"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			
              <tr>
                <td width="10%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">������Ʒ��</td>
                <td width="1%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input name="id" type="hidden" value="<?php echo $id;?>"><input name="pid" type="text" id="pid" size="30" value="<?php echo $pid;?>" /></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">����������Ʒ��ID��</td>
              </tr>
              
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">��Ϣ״̬��</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input type="radio" name="issh" id="radio" value="0" <?php if($issh==0) echo "checked";?> />
                  ����� 
                    <input name="issh" type="radio" id="radio2" value="1" <?php if($issh==1) echo "checked";?> />
                    <label for="issh"></label>
                    �����
                    <label for="issh"></label></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">����˵���Ϣ��ǰ̨����ʾ</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">�ö�״̬��</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input type="radio" name="istop" id="radio3" value="0" <?php if($istop==0) echo "checked";?> />
                  ���ö� 
                    <input name="istop" type="radio" id="radio4" value="1" <?php if($istop==1) echo "checked";?> />
                    <label for="istop">���ö�</label></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">�Ƽ�״̬��</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input type="radio" name="recommend" id="radio3" value="0" <?php if($recommend==0) echo "checked";?> />
                  ���Ƽ� 
                    <input name="recommend" type="radio" id="radio4" value="1" <?php if($recommend==1) echo "checked";?>/>
                    <label for="istop">���Ƽ�</label></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">���۵ȼ���</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><label for="pinglun"></label>
                  <select name="pinglun" id="pinglun">
                    <option value="1" <?php if($pinglun==1) echo "selected";?>>һ��</option>
                    <option value="2" <?php if($pinglun==2) echo "selected";?>>����</option>
                    <option value="3" <?php if($pinglun==3) echo "selected";?>>����</option>
                    <option value="4" <?php if($pinglun==4) echo "selected";?>>����</option>
                    <option value="5" <?php if($pinglun==5) echo "selected";?>>����</option>
                  </select></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">�������ݣ�</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" colspan="2" bgcolor="#f2f2f2"> 
                  <textarea name="content" id="content" cols="45" rows="5"><?php echo $content;?></textarea></td>
                </tr>
                          
                 <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">�ύ�û���</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input name="usernameshow" type="text" id="usernameshow" size="30" value="<?php echo $usernameshow;?>" /></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">ǰ̨��ʾ�ύ������,������һ��������</td>
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