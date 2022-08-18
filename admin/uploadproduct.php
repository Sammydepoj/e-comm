<html>
<head>
<title></title>
<?php
include_once('connect.php');
session_start();

if($_SESSION['email']==''){
	header("location:adminlogin.php");
}
$ran=rand(100,1000);
$pname=$_POST['pname'];
$pprice=$_POST['pprice'];
$ptype=$_POST['ptype'];
$pdes=$_POST['pdes'];
$pic1=$_FILES['file1']['name'];
$pic2=$_FILES['file2']['name'];


$useremail= $_SESSION['email'];


if(isset($_POST['save'])){
	
	$ins="insert into products(pname,pprice,ptype,pdes,pic1,pic2,tag) value('$pname','$pprice','$ptype','$pdes','$pic1','$pic2','$ran')";
	$myquery=mysql_query($ins);
	
	if($myquery){
		mkdir("productfile/$ran");
		move_uploaded_file($_FILES['file1']['tmp_name'],"productfile/$ran/".$pic1);
		move_uploaded_file($_FILES['file2']['tmp_name'],"productfile/$ran/".$pic2);
	echo"<script> alert('Uploaded Successfully');</script>";
	}
	else{
		echo"<script> alert('Not Uploaded');</script>";
	}
	}

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
<h1>Welcome <span style="color:red;"><?php echo $useremail; ?></span>  to your account</h1>

<span class="bb"><a href="admindash.php">Home</a></span>
<span class="bb"><a href="uploadproduct.php">Upload Products</a></span>
<span class="bb"><a href="userorders.php">User Orders</a></span>
<span class="bb"><a href="listofusers.php">List of Users</a></span>
<span class="bb"><a href="logout.php">Logout</a></span>
</br></br></br></br>
<hr>
<h2 style="color:red;">Upload items</h2>
<hr>
<form method="post" action="" enctype="multipart/form-data">
<h2>Product Name : </h2><h2><input type="text" class="txt" name="pname"></h2>
<h2>Product Price : </h2><h2><input type="text" class="txt" name="pprice"></h2>
<h2> Product Type :</h2><h2><select name="ptype"  class="txt">
<option value="New">New</option>
<option value="Used">Used</option>
</select>
</h2>
<h2>Product Description : </h2>
<textarea rows="10" cols="50" name="pdes"></textarea>

<h2> Product Picture 1 :</h2><h2><input type="file" class="txt" value=""  name="file1">
</h2>
<h2> Product Picture 2 :</h2><h2><input type="file" class="txt" value=""  name="file2">
</h2>
<input type="submit" value="     Save     "class="txt" name="save">
</form>
</body>
</html>