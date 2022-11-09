<?php
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
require_once '../plus/page.class.php';

$db   = new DbMysql();
$sql  = "select consult.*,product.title,consultType.typename from consult inner join product on product.id=consult.pid inner join consultType on consultType.id=consult.typeid "; //�����Ĳ�ѯ���
$parm = "where 1 "; //�������������

//�����ж�
$typeid = @$_GET["typeid"];
if($typeid!="")
{
    $parm.= " and consult.typeid='$typeid' ";
}

//�����ж�
$key    = @$_GET["key"];
$ziduan = @$_GET["ziduan"];
if($key!="")
{   
    $parm.= " and consult.$ziduan like '%$key%' ";
}

//����ж�
$issh = @$_GET["issh"];
if($issh!="")
{
    $parm.= " and consult.issh='$issh' ";
}

//�ظ��ж�
$ishf = @$_GET["ishf"];
if($ishf!="")
{
    $parm.= " and consult.ishf='$ishf' ";
}
 
//�жϹ���Ա
$isadmin = @$_GET["isadmin"];
if($isadmin=='yes')
{
    $parm.= " and consult.ip='����Ա' ";
}

$sql.= $parm;
$db->sql($sql);
$infocount = $db->affected();   //��Ϣ������
$pagesize  = 10;                //ÿҳ��ʾ����
$page      = new page($infocount, $pagesize);

$sql.= $page->limit();
$result = $db->select($sql);

?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��ѯ����</title>
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
function goinfo(str,ztid)
{
	document.consultInfo.ziduan.value=str;
	document.consultInfo.infozt.value=ztid;
	document.consultInfo.action="consult_update.php";
	document.consultInfo.submit();
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
            <td class="left_txt">��ǰλ�ã���ǰ��ѯ�б�</td>
          </tr>
          <tr>
            <td height="20">
                <div style="font-size:12px;line-height:25px;">�鿴��<A href="consult.php">ȫ��</a> <a href="?issh=1">�����</a> <A href="?issh=0">�����</a> <A href="?ishf=1">�ѻظ�</a> <a href="?ishf=0">���ظ�</a> <a href="?isadmin=yes">����Ա</a></div>
                <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" >
              <tr>
                <td><div class="add"><A href='consult_add.php'><img src="images/add.gif" width="16" height="16" /> �����ѯ</a></div></td>
                <td width="150" align="right">
                <select name="select" id="select" onchange="javascript:location.href=this.options[selectedIndex].value">
                <option value="consult.php">�鿴ȫ��</option>   
                <?php
                  $typemenu = $db->select("select * from consultType where typezt=1 order by typeorder");
                   foreach($typemenu as $row)
                   { 
                       if($typeid==$row["id"])
                       {
                         echo "<option value='?typeid=".$row["id"]."' selected>".$row["typename"]."</option>";        
                       }
                       else
                       {
                         echo "<option value='?typeid=".$row["id"]."'>".$row["typename"]."</option>";
                       } 
                   }
                ?>
                </select>
              </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>
          <form action="consult_alldel.php" method="post" name="consultInfo">
            <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
              <td class="left_bt2"></td>
                <td class="left_bt2">ID</td>
                <td class="left_bt2">��������</td>
                <td class="left_bt2">������Ʒ</td>
                <td class="left_bt2">���״̬</td>
                <td class="left_bt2">�ظ�״̬</td>
                <td class="left_bt2">��ʾ����</td>
                <td class="left_bt2">�ύʱ��</td> 
                <td class="left_bt2">IP��ַ</td>
                <td class="left_bt2">����</td>
              </tr>     
       <?php
       if($infocount>0){
        foreach($result as $row){
       ?>
       <tr class="left_txt2">
       <td bgcolor="#F2F2F2"><input type="checkbox"  name="id[]" value="<?php echo $row["id"];?>" /></td>
       <td bgcolor="#F2F2F2"><?php echo $row["id"];?></td>
       <td bgcolor="#F2F2F2"><?php echo $row["typename"];?></td>
       <td bgcolor="#F2F2F2"><?php echo $row["title"];?></td>
       <td bgcolor="#F2F2F2">
        <?php 
        if($row["issh"]==1)
        {
            echo "�����";
        }
        else
        {
            echo "<span style='font-weight:bold;color:red'>�����</span>";
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
             echo "<span style='font-weight:bold;color:red'>���ظ�</span>";
         }
         ?>
        </td>
         <td bgcolor="#F2F2F2"><?php echo $row["usernameshow"]; ?></td>
         <td bgcolor="#F2F2F2"><?php echo date("y-m-d h:i",$row["addtime"]);?></td>
         <td bgcolor="#F2F2F2"><?php echo $row["ip"];?></td>
         <td bgcolor="#F2F2F2"><A href="consult_del.php?id=<?php echo $row["id"];?>">ɾ��</a> <a href="consult_edit.php?id=<?php echo $row["id"];?>">�޸�</a></td>
      </tr>   
   <?php
  }
 }
 else
 {
     echo "<tr><td bgcolor='#ffffff' colspan='10' style='font-size:15px;font-weight:bold;text-align:center;color:red'>��������</td></tr>";
 }
   ?>    
       
       <tr><td colspan="10"><input name="" type="submit" value="����ɾ��" />
         <input type="button" name="button" id="button" value="���������" onclick="goinfo('issh',1)" />
         <input type="button" name="button2" id="button2" value="���������" onclick="goinfo('issh',0)"/>
         <input type="button" name="button3" id="button3" value="�����ѻظ�" onclick="goinfo('ishf',1)" />
         <input type="button" name="button4" id="button4" value="�������ظ�" onclick="goinfo('ishf',0)" />
         <label for="ziduan"></label>
         <input type="hidden" name="ziduan" id="ziduan" />
         <label for="infozt"></label>
         <input type="hidden" name="infozt" id="infozt" /></td></tr>
            </table>
    </form>
            </td>
          </tr>
 
    
        </table>
         
        <div id="page">
                    
            <?php
             echo $page->show(1);
            ?>
            
        </div>
                  <!---->
                  <div style="font-size:12px;">
                      <form action="consult.php" method="get" name="soso">
                      ����:
                        <select name="ziduan" id="ziduan">
                          <option value="content">���ݰ���</option>
                          <option value="recontent">�ظ����ݰ���</option>
                          <option value="pid">��ƷID</option>
                          <option value="usernameshow">�ύ�û�</option>
                        
                        </select>
                        <input name="key" type="text" /> <input name="" type="submit" value="����"/>
                      </form>
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
 