<?php
require "../public/init.php";
$sql="select title,id,price,yprice,picurl from product";
$parm=" where 1";


if(@$k!="")
{
    $parm.=" and title like '%$k%' ";
    $sk=$k;
}



//Ʒ���ж�

$pp=@$_GET["ppid"];

if($pp!="")
{
   $parm.=" and ppid='$pp' ";
}

//��������
 
$attr=@$_GET["attr"];

switch ($attr) {
    case 1:
    $parm.=" hot='1' ";

        break;
   case 2:
        $parm.=" and recommend='1' ";
        break;
  case 3:
        $parm.=" and drops='1' ";
         break;
    default:
        $attr=0;
        break;
}

$sql.=$parm;

//����ʽ

$order=@$_GET["order"];
switch ($order) {
    case 1:
      $sql.=" order by hits desc ";  
        break;
case 2:
   $sql.=" order by id desc ";
    break;
case 3:
    $sql.=" order by price desc ";
    break;
case 4:
    $sql.=" order by price ";
    break;
    default:
      $order=2;
     $sql.=" order by id desc ";
      break;
}




$db->sql($sql);
$infocount=$db->affected();
$pagesize=20;
$page = new page($infocount,$pagesize);
$sql.=$page->limit(); 
$result=$db->select($sql);
//echo $sql;
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $webtitle;?></title>
<link rel="stylesheet" href="../css/base_v4.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="../css/global.css" media="all"/>
<link rel="stylesheet" type="text/css" href="../css/goods_list.css" media="all"/>
<meta content="" name="Keywords"/>
<meta content="" name="Description"/> 
<script type="text/javascript" src="../images/global.js"></script>
</head>
<body>
     <?php
   include WEBDIR.'/include/top.php';
?>
 
		<!-- ��� -->
		<div id="1008">
		</div>

		<div class="wrapper clearfix">
			 <div class="goods-side">
			 
			 
            <div class="h-floor m-bottom gl-bar-1">
                <div class="floor-title">
                    <h2><a>�����Ƽ�</a></h2>
                </div>
                <div class="floor-box">
                    <div class="side-goods-list">
                        <ul>
                             <?php
 $productList=$action->getProduct(1,10);
 
 foreach($productList as $rows)
 {
     echo "<li class=\"item\"><div class=\"pic\">";
     echo "<A href='{$webdir}product/show.php?id={$rows["id"]}' target='_blank'><img src='{$rows["picurl"]}' title='' height='100' width='100' /></a></div>";
     echo "<em><span class='gray'>��ܼ۸�</span> {$rows["price"]}</em></li>";
 }
 ?>
  
					        	
					   
					          	
					        
                        </ul>
                    </div>
                </div>
            </div>
             
        </div>  
			<div class="goods-main">
				<!-- ��Ʒ�б� -->
				<div id="1009">
				</div>
				<div class="glist-head m-bottom" id="1005"><div class="glist-order">
<div class="g-h-txt">����</div>
<a href="<?php echo $page->pageurl2('order');?>1" class="order-but <?php if($order==1) echo "down"?>">��ע</a><a href="<?php echo $page->pageurl2('order');?>2" class="order-but <?php if($order==2) echo "down"?>">��Ʒ</a><a href="<?php echo $page->pageurl2('order');?>3" class="order-but <?php if($order==3) echo "down"?><?php if($order==4) echo "up"?>">�۸�</a>
</div><div class="select-box" id="select-box">
<div class="cur-txt">���۸�ӵ͵�������</div>
<ul class="select-list">
<li>
<a href="">���۸�ӵ͵�������</a>
</li>
<li>
<a href="">���۸�Ӹߵ�������</a>
</li>
<li>
<a href="">���ϼ�ʱ������</a>
</li>
<li>
<a href="">����������</a>
</li>
</ul>
</div><div class="glist-show-mode">
<div class="g-h-txt">
			�鿴��	
			</div>
<a href="<?php echo $page->pageurl2('attr');?>0" class="show-mode-but <?php if($attr==0) echo "cur";?>">ȫ��</a><a href="<?php echo $page->pageurl2('attr');?>1" class="show-mode-but <?php if($attr==1) echo "cur";?>">����</a><a href="<?php echo $page->pageurl2('attr');?>3" class="show-mode-but <?php if($attr==3) echo "cur";?>">����</a><a href="<?php echo $page->pageurl2('attr');?>2" class="show-mode-but <?php if($attr==2) echo "cur";?>">�Ƽ�</a>
</div><div class="glist-count">
			�ҵ�
			<span class="red"><?php echo $infocount;?></span>�������Ʒ</div>
</div>

				<div class="goods-list-body" id="1006"><ul class="h-list h-list-ul-4">
 
   <?php
if($result){
 foreach($result as $rows)
 {
     echo "<li><div class=\"pic\">";
     echo "<A href='{$webdir}product/show.php?id={$rows["id"]}' target='_blank'><img src='{$rows["picurl"]}'  title='' height='145' width='145' /></a></div>";
     echo "<h3 class=\"bb-info\"><a target=\"_blank\" class=\"bb-info-a\" href='{$webdir}product/show.php?id={$rows["id"]}'>".strLeft($rows["title"],20,"...")."123</a><span class=\"mbb-p-title-a\">�ܼ�:</span><strong class=\"mbb-price\">��{$rows["price"]}</strong><s>��{$rows["yprice"]}</s></h3></li>";
 }}else{
     echo "��������";
 }
 ?>

</ul>
</div>
				<!-- ��ҳ -->
				<div class="m-pages">	
                         
                        <?php
                        echo $page->showStyle(); 
                         
                        ?>    
                      
</div>
			</div>
		</div>

	 
		 

<?php
   include WEBDIR.'/include/foot.php';
?> 
		<!-- footer -->
  
	<!--content ok--><!-- OK -->
 
</body>
</html>
