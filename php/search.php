<?php
require("database.php");
header("Content-type:application/json;charset:utf8");

$data = $_POST['keyword'];
mysql_select_db($mysql_database);
$result = mysql_query("select * from users where UserID = $data");
$row = mysql_fetch_assoc($result);
echo json_encode($row);
?>