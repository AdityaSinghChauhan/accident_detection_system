<?php
$new=$_GET['value'];
include 'connection.php';
mysql_query("INSERT INTO cgvigyan_ads.NEW (NEW) VALUES ('$new')");
mysql_close($con);
?>