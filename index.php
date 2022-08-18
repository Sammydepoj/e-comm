<html>
<head>
<title></title>
<?php
include_once('connect.php');
session_start();

$email=$_POST['email'];
$password=$_POST['password'];
$prof=$_POST['prof'];
$gender=$_POST['sex'];


if(isset($_POST['reg'])){
	$st="select * from users where email='$email'";
	$stquery=mysql_query($st);
	
	$checkrow=mysql_num_rows($stquery);
	if($checkrow > 0)
	{
		echo"<script> alert('user email already use pls use another email');</script>";
	}
	else{
	
	$ins="insert into users(email,pass,prof,gender) value('$email','$password','$prof','$gender')";
	$myquery=mysql_query($ins);
	
	if($myquery){
		$_SESSION['email']=$email;
		header("location:success.php");
	}
	else{
		echo"<script> alert('Registration not successful');</script>";
	}
	}
}
?>
<style>
.txt{
	padding: 5 20px;
	font-size:18px;
}
span{
font-size:20px;
color:red;	
box-shadow: 2px 1px 2px 2px green;
}
td{
	backgroud-color:green;
	color:white;
}
.outp{
font-size:15px;
color:blue;	
padding:2 5px:
}
table{
	border-collapse:collapse;
	width:500px;
}
table th{
	color:red;
}
table td{
	color:blue;
	font-size:1.2em;
	padding:10px;
	text-align:center;
}
</style>

<script language="javascript">
function login(){
location.href="login.php";
}
</script>
</head>
</body>
</html>
</head>
<body>
<form method="post" action="">
<h2>Email : <input type="email" class="txt" name="email"></h2>
<h2>Password : <input type="text" class="txt" name="password"></h2>
<h2> Select Professional : <select class="txt" name="prof">
<option value="web develop">web develop</option>
<option value="software develop">software develop</option>
<option value="mobile app develop">mobile app develop</option>
</select>
</h2>
<h2>Male:<input type="radio" class="txt" value="male" name="sex">Female:<input class="txt" value="female" type="radio" name="sex"></h2>
<input type="submit" value="register"class="txt" name="reg">
</form>


<h2 >Admin? Login here : <a href="admin\adminlogin.php">Admin Login</a></h2>


<form method="post">
<input type="button" onclick="login()" class="txt" value="User Login page">
<br><br>
<input type="submit" class="txt" value="open user Registration" name="op">
</form>




<?php
if(isset($_POST['op'])){
	$showdb="select * from users";
	$checkdb=mysql_query($showdb);
	
	while($drow=mysql_fetch_assoc($checkdb)){
		
		print("<span>Email:</span><span class='outp'> ".$drow['email']."</span><br>");
		print("<span>Password:</span><span class='outp'>  ".$drow['pass']."</span><br>");
		print("<span>Profession:</span><span class='outp'>  ".$drow['prof']."</span><br>");
		print("<span>Gender:</span><span class='outp'>  ".$drow['gender']."</span><br>");
		print("<span><span class='outp'><a href='".$drow['id']."'>delete</a></span> || <a href=''>Update</a>"."</span><br>"."<hr>");
	}
	
}
?>

<table border="1" cellpadding="0">
<tr><th>I D</th>
<th>Email</th>
<th>Password</th>
<th>Profession</th>
<th>Gender</th>
<th>Operation</th>
</tr>

<?php

if(isset($_GET['id'])){
	$id= $_GET['id'];
$mj=("delete from users where id='$id'");
$gf=mysql_query($mj);
}

$st="select * from users ";
	$stquery=mysql_query($st);
	
	$checkrow=mysql_num_rows($stquery);
if ($checkrow>0){
		while($drow=mysql_fetch_assoc($stquery)){

	echo"
	
	<tr>
	<td>".$drow['id']."</td>
<td>".$drow['email']."</td>
<td> ".$drow['pass']."</td>
<td> ".$drow['prof']."</td>
<td> ".$drow['gender']."</td>
<td> 
<a href='".$drow['id']."'>Delete</a>||<a href=''>Update</a>
</td>

	</tr>	
	";
		}
}
?>

</table>
</body>
</html>