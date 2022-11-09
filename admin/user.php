<?php
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
require_once '../plus/Page.class.php';
$db= new DbMysql();

$sql="select * from user"; //基本语法
$parm=" where 1 ";  //条件

//条件增加
$zt=@$_GET["zt"];
if($zt!="")
{
    $parm.=" and zt='$zt'";
}
//判断会员的名称搜索
$key=@$_GET["key"];
$stype=@$_GET["stype"];

if($key!="")
{
    $parm.= " and ".$stype." like '%$key%' ";
}

$sql.=$parm;

$db->sql($sql);
$infocount=$db->affected(); //信息总数量
$pagesize=10; //每页显示数量

$page = new page($infocount, $pagesize); 

$sql.=$page->limit();
$result=$db->select($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>会员列表</title>
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
    
    if(document.userso.username.value=='')
        {
            alert('请输入搜索的关键词');
          return false;    
       }
 return true;       
}

function plzt(id)
{
 
	document.userinfo.zt.value=id;
	document.userinfo.action="user_ztshenhe.php";
	document.userinfo.submit();
	//alert('批量审核状态');
}
 
</script>
</head>

<body>
 
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td width="935" height="29" valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">会员管理</div></td>
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
            <td class="left_txt">当前位置：会员列表</td>
          </tr>
          <tr>
            <td height="20">
                <div style="font-size:12px;line-height:25px;">查看：<a href='user.php'>全部</a> <a href="?zt=1">待审核</a> <a href="?zt=3">锁定</a> <a href="?zt=2">正常</a></div>     
                <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" >
              <tr>
                <td><div class="add"><A href='user_add.php'><img src="images/add.gif" width="16" height="16" /> 添加会员</a></div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>
            <form action="user_alldel.php" method="post" name="userinfo">
            <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
              <Td class="left_bt2"></Td>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;登陆账号</td>
                <td class="left_bt2">状态</td>
                <td class="left_bt2">邮箱</td>
                <td class="left_bt2">姓名</td>
                <td class="left_bt2">手机号码</td>
                <td class="left_bt2">操作</td>
              </tr>
                     <?php
               if($infocount>=1)
               {
                     foreach($result as $row)
                     {
                     ?>
              <tr class="left_txt2">
              <td bgcolor="#F2F2F2" class="left_txt2"><input name="id[]" type="checkbox" value="<?php echo $row["id"];?>" /></td>
                <td bgcolor="#F2F2F2" class="left_txt2"><?php echo $row["username"];?></td>
                <td bgcolor="#F2F2F2" class="left_txt2"><?php
               
                switch ($row["zt"])
                {
                    case "1":
                        echo "<span style='color:red'>待审核</span>";
                        break;
                    case "2":
                        echo "正常";
                        break;
                    case "3":
                        echo "<span style='color:#fff000'>锁定</span>";
                        break;
                }
                ?></td>
                <td bgcolor="#F2F2F2" class="left_txt2">
                    <?php
                    echo $row["email"];
                    ?>
                    
                </td>
                <td bgcolor="#F2F2F2" class="left_txt2">
                    <?php
                    echo $row["xingming"];
                    echo "(".$row["sex"].")"
                    ?>
                    
                </td>
                <td bgcolor="#F2F2F2" class="left_txt2">
                    <?php
                    
                    echo $row["mobile"];
                    ?>
                    
                </td>
                <td bgcolor="#F2F2F2" class="left_txt2">
                    <a href='user_del.php?id=<?php echo $row["id"];?>'>删除</a> 
                    <a href='user_edit.php?id=<?php echo $row["id"];?>'>修改</a>
                </td>
              </tr>
              <?php
                     }
                     
                     
                     
              ?>
              <tr><td colspan="7"><input type="submit" value="批量删除" />
                <input type="button" name="button" id="button" value="批量审核" onclick="plzt(2)" />
                <input type="button" name="button2" id="button2" value="批量待审核" onclick="plzt(1)" />
                <input type="button" name="button3" id="button3" value="批量锁定" onclick="plzt(3)" />
                <label for="zt"></label>
                <input type="hidden" name="zt" id="zt" /></td></tr>
              <?php
               }
               else
               {
              echo "<tr><td colspan='7'><div style='text-align:center;color:red;font-size:16px;'>暂无注册会员</div></td></tr>";     
               }
              ?>
            </table></form></td>
          </tr>
 
        </table>
        <div id="page"> 
          <?php
          echo $page->show(1);
          ?>
        </div>
                  <!---->
                <div><form action="user.php" method="get" name="userso" onsubmit="return test();">
                用户名：
                    <label for="stype"></label>
                    <select name="stype" id="stype">
                      <option value="username">用户名</option>
                      <option value="email">邮箱</option>
                      <option value="xingming">真实姓名</option>
                      <option value="mobile">手机</option>
                    </select>
                  <input name="key" type="text" id="key" /> <input name="" type="submit" value="搜索" />
                </form></div>  
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
