<html>
<head>
<title></title>
<?php
include_once('connect.php');
session_start();

$email=$_POST['email'];
$password=$_POST['password'];



if(isset($_POST['reg'])){
	$st="select * from admin where email='$email'";
	$stquery=mysql_query($st);
	
	$checkrow=mysql_num_rows($stquery);
	if($checkrow > 0)
	{
		echo"<script> alert('user email already use pls use another email');</script>";
	}
	else{
	
	$ins="insert into admin(email,pass) value('$email','$password')";
	$myquery=mysql_query($ins);
	
	if($myquery){
		$_SESSION['email']=$email;
		header("location:adminsuccess.php");
	}
	else{
		echo"<script> alert('Register not successfully');</script>";
	}
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
<h1 class="txt">Register with your email and password</h1>
<form method="post" action="">
<h2>Email : <input type="email" class="txt" name="email"></h2>
<h2>Password : <input type="password" class="txt" name="password"></h2>
<input type="submit" value="register"class="txt" name="reg">
</form>


</body>
</html>