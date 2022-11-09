<?php
//数据库类
class DbMysql {

    public  $conn;

    function __construct() {
        $this->conn = new mysqli("localhost","92php2013","x7z3b820132013","92php2013");  //连接mysqli
        $this->conn->query("set names gb2312");        
    }
    
    function select($sql,$fanhui=2)
    {   //返回结果
        $result = $this->conn->query($sql);
        if($result)
            {
              $array = array();
              if($fanhui==1)
                  {
                   $array=$result->fetch_array();
                  }
              else{
              while($row=$result->fetch_array())
                  {
                    $array[] = $row; 
                  }
              }
               return $array;  
            }
            else
            {
                return false;
            }
    }
    
    function sql($sql) 
    {   //执行sql
       return $this->conn->query($sql);
    }
    
    function affected()
    {   //影响行数
        return $this->conn->affected_rows;
    }
       
}
date_default_timezone_set("PRC");
?>