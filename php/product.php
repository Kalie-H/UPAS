<?php
require("database.php");
header("Content-type:application/json;charset:utf-8");

mysql_select_db($mysql_database);
$resultset = mysql_query("SELECT cnd as city ,count(*) as sum from (select case when Productlocation='上海市' or Productlocation='浙江省' or Productlocation='江苏省' or Productlocation='山东省' or Productlocation='安徽省' or Productlocation='江西省' or Productlocation='福建省'  then '华东地区'
 when Productlocation='北京市' or Productlocation='天津市' or Productlocation='河北省' or  Productlocation='山西省'  then '华北地区'
  when  Productlocation='河南省' or Productlocation='河北省' or Productlocation='湖南省' then '华中地区'
  when Productlocation='广东省' or Productlocation='广西省' or Productlocation='海南省' then '华南地区'
  when Productlocation='重庆市' or Productlocation='四川省' or Productlocation='贵州省' or Productlocation='云南省'  then '西南地区'
   when Productlocation='山西省' or Productlocation='甘肃省' or Productlocation='青海省'  then '西北地区'
    when Productlocation='黑龙江省' or Productlocation='吉林省' or Productlocation='辽宁省'  then '东北地区' else '其他地区' end as cnd from products)a group by cnd");
$data = "";
$array = array();
class Order{
   public $city;
   public $sum;
}
while($row = mysql_fetch_array($resultset,MYSQL_ASSOC)) {
    $order = new Order();
    $order->city = $row['city'];
    $order->sum = $row['sum'];
    $array[] = $order;
}
$data = json_encode($array);
echo $data;
?>