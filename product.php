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
}
?>
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
.txt{
	padding: 5 20px;
	font-size:18px;
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

.pst{
	width:300px;
	height:350px;
	border:solid 2px red;
	float:left;
	margin:10px;
	text-align:center;
	font-size:25px;

}
.indiv{
	width:300px;
	background-color:darkred;
	padding:2 5px:
	display:flex;
	align-items:center;
	justify-content:space-between;
	height:250px;
}
.ppp{
	box-shadow:5px 0px 5px 3px grey;
	width:800px;
	height:auto;
	display:flex;
	align-items:center;
    justify-content:center;
	margin:auto;
}
.imgd{
	width:50%;
	height:300px;
}
label{
	color:white;
	font-size:25px;
	margin:8px;
	padding:5px;
	
}
.jjj{
	font-size:25px;
	margin:auto;
	padding: 5 20px;
	display:flex;
}
.aaa{
	width:750px;
	height:auto;
	margin:auto;
	padding:20px 25px;
		box-shadow:5px 5px 5px 3px grey;

}
.abc{
	border:1px solid black;
	text-decoration:none;
	padding:2px;
	margin:15px;
	background-color:red;
	color:white;
}
.abc:hover{
	border:1px solid black;
	text-decoration:none;
	padding:2px;
	margin:15 10px;
	background-color:black;
	color:red;
	box-shadow:3px 2px 4px 3px red;
}
</style>
</head>
<body>
<h1>Welcome <span style="color:white;"><?php echo $useremail; ?></span>to your account</h1>

<div class="header1">
<span class="bb"><a href="userdash.php">Home</a></span>
<span class="bb"><a href="userprofile.php">Edit profile</a></span>
<span class="bb"><a href="">My order</a></span>
<span class="bb"><a href="logout.php">Logout</a></span>

</br></br></br></br>
</div>
<br><br>
<hr>
<h2 style="color:white;">Orders</h2>
<hr>
<?php
	
$item=$_GET['pro'];
		
	$st="select * from products where id='$item'";
	$stquery=mysql_query($st);
	
	$mrow=mysql_fetch_assoc($stquery);
	
	
		$tag=$mrow['tag'];
		echo"<div class='ppp'>
		
		
<img class='imgd'  src='admin/productfile/$tag/".$mrow['pic1']."'/>
<img class='imgd'  src='admin/productfile/$tag/".$mrow['pic2']."'/>
	
	</div>
	
<div class='aaa'>
	<label>Product Name:</label><span class='jjj'>".$mrow['pname']."</span><br>
	<label>Product Price:</label><span class='jjj'>".$mrow['pprice']."</span><br>
	<label>Product Type:</label><span class='jjj'>".$mrow['ptype']."</span><br>
	<label>Product Description:</label><span class='jjj'>".$mrow['pdes']."</span><br>
	<label>Product Tag:</label><span class='jjj'>".$mrow['tag']."</span><br>

<a class='abc' href='order.php?pra=".$mrow['id']."'>Click To Order</a>
</div>

		
		";
?>
</body>
</html>