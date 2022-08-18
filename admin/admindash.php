<html>
<head>
<title></title>
<?php
include_once('connect.php');
session_start();

if($_SESSION['email']==''){
	header("location:adminlogin.php");
}
else{
$useremail= $_SESSION['email'];
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

.pst{
	width:120px;
	height:120px;
	border:solid 2px red;
	float:left;
	margin:10px;
	text-align:center;
	font-size:25px;

}
.indiv{
	width:100px;
	background-color:darkred;
	padding:2 5px:
	display:flex;
	align-items:center;
	justify-content:center;
	height:100px;
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
<h2 style="color:red;">List of items</h2>
<hr>

<form method="post" action="">
<input type="submit" value="Click to view items"class="txt" name="upd">
</form>



<table border="1" cellpadding="0">
<tr>
<th>Product Tag </th>
<th>Product Name</th>
<th>Product Price</th>
<th>Product Type</th>
<th>Product Description</th>
<th>Product Picture 1</th>
<th>Product Picture 2</th>
<th>Operation</th>
</tr>
<?php
if(isset($_POST['upd'])){

$st="select * from products ";
	$stquery=mysql_query($st);
	
	$checkrow=mysql_num_rows($stquery);
if ($checkrow>0){
		while($drow=mysql_fetch_assoc($stquery)){
	$tag=$drow['tag'];
	$tagid=$drow['id'];
	echo"
	
	<tr>
	<td>".$drow['tag']."</td>
<td>".$drow['pname']."</td>
<td> ".$drow['pprice']."</td>
<td> ".$drow['ptype']."</td>
<td> ".$drow['pdes']."</td>
<td> 
<div class='indiv'>
		<a href=''>
<img height='100px' width='100px' src='productfile/$tag/".$drow['pic1']."'/>
</a>
	</div>
</td>


<td> <div class='indiv'>
		<a href=''>
<img height='100px' width='100px' src='productfile/$tag/".$drow['pic2']."'/>
</a>
	</div></td>
	
	
	
<td> 
<a href='delconf.php?pro=".$drow['id']."' style='color:red;'>Delete</a>||<a style='color:red;'  href=''>Update</a>
</td>

	</tr>	
	";
		}
}
}

?>

</body>
</html>