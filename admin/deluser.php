<?php
include_once('connect.php');
session_start();

$myid=$_SESSION['gfd'];

$mydel="delete from users where id=$myid";
$mycheck = mysql_query($mydel);

	if($mycheck){
		echo"<script> alert('User deleted successfully');

		window.location.href='listofusers.php';	
		
		</script>";
	}
	else{
		echo"<script> alert('Not Deleted');</script>";
				header("location:listofusers.php");	

	}

?>