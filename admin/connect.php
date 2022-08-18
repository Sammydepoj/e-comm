<?php
$user="root";
$password="";
$server="127.0.0.1";
$databasedb="text1";

$connect=mysql_connect($server,$user,$password);
$dbserver=mysql_select_db($databasedb,$connect);
?>