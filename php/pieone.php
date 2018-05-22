<?php
require("database.php");
header("Content-type:application/json;charset:utf-8");

mysql_select_db($mysql_database);
$resultset = mysql_query("select nnd as ages,count(*) as num from(select case when userage>=1 and userage<=20 then '00后' when userage>=21 and userage<=30 then '90后'
                                                                              when userage>=31 and userage<=40 then '80后' when userage>=41 and userage<=50 then '70后'
                                                                              else 'other' end as nnd from users)a group by nnd");
$data = "";
$array = array();
class Order{
   public $ages;
   public $num;
}
while($row = mysql_fetch_array($resultset,MYSQL_ASSOC)) {
    $order = new Order();
    $order->ages = $row['ages'];
    $order->num = $row['num'];
    $array[] = $order;
}
$data = json_encode($array);
echo $data;
?>