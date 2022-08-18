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
<script>
function dothis(){
	window.location.href='product.php';
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

.bb1{
	margin:auto;
	width:80%;
	height:80px;
		background-color:blue;	
	box-shadow:5px 5px 10px 5px red;
	border:2px solid black;
}

.bb12{
	margin:auto;
	width:100%;
	height:40px;
}
.bb123{
	margin:auto;
	width:100%;
	height:40px;
	background-color:red;
	font-size:20px;
	font-weight:bolder;
}

.bb123:hover{
	margin:auto;
	width:100%;
	height:40px;
	background-color:blue;
}

.txt{
	padding: 5 20px;
	font-size:18px;
}
.aaa{
	text-decoration:none;
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
	justify-content:center;
	height:250px;
}
.mmm{
	border:2px solid red;
	float:left;
	margin:10 5px;
	width:300px;
	height:200px;
	padding:5 8px;
	flex:1;
	
}
.hhh{
	border:2px solid black;
	display:flex;
}
</style>
</head>
<body>
<h1>Welcome <span style="color:white;"><?php echo $useremail ; ?> </span>to your account</h1>


<div class="header1">
<span class="bb"><a href="userdash.php">Home</a></span>
<span class="bb"><a href="userprofile.php">Edit profile</a></span>
<span class="bb"><a href="">My order</a></span>
<span class="bb"><a href="logout.php">Logout</a></span>
<br><br><br>
</div>
<br><br>
<div class="bb1">
<form  method="post"><input class="bb12" name="item" type="text" size="70" placeholder="Enter Item name to search" >
<input class="bb123" type="submit" name="look" value="Search">
</div>


<?php

$item=$_POST['item'];

if(isset($_POST['look'])){
	
		
	$st="select * from products where pname like'%$item%'";
	$stquery=mysql_query($st);
	
	while($mrow=mysql_fetch_assoc($stquery))
	{
	
	if($mrow > 0)
	{
		$tag=$mrow['tag'];
		echo"<div class=''>
		<br>
		<a class='aaa'href='product.php?pro=".$mrow['id']."'>
		
		
<img height='150px' width='200px' src='admin/productfile/$tag/".$mrow['pic1']."'/>
<img height='150px' width='200px' src='admin/productfile/$tag/".$mrow['pic2']."'/>
<br>
	<label>Product Name:</label>".$mrow['pname']."<br>
	<label>Product Price:</label>".$mrow['pprice']."<br>
	
</a>
	
		</div>
		";
	}
	
	else{
		echo"<script> alert('No item found');</script>";
	}
	}
}
?>

</br></br></br></br>
<hr>
<h2 style="color:white;">List of items</h2>
<hr>
<?php
	$st="select * from products";
	$stquery=mysql_query($st);
	
	while($drow=mysql_fetch_array($stquery))
	{
		

		$tag=$drow['tag'];
		echo"<div class='pst'>
		
		<div class='indiv'>
		<a href='product.php?pro=".$drow['id']."'>
<img height='250px' width='300px' src='admin/productfile/$tag/".$drow['pic1']."'/>
</a>
	</div>
<label>Product Name:</label>
	".$drow['pname']."<br>
<label>Product Price:</label>
	".$drow['pprice']."<br>
<a style='color:red;' href='product.php?pro=".$drow['id']."'>Click To Order</a></div>
		";
	}
?>
<hr>
<hr>
<h2 style="color:white;">You May also like : </h2>
<hr>
<?php

	$st="select * from products ";
	$stquery=mysql_query($st);
	
	while($srow=mysql_fetch_assoc($stquery))
	{
	
	if($srow > 0)
	{
		
		$tag=$srow['tag'];		

	
echo"<div class='mmm'>
		<marquee>
		<a class='aaa'href='product.php?pro=".$srow['id']."'>
		
		
<img height='150px' width='300px' src='admin/productfile/$tag/".$srow['pic1']."'/>
<img height='150px' width='300px' src='admin/productfile/$tag/".$srow['pic2']."'/>
</a>
	</marquee>
	<br>
	<label>Product Name:</label>".$srow['pname']."<br>
	<label>Product Price:</label>".$srow['pprice']."<br>
		</div>
		";
}

	}

?>

<script language="javascript">
slide=false;
animation = setInterval("slideme()",2000);

var counter=0;
end=4;
function slideme()
{  
if(counter==0){
document.getElementById("text").src="admin/productfile/$tag/".$mrow['pic1']."";
document.getElementById("holder").innerHTML="<a href='etisalat.php'>Image 2</a>";
counter=1;
}
else if (counter==1){
document.getElementById("text").src="pic1.jpg";
document.getElementById("holder").innerHTML="<a href='airtel.php'>Image 3</a>";
counter=2;
}
else if (counter==2){
document.getElementById("text").src="pic4.jpg";
document.getElementById("holder").innerHTML="<a href='glo.php'>Image 4</a>";
counter=3;
}
else {
  document.getElementById("text").src="pic3.jpg";
  document.getElementById("holder").innerHTML="<a href='mtn.php'>Image 1</a>";
  counter=0;
}
}

</body>
</html>