<div class="footer">

			<div id="1023"><div class="footer-wrap">
<div class="bottom-link">
<div class="item b-l-1">
<h4>�����̳�</h4>
<ul>
<?php
    $list=$action->getArticle(' and typeid=15 ',' order by id ');
    foreach($list as $rows){
        echo "<li><a href=\"{$webdir}about/?id={$rows["id"]}\" target=\"_blank\">{$rows["title"]}</a></li>";
    }

?>
</ul>
</div>
    
    <?php
    
        $articleType=$action->getArticleType(' and leixing=\'��������\'','order by id');
        $i=1;
        foreach($articleType as $rows)
        {   $i++;
           
            echo "<div class=\"item b-l-$i\">";
            echo "<h4>{$rows["typename"]}</h4>";
            echo "<ul>";
                  $list=$action->getArticle(" and typeid='{$rows["id"]}'",' order by id ');
            foreach($list as $rows){
                 echo "<li><a href=\"{$webdir}help/?id={$rows["id"]}\">{$rows["title"]}</a></li>";
            }
            echo "</ul>";
            echo "</div>";
        }
    ?>    
 
<div class="item b-l-6">
<h4>������ѵ</h4>
<ul>
<li>
<a target="_blank" href="">�γ̽���</a>
</li>
<li>
<a target="_blank" href="">��������</a>
</li>
<li>
<a target="_blank" href="">��������</a>
</li>
<li>
    <a target="_blank" href="<?php echo $webdir;?>links.php">��������</a>
</li>
</ul>
</div>
</div>
<div class="hot-tel-bottom">
<h2><?php echo $webtel;?></h2>
<a class="gbook-a" target="_blank" href="<?php echo $webdir;?>guest/">���߿ͷ�</a>
</div>
</div><div class="special-service">
<h2 class="spe-ser-title">���Է���</h2>
<ul class="spe-ser-con">
<li>
<a target="_blank" href="" class="s-ser-1"></a>
</li>
<li>
<a target="_blank" href="" class="s-ser-2">���Լ۱� Ʒ����ȫ</a>
</li>
<li>
<a target="_blank" href="" class="s-ser-3">Ʒ����Ʒ ���Ʒ���</a>
</li>
<li>
<a target="_blank" href="" class="s-ser-4">רҵ���� ֧�ֻ�������</a>
</li>
<li>
<a target="_blank" href="" class="s-ser-5">7�����������˻���</a>
</li>
</ul>
</div><div class="copyright">
						��Ȩ���У��̳�ƽ̨ ��ICP��10086��-1  All rights reserved, 92php.net services for shenzhen 20013-2014
</div><ul class="ul-honor lazybox">
<li>
<a title="֧���������̼�" target="_blank" rel="nofollow" href=""><img alt="֧���������̼�" src2="<?php echo $webdir;?>images/footer_logo_1.png" src="Images/blank.png" height="40" width="93"></a>
</li>
<li>
<a title="�㽭ʡ��վ��������" target="_blank" rel="nofollow" href=""><img alt="�㽭ʡ��վ��������" src2="<?php echo $webdir;?>Images/footer_logo_2.png" src="Images/blank.png" height="40" width="114"></a>
</li>
<li>
<a title="�㽭ʡ���羭�ü����" target="_blank" rel="nofollow" href=""><img alt="�㽭ʡ���羭�ü����" src2="<?php echo $webdir;?>images/footer_logo_3.png" src="<?php echo $webdir;?>Images/blank.png" height="65" width="66"></a>
</li>
<li>
<a title="" target="_blank" rel="nofollow" href=""><img alt="" src2="<?php echo $webdir;?>images/footer_logo_4.png" src="<?php echo $webdir;?>Images/blank.png" height="65" width="102"></a>
</li>
</ul>
</div>
		</div>	
<script src="<?php echo $webdir;?>Images/jquery.js" type="text/javascript"> </script>
<script src="<?php echo $webdir;?>Images/index_v5.js" type="text/javascript"> </script>