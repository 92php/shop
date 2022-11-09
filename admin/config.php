<?php
require_once 'islogin.php';
require_once '../plus/DbMysql.php';

$db= new DbMysql();
$result=$db->select("select * from webconfig");
if(count($result)<1)
{
    //echo "小于一表示没有任何变量";
    echo "<script>alert('没有任何基本参数,请前往添加!');location.href='config_add.php'</script>";
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>后台配置</title>
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
            <td class="left_txt">当前位置：基本配置变量</td>
          </tr>
          <tr>
            <td height="20"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><div class="add"><A href='config_add.php'><img src="images/add.gif" width="16" height="16" /> 添加新变量</a></div></td>
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
            <td>	<form name="admin" id="admin" method="POST" action="config_Sava.php"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		
                        <?php
                        foreach($result as $row)
                        {
                        
                        ?>
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2"><?php echo $row["varshowname"];?>：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="35%" height="30" bgcolor="#f2f2f2">
                    <?php
                      switch ($row["vartype"])
                    {
                          case "string":
                              echo "<input type='text' value='".$row["varvalue"]."' name='".$row["varname"]."'>";
                              break;
                          case "bool":
                              if($row["varvalue"]=="Y"){
                               echo "<input type='radio' value='Y' name='".$row["varname"]."' checked> 是";
                               echo "<input type='radio' value='N' name='".$row["varname"]."'> 否";
                               
                               }
                              else
                              {
                               echo "<input type='radio' value='Y' name='".$row["varname"]."'> 是";
                               echo "<input type='radio' value='N' name='".$row["varname"]."' checked> 否";                                  
                              }
                              break;
                          case "strings":
                              echo "<textarea name='".$row["varname"]."'>".$row["varvalue"]."</textarea>";
                              break;
                    }
                      
                    
                    ?>
                    
                    </td>
                <td width="42%" height="30" bgcolor="#f2f2f2" class="left_txt"><?php echo $row["varinfo"];?></td>
              </tr>
 <?php
                        }
 ?>
 
         
 
              
              <tr>
                <td height="30" colspan="4" align="center" class="left_txt"><input type="submit" name="button" id="button" value="修改" />
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
