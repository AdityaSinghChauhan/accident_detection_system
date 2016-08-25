<?php
$mysql_hostname = "localhost";
$mysql_user = "";
$mysql_password = "";
$mysql_database = "cgvigyan_ads";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
$con = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>