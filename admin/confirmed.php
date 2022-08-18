<?php
include_once('connect.php');
session_start();
$_SESSION['gfd']=$_GET['pro'];


echo"
<script>
var s = confirm('Are you sure you want to delete?')
if (s==true){
			window.location.href='deluser.php';	
}
else{
			window.location.href='listofusers.php';	
}
</script>";



?>