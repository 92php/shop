<?php
require_once 'islogin.php';
require_once '../plus/DbMySQL.PHP';

$db = new DbMysql();
$id=$_GET["id"];

$db->sql("select * from feedback  where id=$id");
if($db->affected()!=1)
{
    echo "<script>alert('?????ڵ???Ϣ,??????');location.href='feedback.php'</script>";
    exit();
}

$result=$db->select("select * from feedback where id =$id",1);
 
$typeid=$result["typeid"];
$issh=$result["issh"];
$ishf=$result["ishf"];
$content=$result["content"];
$recontent=$result["recontent"];
$usernameshow=$result["usernameshow"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>???Ա༭ҳ??</title>
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
            alert('??ѡ??????????????');
            return false;
        }
     if(document.admin.content.value=='')
         {
             alert('????д????????');
             return false;
         }
     if(document.admin.usernameshow.value=='')
         {
            alert('????д?ύ?û?????');
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
        <td height="31"><div class="titlebt">???Թ???</div></td>
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
            <td class="left_txt">??ǰλ?ã??޸???????</td>
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
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;???Ի?????Ϣ</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<form name="admin" id="admin" method="POST" action="feedback_editSava.php" onsubmit="return test();">
               
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">???????ࣺ</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input type="hidden" name="id" value="<?php echo $id;?>"><label for="typeid"></label>
                  <select name="typeid" id="typeid">
                  <option value="">??ѡ??????</option>
                  <?php
                  $result= $db->select("select id,typename from feedbackType where typezt=1 order by typeorder");
                 
                  foreach($result as $row)
                  {
                      if($typeid==$row["id"])
                      {
                  echo "<option value='".$row["id"]."' selected>".$row["typename"]."</option>";       
                      }
                      else
                      {
                      echo "<option value='".$row["id"]."'>".$row["typename"]."</option>";
                  }
                  
                  }
                  ?>
                  </select></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">????????,???ں?̨??????ʾ</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">??Ϣ״̬??</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input type="radio" name="issh" id="radio" value="0" <?php if($issh==0) echo "checked";?> />
                  ?????? 
                    <input name="issh" type="radio" id="radio2" value="1" <?php if($issh==1) echo "checked";?>  />
                    <label for="issh"></label>
                    ??????
                    <label for="issh"></label></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">?????˵???Ϣ??ǰ̨????ʾ</td>
              </tr>
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">?ظ?״̬??</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input type="radio" name="ishf" id="radio3" value="0" <?php if($ishf==0) echo "checked";?> />
                  ???ظ? 
                    <input name="ishf" type="radio" id="radio4" value="1"  <?php if($ishf==1) echo "checked";?> />
                    <label for="ishf">?ѻظ?</label></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt"></td>
              </tr>
             
              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">???????ݣ?</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" colspan="2" bgcolor="#f2f2f2"> 
                  <textarea name="content" id="content" cols="45" rows="5"><?php echo $content;?></textarea></td>
                </tr>
                              <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">?ظ????ݣ?</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td height="30" colspan="2" bgcolor="#f2f2f2"> 
                  <textarea name="recontent" id="recontent" cols="45" rows="5"><?php echo $recontent;?></textarea></td>
                </tr>
                 <tr>
                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">?ύ?û???</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2"><input name="usernameshow" type="text" id="usernameshow" size="30" value='<?php echo $usernameshow;?>'/></td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">ǰ̨??ʾ?ύ??????,??????һ????????</td>
              </tr>
 
              <tr>
                <td height="30" colspan="4" align="center" class="left_txt"><input type="submit" name="button" id="button" value="?޸?" />
                   &nbsp;
                   <input type="reset" name="button2" id="button2" value="????" /></td>
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
