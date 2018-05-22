<?php
require("database.php");
header("Content-type:application/json;charset:utf-8");

mysql_select_db($mysql_database);
$resultset = mysql_query("SELECT OrderCity as city ,count(*) as sum from orders group by ordercity");
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