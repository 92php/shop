<?php
//���ݿ���
class DbMysql {

    public  $conn;

    function __construct() {
        $this->conn = new mysqli("localhost","92php2013","x7z3b820132013","92php2013");  //����mysqli
        $this->conn->query("set names gb2312");        
    }
    
    function select($sql,$fanhui=2)
    {   //���ؽ��
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
    {   //ִ��sql
       return $this->conn->query($sql);
    }
    
    function affected()
    {   //Ӱ������
        return $this->conn->affected_rows;
    }
       
}
date_default_timezone_set("PRC");
?>