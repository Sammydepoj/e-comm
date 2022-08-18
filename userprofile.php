<html>
<head>
<title></title>
<?php
include_once('connect.php');
session_start();

if($_SESSION['email']==''){
	header("location:login.php");
}
else{
$useremail= $_SESSION['email'];
	$st="select * from users where email='$useremail'";
	$stquery=mysql_query($st);
	
	while($dshow=mysql_fetch_array($stquery))
	{
	$uemail=$dshow['email'];
	$upass=$dshow['pass'];
	$uprof=$dshow['prof'];
	$ugender=$dshow['gender'];
	}
}

?>
<script>
function go(){
	window.location.href="update.php";
}
</script>


<style>


body{
	background-color:blue;
}
.header1{
	margin:auto;
	width:80%;
	box-shadow:5px 10px 20px 10px grey;
	display:flex;
		background-color:white;

}

.bb{
	width:100%;
	padding: 15 20px;
	margin: 5 5px;
	font-size:25px;
	font-weight:bolder;
	text-align:center;
	background-color:blue;

}
a{
	text-decoration:none;
	color:white;
}
a:hover{
	text-decoration:none;
	color:red;
}

.txt{
	margin:5px 5px;
	padding: 5 20px;
	font-size:18px;
	display:inline-block;
}
.txt1{
	padding: 5 20px;
	font-size:18px;
	margin-left:20%;
	width:400px;
}
.txt1:hover{
	width:400px;
	padding: 5 20px;
	margin-left:20%;
	background-color:black;
	color:red;
	box-shadow:3px 2px 4px 3px red;
}
</style>
</head>
</body>
</html>
</head>
<body>
<h1>Welcome <span style="color:white;"><?php echo $useremail; ?></span>to your account</h1>
<div class="header1">
<span class="bb"><a href="userdash.php">Home</a></span>
<span class="bb"><a href="userprofile.php">Edit profile</a></span>
<span class="bb"><a href="userorders.php">User Orders</a></span>
<span class="bb"><a href="logout.php">Logout</a></span>
</br></br>
</div>
</br></br>
<hr>
<h2 style="color:white;">My profile</h2>
<hr>

<form method="post" action="">
<h2>Email : </h2><h2><input type="email" class="txt" value="<?php echo $useremail?>" readonly name="email"></h2>
<h2>Password : </h2><h2><input type="text" class="txt" value="<?php echo $upass?>"readonly name="password"></h2>
<h2> Select Profession :</h2><h2><input type="text" class="txt" value="<?php echo $uprof?>" readonly name="prof">
</h2>
<h2> Gender :</h2><h2><input type="text" class="txt" value="<?php echo $ugender?>" readonly name="sex">
</h2>
<input type="button" onclick="go()" value="Edit Profile"class="txt1" name="update">
</form>
</body>
</html>