<?php
include_once('connect.php');
session_start();
$_SESSION['ass']=$_GET['pro'];


echo"
<script>
var s = confirm('Are you sure you want to delete?')
if (s==true){
			window.location.href='del.php';	
}
else{
			window.location.href='admindash.php';	
}
</script>";



?>