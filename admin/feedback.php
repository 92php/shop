<?php
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
require_once '../plus/page.class.php';

$db   = new DbMysql();
$sql  = "select feedback.id,feedback.typeid,feedback.issh,feedback.ishf,feedback.usernameshow,feedback.addtime,feedback.ip,feedbackType.typename from feedback inner join feedBackType on feedback.typeid=feedbackType.id ";
$parm = " where 1 ";

// �ж����״̬
$issh=@$_GET["issh"];
if($issh!="")
{
    $parm.=" and feedback.issh='$issh' ";
}

//�жϻظ�״̬
$ishf=@$_GET["ishf"];
if($ishf!="")
{
    $parm.=" and feedback.ishf='$ishf' ";
}

//�жϹ���Ա״̬
$isadmin=@$_GET["isadmin"];
if($isadmin=="ok")
{
    $parm.=" and feedback.ip='����Ա' ";
}

//�жϷ���
$typeid=@$_GET["typeid"];
if($typeid!="")
{
    $parm.=" and feedback.typeid='$typeid' ";
}


//�ؼ����ж�
$key=@$_GET["key"];
if($key!="")
{
    $parm.=" and feedback.content like '%$key%' ";
}

$sql.=$parm;
$sql.=" order by id desc ";
$db->sql($sql);
$infocount=$db->affected();  //��Ϣ������
$pagesize=20;

$page = new page($infocount,$pagesize);

$sql.=$page->limit();
$result=$db->select($sql);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���Թ���</title>
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
function goupdate(ziduan,zt)
{
	document.goinfo.ziduan.value=ziduan;
	document.goinfo.zt.value=zt;
	document.goinfo.action="feedback_update.php";
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
        <td height="31"><div class="titlebt">��ǰ��ѯ</div></td>
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
            <td class="left_txt">��ǰλ�ã�������Ϣ�б�</td>
          </tr>
          <tr>
            <td height="20">
                <div style="font-size:12px;line-height:25px;">�鿴��<A href="feedback.php">ȫ��</a> <A href="?issh=1">�����</a> <A href='?issh=0'>�����</a> <a href="?ishf=1">�ѻظ�</a> <a href="?ishf=0">���ظ�</a> <a href="?isadmin=ok">����Ա</a></div>
                <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" >
              <tr>
                <td><div class="add"><A href='feedback_add.php'><img src="images/add.gif" width="16" height="16" /> �������</a></div></td>
                <td width="150" align="right">
<select name="select" id="select" onchange="javascript:location.href=this.options[selectedIndex].value">
    <option value="feedback.php">�鿴ȫ��</option>       
<?php
       $typeInfo = $db->select("select id,typename from feedbackType where typezt=1  order by typeorder ");
       foreach($typeInfo as $row)
       {
           if($typeid==$row["id"])
           {
         echo "<option value='?typeid=".$row["id"]."' selected>".$row["typename"]."</option>";      
           }
           else{
           echo "<option value='?typeid=".$row["id"]."'>".$row["typename"]."</option>";
           }
       
       }
       ?>
</select></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>
          <form action="feedback_alldel.php" method="post" name="goinfo">
            <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
              <td class="left_bt2"></td>
                <td class="left_bt2">ID</td>
                <td class="left_bt2">��������</td>
             
                <td class="left_bt2">���״̬</td>
                <td class="left_bt2">�ظ�״̬</td>
                <td class="left_bt2">��ʾ����</td>
                <td class="left_bt2">�ύʱ��</td> 
                <td class="left_bt2">IP��ַ</td>
                <td class="left_bt2">����</td>
              </tr>
             
 <?php
 if($infocount>=1)
 {
 foreach($result as $row)
 {
 ?>
       <tr class="left_txt2">
          <td bgcolor="#F2F2F2"><input type="checkbox" name="id[]" id="id"  value="<?php echo $row["id"];?>"/></td>
    <td bgcolor="#F2F2F2"><?php echo $row["id"];?></td>
    <td bgcolor="#F2F2F2"><?php echo $row["typename"];?></td>
            <td bgcolor="#F2F2F2">
                <?php
                if($row["issh"]==1)
                {
                    echo "�����";
                }
                else
                {
                    echo "<span style='color:red;font-weight:bold'>�����</span>";
                }
                ?>
            </td>
       <td bgcolor="#F2F2F2">
           <?php
           if($row["ishf"]==1)
           {
               echo "�ѻظ�";
           }
           else
           {
                echo "<span style='color:red;font-weight:bold'>���ظ�</span>";
           }
           ?>
       </td>
     <td bgcolor="#F2F2F2"><?php echo $row["usernameshow"];?></td>
            <td bgcolor="#F2F2F2"><?php echo date("y-m-d h:i",$row["addtime"]);?></td>
    
     <td bgcolor="#F2F2F2"><?php echo $row["ip"];?></td>
     <td bgcolor="#F2F2F2"><A href="feedback_del.php?id=<?php echo $row["id"];?>">ɾ��</a> <A href='feedback_edit.php?id=<?php echo $row["id"];?>'>�޸�</a></td>
      </tr>  
                <?php
 }
 }
 else
 {
     echo "<tr><td colspan=10><div style='line-height:25px;font-weight:bold;text-align:center;color:red;'>��������</div></td></tr>";
 }
                ?>
                <tr><td colspan="10">
                  <input name="" type="submit" value="����ɾ��"/>
                  <input type="button" name="button" id="button" value="�������" onclick="goupdate('issh',1);" />
                  <input type="button" name="button" id="button" value="���ûظ�" onclick="goupdate('ishf',1);" />
                  <input type="button" name="button" id="button" value="ȡ�����" onclick="goupdate('issh',0);" />
                  <input type="button" name="button" id="button" value="ȡ���ظ�" onclick="goupdate('ishf',0);" />
                  <input type="hidden" name="ziduan" id="ziduan" />
                  <label for="zt"></label>
                  <input type="hidden" name="zt" id="zt" /></td></tr>
            </table>
            </form>
            </td>
          </tr>
 
    
        </table>
         
        <div id="page">
                    
             <?php echo $page->show(1);?>
            
        </div>
        <div>
        <form action="" method="get" name="sousuo">
        ������<input name="key" type="text" /> <input name="" type="submit" value="����" />
        </form>
        </div>
                  <!---->
                   
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
 