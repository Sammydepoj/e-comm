<html>
<head>
<title></title>
<?php
include_once('connect.php');
session_start();

$email=$_POST['email'];
$password=$_POST['password'];

if(isset($_POST['login'])){
	$dbuser="select * from users where email='$email' and pass='$password'";
	$dbquery=mysql_query($dbuser);
	$dbcheck=mysql_num_rows($dbquery);
	if($dbcheck > 0){
		$_SESSION['email']=$email;
		header("location:userdash.php");
	}
	else{
		echo"<script> alert('Error login check email or password');</script>";
	}
}
?>
<style>
.txt{
	padding: 5 20px;
	font-size:18px;
}
</style>
</head>
</body>
</html>
</head>
<body>
<form method="post" action="">
<h2>Email : <input type="email" class="txt" name="email"></h2>
<h2>Password : <input type="text" class="txt" name="password"></h2>
<input type="submit" value="login"class="txt" name="login">
</form>
</body>
</html>