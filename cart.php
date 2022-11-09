<?php
require "public/init.php";
 

$cart = new cart();
$action=@$_GET["action"];

if($action=="up")
{
    $id=$_GET["id"];
    $sum=$_GET["sum"];
    if($sum==0){
        $cart->delCart($id);
        webAlter("删除商品成功",'cart.php');
    }
    $cart->addCart($id, $sum);
    
    webAlter("更新成功",'cart.php');
}

$cartList=$cart->cartInfo();

 


if(!ISLOGIN)
{
    webAlter("请先登陆", "user/user_login.php");
    exit;
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>购物车 - <?php echo $webtitle;?></title>
<link rel="stylesheet" rev="stylesheet" href="css/cart_v1.css" type="text/css"/>
</head>
<body>
<div class="wrapper">
  <!-- start header -->
  <div class="header">
 
    <h1>后盾网购物车</h1>
    <img src="images/logo.gif" class="logo" alt="后盾网" /> 
    <img src="cart_null_files/mbaobao.gif" height="1" width="1" /> <a href="" target="_blank">帮助</a> </div>
  <!-- end header -->
</div>
<div class="wrapper">
  <!-- start information -->
  <div class="info clearfix">
    <div class="title">
      <h2> <span class="sprite mycart">我的购物车</span> </h2>
      <div style="clear:both;padding: 0px 15px 15px 15px;overflow:hidden;zoom:1"><span style="float:left;color:#c00;">提示：请及时下单购买，商品价格以订单提交时的价格为准。</span>
        <div style="float:right;"> <span> </span></div>
      </div>
    </div>
  </div>
  <!-- end information -->
  <!-- start item grid -->
  <div class="items clearfix">
    <table class="grid" cellspacing="0">
      <thead>
        <tr>
          <td width="60">&nbsp;</td>
          <td style="text-align: left; padding: 0pt 0pt 0pt 5px;" width="*">商品名称</td>
          <td width="90">市场价</td>
          <td width="100">后盾价</td>
          <td width="70">小计</td>
          <td width="80">商品数量</td>
 
          <td width="60">删除</td>
        </tr>
      </thead>
      <tbody>
          <?php
          if(!empty($cartList))
          {
              foreach($cartList as $k=>$v)
              {
          ?>
      <tr>
          <td><a href="product/show.php?id=<?php echo $k;?>" alt="" target="_blank"><img src="<?php echo str_replace("../", "",$v["picurl"])?>" alt="" class="item" /></a></td>
          <td class="tal"><ul>
            <li><a href="product/show.php?id=<?php echo $k;?>" target="_blank"><?php echo $v["title"]?></a></li>
            <li><?php echo $v["numbers"]?></li>
          </ul></td>
          <td> ￥<?php echo $v["yPrice"]?> </td>
          <td><div class="price">￥<?php echo $v["unitPrice"]?></div></td>
          <td>￥<?php echo $v["Price"]?></td>
          
          <td><div class="quantity"> <a href='?action=up&id=<?php echo $k;?>&sum=<?php echo $v["total"]-1;?>' class="reduce sprite icon_reduce" alt="减一">减一</a>
    <input name="buy_quantity" ref="do/items/add/1206014002/1" class="input_quantity" value="<?php echo $v["total"]?>" type="text" />
    <a href='?action=up&id=<?php echo $k;?>&sum=<?php echo $v["total"]+1;?>' class="subjoin sprite icon_subjoin" alt="加一">加一</a></div></td>
          <td><a onclick="del(<?php echo $k;?>)">删除</a></td>
        </tr>

          <?php
              }
              ?>
                      <tr>
          <td colspan="2" class="info_left"> 
           </td>
          <td colspan="6" class="info_right"> 
            <p> <span>商品总金额（不包含运费）：<span class="price f14">￥<?php echo $_SESSION["cartPrice"]?></span>元</span> </p></td>
        </tr>
              <?php
              
          } else{
          ?>
        <tr>
          <td colspan="8"><p class="empty_item"> 您还没有添加商品到购物车！ </p></td>
        </tr>
         <?php
          }
         ?>
      </tbody>
    </table>
  </div>
  <!-- end item grid -->
  <!-- start action button -->
  <div class="buttons clearfix"> <a class="continue sprite" href="">继续购物</a> <?php if(!empty($cartList)) {?> <a class="checkout sprite" href="orderCart.php">去结算</a><?php }?></div>
  <!-- end action button -->
</div>
<div class="wrapper">
  <div class="copyright"><?php echo $webcopy;?></div>
</div>
    <script src="Images/jquery.js" type="text/javascript"></script> 
    <script>
        function del(id)
        {
            jQuery.ajax({
                url:"ajax/ajaxDelcart.php",
                type:"POST",
                data:"id="+id,
                success:function(data){
                    if(data=="1")
                        {
                            location.href="cart.php";
                        }
                },
                error:function(){
                    alert("错误");
                }
            })
        }
 
    </script>
</body>
</html>
