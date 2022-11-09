<?php
require_once 'islogin.php';
require_once '../plus/DbMysql.php';
require_once '../plus/page.class.php';

$db = new DbMysql();
$rights = $_SESSION["rights"];     // ��ݱ�ʾ
$username = $_SESSION["username"]; //��ǰ��̨����Ա
$sql = "select article.*,articletype.typename from article inner join articletype on article.typeid=articletype.id";    //������ѯ���
$parm = " where 1";                //��ѯ��������

$typeid = @$_GET["typeid"]; //��ȡ����ID
$keyword = @$_GET["key"];   //��ȡ��ѯ�ؼ���

if($rights!=1)
{
    $parm.=" and inputer='$username'";
}

if($typeid!="")
{
    $parm.=" and typeid=$typeid";
}

if($keyword!="")
{
    $parm.=" and title like '%$keyword%'";
}

// ע������Ҫ�õ�����Ϣ�Ⱥ�˳��

$sql.=$parm." order by id desc ";

//��ҳ������ʼ
$pagesize=10;  // ÿҳ����
$db->sql($sql);
$infocount=$db->affected();; //��Ϣ������ 
$page=new page($infocount,$pagesize);
// ��ҳ��������
/*echo "��Ϣ������".$infocount; //��Ϣ����
echo "<br>"; 
echo $sql;
echo "<br>"; */

$sql.=$page->limit();
//echo $sql;
$result=$db->select($sql);

/*echo "<br>";
echo "��ʵ��ѯ�����Ľ��������".count($result);
echo "<br>";
echo $page->pageurl();*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���¹���</title>
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
	if(document.formsearch.key.value=='')
	{
	  alert('������һ����ѯ�Ĺؼ���');
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
        <td height="31"><div class="titlebt">���¹���</div></td>
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
            <td class="left_txt">��ǰλ�ã������б�</td>
          </tr>
          <tr>
            <td height="20">
 <div style="line-height:25px;font-size:12px;">�鿴��<a href="article.php">ȫ��</a>
  <?php
   $type= $db->select("select * from articletype");
   foreach($type as $row)
   {
       if($typeid==$row["id"])
       {
       echo "<b>".$row["typename"]."<b>&nbsp;";    
       }
       else
       {
       echo "<A href='?typeid=".$row["id"]."'>".$row["typename"]."</a>&nbsp;";
       }
   }
  ?>
 </div>
                <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" >
              <tr>
                <td><div class="add"><A href='article_add.php'><img src="images/add.gif" width="16" height="16" /> ���������</a></div></td>
                <td width="150" align="right"><label for="select"></label>
                 
<select name="select" id="select" onchange="javascript:location.href=this.options[selectedIndex].value">
<option value='article.php'>ȫ������</option>
<?php
foreach($type as $row)
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
</select>
                
                </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>
           <form action="articleAlldel.php" method="post">
            <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
                    <tr>
                <td class="left_bt2">ID</td>
                <td class="left_bt2">����</td>
                <td class="left_bt2">��������</td>
                <td class="left_bt2">����</td>
                <td class="left_bt2">��Դ</td>
                <td class="left_bt2">�����</td>
                <td class="left_bt2">¼��Ա</td> 
                <td class="left_bt2">¼��ʱ��</td>
                
                <td class="left_bt2">����</td>
              </tr>
             
      <?php
      if($infocount>=1){
       foreach ($result as $row){
      ?>
       <tr class="left_txt2">
        <td bgcolor="#F2F2F2"><?php echo $row["id"];?><input name="id[]" id="id" type="checkbox" value="<?php echo $row["id"];?>" /></td>
         <td bgcolor="#F2F2F2"><?php echo $row["title"];?></td>
         <td bgcolor="#F2F2F2"><?php echo $row["typename"]; ?></td>
           <td bgcolor="#F2F2F2"><?php echo $row["author"];?></td>
            <td bgcolor="#F2F2F2"><?php echo $row["com"];?></td>
             <td bgcolor="#F2F2F2"><?php echo $row["hits"];?></td>
              <td bgcolor="#F2F2F2"><?php echo $row["inputer"];?></td>
               <td bgcolor="#F2F2F2"><?php echo date("Y-m-d",$row["addtime"]);?></td>
            <td bgcolor="#F2F2F2"><A href="articleDel.php?id=<?php echo $row["id"];?>">ɾ��</a> <a href="article_edit.php?id=<?php echo $row["id"];?>">�޸�</a></td>
              </tr>   
        <?php
                    }}
                    else
                    {
                        echo "<tr class='left_txt2'><td colspan='6'>��������</td></tr>";
                    }
        ?>   
               <tr><tD colspan="6"><input name="submit1" value="ɾ��ȫѡ" type="submit" /></tD></tr>
            </table>
             </form>
            </td>
          </tr>
 
 
        </table>
         <div style="font-size:12px;"><form action="article.php" method="get"  id="formsearch" name="formsearch" onsubmit="return test();">
          ����ؼ��֣�<input name="key" type="text" /> <input name="" type="submit" value="��ѯ" />
         </form></div>
        <div id="page">
            <?php
            
            echo $page->show(2);
            ?>
            
        </div>
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

