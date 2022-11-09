<?php
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
require_once '../plus/page.class.php';

$db   = new DbMysql();
$sql  = "select * from consultType";
$parm = " where 1 "; 
$zt   = @$_GET["zt"];

if($zt!="")
{
    $parm.=" and typezt='$zt' ";
}

$sql.=$parm;
$sql.=" order by typeorder ";
$db->sql($sql);

$infocount = $db->affected();  //信息总数量
$pagesize  = 10; //每页显示
$page = new page($infocount, $pagesize);

$sql.=$page->limit();
$result=$db->select($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>咨询分类页面</title>
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
function gosubmit(id)
{
	if(id==1)
	{
	    document.goupdate.ziduan.value='typeorder';
	}
	else
	{
		document.goupdate.ziduan.value='typezt';
	}
	if(id==2)
	{
		document.goupdate.zt.value=1;
	}
	    document.goupdate.submit();
	 
}
</script>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td width="935" height="29" valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">售前咨询</div></td>
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
            <td class="left_txt">当前位置：售前咨询分类列表</td>
          </tr>
          <tr>
            <td height="20">
                <div style='font-size:12px;line-height:25px;'>查看:<a href="consultType.php">全部</a> <A href="?zt=1">开启</a> <a href="?zt=0">关闭</a></div>
                <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" >
              <tr>
                <td><div class="add"><A href='consultType_Add.php'><img src="images/add.gif" width="16" height="16" /> 添加售前咨询分类</a></div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><form action="consultType_order.php" method="post" name="goupdate"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                  <Td class="left_bt2" width="15"></td>
                <td class="left_bt2">排序</td>
                <td class="left_bt2">分类名称</td>
                 <td class="left_bt2">ID</td>
                 <td class="left_bt2">状态</td>
                <td class="left_bt2">操作</td>
              </tr>
         <?php
         if ($result) {

         foreach($result as $row)
         {
         ?>
              <tr class="left_txt2">
                  <Td bgcolor="#F2F2F2"><input name="id[]" type="checkbox" id="id" size="5" value="<?php echo $row["id"];?>" /></td>
              <td bgcolor="#F2F2F2">
           
                <input name="order<?php echo $row["id"];?>" type="text" id="order" size="3" value="<?php echo $row["typeorder"];?>" />
                </td>
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
            <td bgcolor="#F2F2F2"><a href="consultType_del.php?id=<?php echo $row["id"];?>">删除</a> <a href="consultType_edit.php?id=<?php echo $row["id"];?>">修改</a>
                <?php 
                if($row["typezt"]==1)
                {
                    ?>
                <a href="consult_add.php?typeid=<?php echo $row["id"];?>">向该分类下添加信息</a>
               <?php
                }
               ?>
            </td>
              </tr>
                  <?php
         }

         }
                  ?>       
            </table>
            <div> <input name="" type="button"  value="批量排序" onclick="gosubmit(1)"/>
              <input type="button" name="button" id="button" value="批量开启"    onclick="gosubmit(2)" />
              <input type="button" name="button2" id="button2" value="批量关闭"  onclick="gosubmit(3)"/>
              <label for="ziduan"></label>
              <input type="hidden" name="ziduan" id="ziduan" />
              <label for="zt"></label>
              <input name="zt" type="hidden" id="zt" value="0" />
            </div>
            </form>
            </td>
          </tr>
 
        </table>
<div id="page"><?php echo $page->show(1);?></div>
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
