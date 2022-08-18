<?php
include_once('connect.php');
session_start();
$_SESSION['ddd']=$_GET['prad'];
$_SESSION['email'];

echo"
<script>
var s = confirm('Are you sure you want to update?')
if (s==true){
			window.location.href='update.php';	
}
else{
			window.location.href='listofusers.php';	
}
</script>";

?>