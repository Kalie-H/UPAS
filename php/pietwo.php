<?php
require("database.php");
header("Content-type:application/json;charset:utf-8");

mysql_select_db($mysql_database);
$resultset = mysql_query("select usergender as sex,count(*) as sum from users group by usergender");
$data = "";
$array = array();
class Order{
   public $sex;
   public $sum;
}
while($row = mysql_fetch_array($resultset,MYSQL_ASSOC)) {
    $order = new Order();
    $order->sex = $row['sex'];
    $order->sum = $row['sum'];
    $array[] = $order;
}
$data = json_encode($array);
echo $data;
?>