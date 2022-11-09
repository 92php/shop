<?php
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$id     = $_GET["id"];
$db     = new DbMysql();
$result = $db->select("select * from productPP  where id=$id",1);

$ppname    = $result["ppname"];
$pporder   = $result["pporder"];
$recommend = $result["recommend"];
$picurl    = $result["picurl"];
$ppinfo    = $result["ppinfo"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>商品品牌编辑页面</title>
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
    if(document.admin.ppname.value=='')
        {
           alert('品牌名称不能为空');
           return false;
        }
     if(document.admin.pporder.value=='')
         {
            alert('品牌排序不能为空');
            return false;
         }
     if(document.admin.picurl.value=='')
         {
            alert('请填写品牌LOGO地址');
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
        <td height="31"><div class="titlebt">品牌管理</div></td>
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
            <td class="left_txt">当前位置：修改新品牌</td>
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
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;品牌基本信息</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <form action="product_ppEditSava.php?id=<?php echo $id;?>" method="POST"  name="admin" id="admin" onsubmit="return test();">
             
              <tr>
                <td width="10%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">品牌名称：</td>
                <td width="1%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input name="ppname" type="text" id="webname" size="30" value='<?php echo $ppname;?>' /></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">&nbsp;</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">排序位置：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><label for="typeid">
                  <input name="pporder" type="text" id="pporder" size="30" value="<?php echo $pporder;?>" />
                </label></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">顺序排序，数字越小越靠前</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">是否推荐：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input type="radio" name="recommend" id="radio" value="1" <?php if($recommend==1) echo "checked";?> />是
                  <input name="recommend" type="radio" id="radio2" value="2" <?php if($recommend==2) echo "checked";?> />否
                    <label for="recommend"></label>
<label for="recommend"></label></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">是否推荐</td>
              </tr>
              
              <tr id="logotr">
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">图片地址：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><label for="picurl"></label>
                  <input name="picurl" type="text" id="picurl" size="30"  value="<?php echo $picurl;?>"/></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt"><iframe src="uploadPic.php" frameborder="0" width="350" height="30"></iframe>&nbsp;</td>
              </tr>
             
               
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">品牌简介：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><textarea name="ppinfo" cols="30" rows="5" id="ppinfo"><?php echo $ppinfo;?></textarea></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">简短的描述品牌的信息</td>
              </tr>
 
              
              <tr>
                <td height="30" colspan="4" align="center" class="left_txt"><input type="submit" name="button" id="button" value="确认修改" />
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
