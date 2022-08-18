<?php
include_once('connect.php');
session_start();

$myid=$_SESSION['ass'];

$mydel="delete from products where id=$myid";
$mycheck = mysql_query($mydel);

	if($mycheck){
		echo"<script> alert('Product deleted successfully');
		window.location.href='admindash.php';	
		</script>";
	}
	else{
		echo"<script> alert('Not Deleted ');</script>";
	}
?>