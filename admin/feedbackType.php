<?php
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
require_once '../plus/page.class.php';
$db= new DbMysql();

$sql="select id,typename,typeorder,typezt from feedbackType ";
$parm=" where 1  ";

$sql.=$parm;

$db->sql($sql);

$infocount=$db->affected(); //信息总数量
$pagesize=20;

$page = new page($infocount, $pagesize);


$sql.=$page->limit();



$result=$db->select($sql);

 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>留言分类</title>
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
function goupdate(zt)
{
	document.goinfo.zt.value=zt;
	document.goinfo.action="feedbackType_update.php";
	document.goinfo.submit();
}
</script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td width="935" height="29" valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">留言分类</div></td>
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
            <td class="left_txt">当前位置：留言本分类</td>
          </tr>
          <tr>
            <td height="20">
                 
                <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" >
              <tr>
                <td><div class="add"><A href='feedbackType_add.php'><img src="images/add.gif" width="16" height="16" /> 添加留言本分类</a></div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td> 
           <form action="feedbackType_allDel.php" method="post" name="goinfo">
            <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                  <Td class="left_bt2" width="15"></td>
                <td class="left_bt2">排序</td>
                <td class="left_bt2">分类名称</td>
                 <td class="left_bt2">ID</td>
                 <td class="left_bt2">状态</td>
                <td class="left_bt2">操作</td>
              </tr> 
                    <?php
        if($infocount>=1)
        {
                    foreach($result as $row)
                    {
                    ?>
              <tr class="left_txt2">
              <Td bgcolor="#F2F2F2"><input name="id[]" type="checkbox" value="<?php echo $row["id"];?>" /></td>
              <Td bgcolor="#F2F2F2"><input name="typeorder<?php echo $row["typeorder"];?>" type="text" value="<?php echo $row["typeorder"]?>" size="5" /></td>
              <td bgcolor="#F2F2F2"><?php echo $row["typename"];?></td>
              <td bgcolor="#F2F2F2"><?php echo $row["id"];?></td>
              <td bgcolor="#F2F2F2"><?php 
              if($row["typezt"]==1)
              {
                  echo "开启";
              }
              else
              {
                  echo "<span style='color:red;font-weight:bold;'>关闭</span>";
              }
              ?></td>
         
              <td bgcolor="#F2F2F2"><a href="feedbackType_del.php?id=<?php echo $row["id"];?>">删除</a> <A href="feedbackType_edit.php?id=<?php echo $row["id"];?>">修改</a></td>
              </tr> 
                    <?php
                    }
      }
      else
      {
           echo "<tr><td colspan='6'><div style='font-weight:bold;color:red;text-align:center;'>暂无数据</div></td></tr>";
      }
      
                    ?>
                    <tr><td colspan="6"> <input name="" type="submit" value="批量删除" /> <input name="" type="button" onclick="goupdate(1);" value="设置开启" />
                      <input name="input" type="button" onclick="goupdate(0);" value="设置关闭" /><input name="zt" type="hidden" /></td></tr>
            </table>
         
 </form>
            </td>
          </tr>
 
        </table>
<div id="page"> <?php echo $page->show(1);?></div>
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
