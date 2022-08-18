<html>
<head>
<title></title>

<?php
include_once('connect.php');
session_start();
$useremail= $_SESSION['email'];

$myid=$_SESSION['ddd'];

$email=$_POST['email'];
$pass=$_POST['password'];
$prof=$_POST['prof'];
$gender=$_POST['sex'];

if(isset($_POST['update'])){

$st="update users set email='$email', pass='$pass',prof='$prof',gender='$gender'
	where id='$myid'";
$mycheck = mysql_query($st);

	if($mycheck){
		echo"<script> alert('User info updated successfully');

		window.location.href='listofusers.php';	
		
		</script>";
	}
	else{
		echo"<script> alert('Not updated');</script>";
				header("location:listofusers.php");	

	}
}
?>

<script>
function go(){
	window.location.href="update.php";
}
</script>


<style>
.txt{
	padding: 5 20px;
	font-size:18px;
}
.bb{
		padding: 10 30px;
	font-size:18px;
	background-color:blue;
	color:white;
}
</style>
</head>
</body>
</html>
</head>
<body>
<h1>Welcome <span style="color:red;"><?php echo $useremail; ?></span> to your account</h1>

<span class="bb"><a href="admindash.php">Home</a></span>
<span class="bb"><a href="uploadproduct.php">Upload Products</a></span>
<span class="bb"><a href="userorders.php">User Orders</a></span>
<span class="bb"><a href="listofusers.php">List of Users</a></span>
<span class="bb"><a href="logout.php">Logout</a></span>
</br></br></br></br>
<hr>

<form method="post" action="">
<h2>Email : <input type="email" class="txt" value="<?php echo $email?>" readonly name="email"></h2>
<h2>Password : <input type="text" class="txt" value="<?php echo $pass?>"readonly name="password"></h2>
<h2> Select Professional :<input type="text" class="txt" value="<?php echo $prof?>" readonly name="prof">
</h2>
<h2> Gender :<input type="text" class="txt" value="<?php echo $gender?>" readonly name="sex">
</h2>
<input type="button" onclick="" value="Edit Profile"class="txt" name="update">
</form>
</body>
</html>