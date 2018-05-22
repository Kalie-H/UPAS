<?php
require("database.php");
header("Content-type:application/json;charset:utf-8");

mysql_select_db($mysql_database);
$resultset = mysql_query("SELECT substring(username,1,1) as name ,count(*) as sum from users group by substring(username,1,1) ORDER BY count(*) DESC limit 10");
$data = "";
$array = array();
class Order{
   public $name;
   public $sum;
}
while($row = mysql_fetch_array($resultset,MYSQL_ASSOC)) {
    $order = new Order();
    $order->name = $row['name'];
    $order->sum = $row['sum'];
    $array[] = $order;
}
$data = json_encode($array);
echo $data;
?>