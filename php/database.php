<?php
	$mysql_server_name = 'localhost';
	$mysql_username = 'root';
	$mysql_password = '123456';
	$mysql_database = 'user';

	$conn = mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die ('error');
	mysql_query("set names 'utf8'");
?>