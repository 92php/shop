<?php
//require '../public/init.php';
session_start(); 
define("WEBDIR", dirname(dirname(__FILE__)));
require_once WEBDIR.'/config/config.php';
require_once WEBDIR.'/public/functions.php';
require_once WEBDIR.'/plus/DbMysql.php';
require_once WEBDIR.'/plus/UserInfo.class.php';
require_once WEBDIR.'/plus/ProductType.class.php';
require_once WEBDIR.'/plus/action.class.php';

//����
$sk="�����";
$k=@$_GET["k"];
define("WEBDIR", dirname(dirname(__FILE__)));
$uid="";
$pwd="";
$islogin=false;
if(isset($_SESSION["webusername"])){
    $islogin=true;
    $uid=$_SESSION["webusername"];
    $pwd=$_SESSION["webpassword"];
}
define("ISLOGIN",$islogin);
define("UID",$uid);
define("PWD",$pwd);

$action = new action();
$userinfo  = new UserInfo();
$zt=$userinfo->isok();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ҵĵ��� - <?php echo $webname;?></title>
<link rel="stylesheet" rev="stylesheet" href="../css/base_v4.css" type="text/css">
<link rel="stylesheet" rev="stylesheet" type="text/css"  href="../css/main.css" />
<link rel="stylesheet" rev="stylesheet" href="../css/user.css" type="text/css">
</head>
<body>
 	 <?php
   include WEBDIR.'/include/top.php';
?>

		 

		 <div class="wrapper">
		<!--��Ա������ҳ-----start-->
		<!--��Ա����ͨ��-->
		    <div class="u_top_gg u_m_bottom">  </div>
		<div class="u_header u_m_bottom">
			<h2>��Ա����</h2>
			 
		</div>
		<div class="u_content">
    		<!--��Ա���Ĳ˵���ʼ-->
              <?php
              include WEBDIR."/include/userLeft.php";
			  ?>
    		<!--��Ա���Ĳ˵�����-->	
			<div class="u_wrap_c">
				<div class="u_info u_m_bottom">
					<div class="u_info_face">
						<div class="u_face_pic">
						 <img src="../images/maiduo.png" alt="">
												</div>
						<div class="u_face_modify"></div>
					</div>
					<div class="u_info_user">
						<h2 class="u_info_u_name"><span>��ӭ����</span> xiaoxingxing@163.com &nbsp;&nbsp;<a href="">�༭������Ϣ</a></h2> 
						 
					</div>
					<div class="u_info_account">
						<div class="u_ac_items br_line">
							<h4>�������ѣ�</h4>
								<ul>
									<li>
																				<span style="color:#666666;">��֧��(0)</span>
																			</li>
									<li>
																				<span style="color:#666666;">�ѷ���(0)</span>
																			</li>
									<li>
																				<span style="color:#666666;">������(0)</span>
																			</li>
								</ul>
						</div>
						 
					</div>
				</div>
				<div class="u_rec_list">
					<div class="u_tab">
						<h4><a href="#" class="now" id="isSale">���ڴ���</a></h4>
						 
						 
					</div>
					<div class="u_tab_panel">
						<div style="display: block;" id="u_rec_sale" class="u_tab_panel_i">
							<ul class="ul_prolist">
								    							  <li>
    								<div class="pic"> <img src="../zs/���Ӻ�����װ 2011 ����ʽ��������СֱͲ���� ���п��� ����.jpg" alt=""></div>
    								<h3><a title="���Ӻ�����װ 2011 ����ʽ��������СֱͲ���� ���п��� ����.jpg" href="" class="a_title">���Ӻ�����װ 2011 ����ʽ��������СֱͲ����</a><span style="color: #888">��ܼۣ�</span><strong class="strong_mprice">��228.00</strong></h3>
    							  </li> 
                                    <li>
    								<div class="pic"> <img src="../zs/���Ӻ�����װ 2011 ����ʽ��������СֱͲ���� ���п��� ����.jpg" alt=""></div>
    								<h3><a title="���Ӻ�����װ 2011 ����ʽ��������СֱͲ���� ���п��� ����.jpg" href="" class="a_title">���Ӻ�����װ 2011 ����ʽ��������СֱͲ����</a><span style="color: #888">��ܼۣ�</span><strong class="strong_mprice">��228.00</strong></h3>
    							  </li>
                                    <li>
    								<div class="pic"> <img src="../zs/���Ӻ�����װ 2011 ����ʽ��������СֱͲ���� ���п��� ����.jpg" alt=""></div>
    								<h3><a title="���Ӻ�����װ 2011 ����ʽ��������СֱͲ���� ���п��� ����.jpg" href="" class="a_title">���Ӻ�����װ 2011 ����ʽ��������СֱͲ����</a><span style="color: #888">��ܼۣ�</span><strong class="strong_mprice">��228.00</strong></h3>
    							  </li>
                                    <li>
    								<div class="pic"> <img src="../zs/���Ӻ�����װ 2011 ����ʽ��������СֱͲ���� ���п��� ����.jpg" alt=""></div>
    								<h3><a title="���Ӻ�����װ 2011 ����ʽ��������СֱͲ���� ���п��� ����.jpg" href="" class="a_title">���Ӻ�����װ 2011 ����ʽ��������СֱͲ����</a><span style="color: #888">��ܼۣ�</span><strong class="strong_mprice">��228.00</strong></h3>
    							  </li>
                                    <li>
    								<div class="pic"> <img src="../zs/���Ӻ�����װ 2011 ����ʽ��������СֱͲ���� ���п��� ����.jpg" alt=""></div>
    								<h3><a title="���Ӻ�����װ 2011 ����ʽ��������СֱͲ���� ���п��� ����.jpg" href="" class="a_title">���Ӻ�����װ 2011 ����ʽ��������СֱͲ����</a><span style="color: #888">��ܼۣ�</span><strong class="strong_mprice">��228.00</strong></h3>
    							  </li>
                                    <li>
    								<div class="pic"> <img src="../zs/���Ӻ�����װ 2011 ����ʽ��������СֱͲ���� ���п��� ����.jpg" alt=""></div>
    								<h3><a title="���Ӻ�����װ 2011 ����ʽ��������СֱͲ���� ���п��� ����.jpg" href="" class="a_title">���Ӻ�����װ 2011 ����ʽ��������СֱͲ����</a><span style="color: #888">��ܼۣ�</span><strong class="strong_mprice">��228.00</strong></h3>
    							  </li>
                                    
															</ul>
							<div class="u_more">
								<a href="" target="_blank">���������Ʒ</a>
							</div>
						</div>
			 
					</div>
				</div>
			</div>
			<div class="u_wrap_r">
				<div class="u_box u_m_bottom">
					<div class="u_b_h">
						<h3><span>���Ŵ����</span></h3>
					</div>
					<div class="u_b_c n_list u_hot_news">
									    			        				    			        				    			        				    			        					<ul>
															<li><a href="">������Ϣ��������</a></li>
                                                            <li><a href="">������Ϣ��������</a></li>
                                                            <li><a href="">������Ϣ��������</a></li>
                                                            <li><a href="">������Ϣ��������</a></li>
                                                            <li><a href="">������Ϣ��������</a></li>
                                                            <li><a href="">������Ϣ��������</a></li> 
									    					</ul>
						<div class="u_more">
							<a href="" target="_blank">��������</a>
						</div>
					</div>
				</div>
				<div class="u_box u_m_bottom">
					<div class="u_b_h">
						<h3><span>��Ա�</span></h3>
					</div>
					<div class="u_b_c n_list u_hot_news">
									    			        				    			        				    			        				    			        					<ul>
															<li><a href="">��Ա���Ϣ�������Ӵ�...</a></li>
                                                            <li><a href="">��Ա���Ϣ��������</a></li>
                                                            <li><a href="">��Ա���Ϣ��������</a></li>
                                                            <li><a href="">��Ա���Ϣ��������</a></li>
                                                            <li><a href="">��Ա���Ϣ��������</a></li>
                                                            <li><a href="">��Ա���Ϣ��������</a></li> 
									    					</ul>
						<div class="u_more">
							<a href="" target="_blank">��������</a>
						</div>
					</div>
				</div>
 
				</div>
			</div>
		</div>
	 

	 
		 

		<!-- footer -->
		 
<?php
   include WEBDIR.'/include/foot.php';
?>
 
	<!--content ok--><!-- OK -->

</body>
</html>
