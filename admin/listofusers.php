<html>
<head>
<title></title>
<?php
include_once('connect.php');
session_start();

if($_SESSION['email']==''){
	header("location:adminlogin.php");
}
$useremail= $_SESSION['email'];

?>
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
a{
	text-decoration:none;
	color:white;
}
a:hover{
	background-color:darkred;
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
<h2 style="color:red;">List of Users</h2>
<hr>
<form method="post" action="">
<input type="submit" value="Click to view Users"class="txt" name="upd">
</form>


<table border="1" cellpadding="0">
<tr>
<th>Email </th>
<th>Password</th>
<th>Proffession</th>
<th>Gender</th>
<th>Operation</th>
</tr>
<?php
if(isset($_POST['upd'])){

$st="select * from users ";
	$stquery=mysql_query($st);
	
	$checkrow=mysql_num_rows($stquery);
if ($checkrow>0){
		while($drow=mysql_fetch_assoc($stquery)){
			

	echo"
	
	<tr>
	<td>".$drow['email']."</td>
<td>".$drow['pass']."</td>
<td> ".$drow['prof']."</td>
<td> ".$drow['gender']."</td>
<td> 
<a style='color:red;' href='confirmed.php?pro=".$drow['id']."'>Delete</a>||<a style='color:red;' href='confirmupdate.php?prad=".$drow['id']."'>Update</a>
</td>

	</tr>	
	";
		}
}
}

?>

</body>
</html>