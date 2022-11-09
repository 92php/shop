<?php

//提交数据 过滤类
class maig {
function str($str)
{
    $str = trim($str);
    if(!get_magic_quotes_gpc())
     {
        $str = addslashes($str);
     }
      return htmlspecialchars($str);
}


}

?>
