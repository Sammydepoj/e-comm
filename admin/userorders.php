<html>
<head>
<title></title>
<?php
include_once('connect.php');
session_start();

if($_SESSION['email']==''){
	header("location:adminlogin.php");
}
$ptag=$_POST['ptag'];
$pname=$_POST['pname'];
$pprice=$_POST['pprice'];
$ptype=$_POST['ptype'];
$pdes=$_POST['pdes'];
$ppic=$_POST['ppic'];

$useremail= $_SESSION['email'];


if(isset($_POST['update'])){
	$st="select * from products where ptag='$ptag'";
	$stquery=mysql_query($st);
	
	$checkrow=mysql_num_rows($stquery);
	if($checkrow > 0)
	{
		echo"<script> alert('Product already uploaded');</script>";
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
<h1>Welcome <span style="color:red;"><?php echo $useremail; ?></span> to your account</h1>

<span class="bb"><a href="admindash.php">Home</a></span>
<span class="bb"><a href="uploadproduct.php">Upload Products</a></span>
<span class="bb"><a href="userorders.php">User Orders</a></span>
<span class="bb"><a href="listofusers.php">List of Users</a></span>
<span class="bb"><a href="logout.php">Logout</a></span>
</br></br></br></br>
<hr>
<h2 style="color:red;">Orders</h2>
<hr>
<form method="post" action="">
<h2>Date Ordered : 
<select name="odatey">
 <script language="javascript">
var min=1988;
var max=2022;

for(i=min; i<=max; i++)
{
document.write("<option value='"+i+"'>"+i+"</option>");
}
</script>
 </select>
 <select name="odatem">
 <script language="javascript">
var myarray= new Array("January","Febrary","March","April","May","June","July","august","September","October","November","December");
for(j=0;j<12;j++)
{
document.write("<option value='"+myarray[j]+"'>"+myarray[j]+"</option>");
}
</script>
 </select>
  <select name="odated">
 <script language="javascript">

var days= new Array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
for(y=0;y<31;y++)
{
document.write("<option value='"+days[y]+"'>"+days[y]+"</option>");
}
</script>
 </select>
</h2>
<h2>Order  Name : <input type="text" class="txt" value="" readonly name="oname"></h2>
<h2> Order Type :<input type="text" class="txt" value="" readonly name="otype">
</h2>
<h2>Order Description : <input type="text" class="txt" value="" readonly name="odes"></h2>

<h2> Order Number :<input type="text" class="txt" value="" readonly name="onum">
</h2>
</form>
</body>
</html>