<?php
require("database.php");
header("Content-type:application/json;charset:utf-8");

mysql_select_db($mysql_database);
$resultset = mysql_query("SELECT substring(useremail,11,22) as mail ,count(*) as sum from users group by substring(useremail,10,22)");
$data = "";
$array = array();
class Order{
   public $mail;
   public $sum;
}
while($row = mysql_fetch_array($resultset,MYSQL_ASSOC)) {
    $order = new Order();
    $order->mail = $row['mail'];
    $order->sum = $row['sum'];
    $array[] = $order;
}
$data = json_encode($array);
echo $data;
?>