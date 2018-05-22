<?php
require("database.php");
header("Content-type:application/json;charset:utf-8");

mysql_select_db($mysql_database);
$resultset = mysql_query("select OrderYear as year,count(*) as sales from orders group by OrderYear");
$data = "";
$array = array();
class Order{
   public $year;
   public $sales;
}
while($row = mysql_fetch_array($resultset,MYSQL_ASSOC)) {
    $order = new Order();
    $order->year = $row['year'];
    $order->sales = $row['sales'];
    $array[] = $order;
}
$data = json_encode($array);
echo $data;
?>