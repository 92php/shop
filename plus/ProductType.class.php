<?php

//��ӭ�տ��������Ƶ�̳� ���ǵ����������� www.houdunwang.com


class ProductType {
    private  $db;
    function __construct() {
        $this->db= new DbMysql();
    }
    
    
function fl($tid)
{
    $result=$this->db->select("select * from productList where tid=$tid");
    $menu="";
    $leftStr="";
    $sd="";
    foreach($result as $row)
    {
        for($i=2;$i<=$row["sd"];$i++)
        {
            $leftStr="|-";
            $sd.="-";
        }
        $menu.="<tr class='left_txt2'>";
        $menu.="<td bgcolor='#F2F2F2'>".$row["id"]."</td>";
        $menu.="<td bgcolor='#F2F2F2'>".$leftStr.$sd.$row["typename"]."</td>";
        $menu.="<td bgcolor='#F2F2F2'><a href='productListDel.php?id=".$row["id"]."'>ɾ��</a> <a href='productList_edit.php?id=".$row["id"]."'>�޸�</a></td>";
        $menu.="</tr>";
       // $menu.="<option value='".$row["id"]."'>".$leftStr.$sd.$row["typename"]."</option>";
        $sd="";
        $menu.=$this->fl($row["id"]);
    }
    
    return $menu;
}
  
function floption($tid,$dqid=0,$style=0)
{    
 
    $result=$this->db->select("select * from productList where tid=$tid");
    $menu="";
    $leftStr="";
    $sd="";    
    foreach($result as $row)
    {
        for($i=2;$i<=$row["sd"];$i++)
        {
            $leftStr="|-";
            $sd.="-";
        }
        if($style==0)
        {
        if($dqid==$row["id"]){
        $menu.="<option value='".$row["id"]."' selected>".$leftStr.$sd.$row["typename"]."</option>";
        }
        else
        {
        $menu.="<option value='".$row["id"]."'>".$leftStr.$sd.$row["typename"]."</option>";
        }
        }
        else
        {
            // ��ַ��ַ
              if($dqid==$row["id"]){
        $menu.="<option value='?typeid=".$row["id"]."' selected>".$leftStr.$sd.$row["typename"]."</option>";
        }
        else
        {
        $menu.="<option value='?typeid=".$row["id"]."'>".$leftStr.$sd.$row["typename"]."</option>";
        }
        }
        $sd="";
        $menu.=$this->floption($row["id"],$dqid,$style);
    }
    
    return $menu;
}

function typeDel($id)
{
    $result=$this->db->select("select * from productList where tid=$id");
    $xj=$this->db->affected();
    $info="";
    if($xj!=0)
    {
        
        foreach($result as $row)
        {
            $info.=$this->typeDel($row["id"]);   
        }
     //   $info.="ID:".$id."���¼�<br>";
        $this->db->sql("delete from productList where id=$id");
        
    }
    else
    {
        $this->db->sql("delete from productList where id=$id");
       // $info.="ID:".$id."û���¼�";
       // $info.="����ִ��ɾ������<br>";
    }
    return $info;   
}
 

function updateSd($id,$sd)
{
    $result=$this->db->select("select * from productList where tid=$id");
    $xj=$this->db->affected();
    $info="";
    
    if($xj!=0)
    {
        $info.=$id."���¼�,����������Ӧ����:$sd<br>";
        foreach($result as $row)
        {
            
            $info.=$this->updateSd($row["id"], $sd+1);
        }
        $this->db->sql("update productList set sd=$sd where id=$id");
    }
    else
    {
        $info.=$id."û���¼�,����������Ӧ����:$sd<br><br>";
        $this->db->sql("update productList set sd=$sd where id=$id");
    }
    return $info;
}

function infoList()
{
    $sql="SELECT concat( idpath, '_', id ) AS path, idpath,id, typename
FROM `productlist` order by path";
    return $this->db->select($sql);
}

}

?>
