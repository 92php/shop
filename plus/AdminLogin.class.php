<?php
//��̨��½������
class AdminLogin {

    private $db;

    function __construct() {
        $this->db = new DbMysql();
    }

    function isLogin($uid,$pwd)
    {

        $result = $this->db->select("select * from admin where username='$uid'",1);
        $state;  //��½״̬
        $ip=$_SERVER["REMOTE_ADDR"]; //��½ip
        if($result!=false)
            {
             if($result["password"]!=$pwd)
             {
                  $state = -1; //������� ����
             }
             else
             { 
               $this->db->sql("update admin set loginTime='".  time()."',ip='$ip',loginSum=loginSum+1 where username='$uid'");
               $_SESSION["rights"] = $result["rights"];
               $state = 1; //�˺����붼��ȷʱ�򷵻�
             }
            }
            else
            {
                  $state = -2; // �û�������ȷ ����
            }
            // д����־
            $this->db->sql("insert into adminLog(username,password,addtime,ip,state) values('$uid','$pwd','".  time()."','$ip','$state')");
            return $state;
    }

    function loginUp($uid,$pwd)
    {
        $ip = $_SERVER["REMOTE_ADDR"];
        $result = $this->db->sql("update admin set logintTime='".  time()."',ip='$ip' where username='$uid' and password='$pwd'");
        return $this->db->affected();
    }
}

?>
