<html>
<head>
<title></title>
<?php
$users=$_POST['fullname'];
$pass=$_POST['pass'];
$ab="Admin";
$ac="1234";
if(isset($_POST['kk']))
{
	if ($users==$ab and $pass==$ac){

	echo("Welcome"."".$users.$pass);
}
else {
	echo("Username or Password is not correct");
}
}
?>
</head>
<body>
<form method="post">
<input type="text" name="fullname" size="30" value="">
<input type="text" name="pass" size="30">
<input type="submit" name="kk" value="click me login">
</form>
</body>
</html>