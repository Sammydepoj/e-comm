<html>
<head>
<title></title>
<?php
include_once('connect.php');
session_start();
$useremail= $_SESSION['email'];
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

.indiv{
	width:300px;
	background-color:darkred;
	padding:2 5px:
	height:250px;
}
.cont{
	display:flex;
}
</style>
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
<h2 style="color:white;">Make Order</h2>
<hr>

<form method="post" action="" enctype="multipart/form-data">

<h2>Email : </h2><input type="email" class="txt" value="<?php echo $useremail?>" readonly name="email"></h2>

<h2>Full Name:</h2> <input type="text" class="txt" value="" name="fullname">

<h2>Address: </h2><textarea class="txt" value="" name="address"></textarea>

<h2>Date Ordered: </h2><input readonly type="text" class="txt" value="<?php echo $mydate; ?>" name="ndate"></h2>

<h2>Phone-Number: </h2><input type="text" class="txt" value="" name="phonenumber">

<h2> Quantity : </h2><select class="txt" name="quantity">
 <script language="javascript">

var days= new Array("1","2","3","4","5","6","7","8","9","10");
for(y=0;y<10;y++)
{
document.write("<option value='"+days[y]+"'>"+days[y]+"</option>");
}
</script>
 </select>

</select>
</h2>

<h2>Product Picture: </h2>
<?php
$mydate=Date('d-m-y');
	$myid=$_GET['pra'];
	
if($_SESSION['email']==''){
	header("location:login.php");
}
else{
$useremail= $_SESSION['email'];
	$sy="select * from products where id='$myid'";
	$syquery=mysql_query($sy);
}
	$dshow=mysql_fetch_assoc($syquery);
	
	
$pname=$dshow['pname'];
$pprice=$dshow['pprice'];
$ptype=$dshow['ptype'];
$prodes=$dshow['pdes'];
$ptag=$dshow['tag'];
	

echo"
<div class='cont'>

<div class='indiv'>
<img value='admin/productfile/$ptag/".$dshow['pic1']."' name='file1' height='250px' width='300px' src='admin/productfile/$ptag/".$dshow['pic1']."'/>
</div>
&nbsp&nbsp&nbsp
<div class='indiv'>
<img value='admin/productfile/$ptag/".$dshow['pic1']."' name='file2' height='250px' width='300px' src='admin/productfile/$ptag/".$dshow['pic2']."'/>
</div>

</div>
";

?>
</h2>


<h2>Product Name: </h2><input readonly type="text" class="txt" value="<?php echo $pname?>" name="prodname"></h2>

<h2>Product Price: </h2><input readonly type="text" class="txt" value="<?php echo 'N'. $pprice?>" name="prodprice"></h2>

<h2>Product Type: </h2><input readonly type="text" class="txt" value="<?php echo $ptype?>" name="prodtype"></h2>

<h2>Product Description: </h2><input readonly type="text" class="txt" value="<?php echo $prodes?>" name="proddes"></h2>

<h2>Product Tag: </h2><input readonly type="text" class="txt" value="<?php echo $ptag?>" name="prodtag"></h2>
<br>
<br>
<input type="submit" onclick="" value="      Make Order     "class="txt1" name="order">
</form>

<?php

$email=$_POST['email'];
$fname=$_POST['fullname'];
$add=$_POST['address'];
$mdate=$_POST['ndate'];
$pnum=$_POST['phonenumber'];
$quan=$_POST['quantity'];
$pname=$_POST['prodname'];
$pprice=$_POST['prodprice'];
$ptype=$_POST['prodtype'];
$prodes=$_POST['proddes'];
$ptag=$_POST['prodtag'];
$pic1=$_FILES['file1']['name'];
$pic2=$_FILES['file2']['name'];


if(isset($_POST['order'])){
	
$ins="insert into orders (email,fullname,address,ndate,phonenumber,quantity,
pname,pprice,ptype,pdes,ptag,pic1,pic2)
 value('$email','$fname','$add','$mdate','$pnum','$quan','$pname','$pprice',
 '$ptype','$prodes',$ptag,$pic1,$pic2)";

	$myquery=mysql_query($ins);
	
	if($myquery){
		
		mkdir("prodimg/$ptag");
		move_uploaded_file($_FILES['file1']['tmp_name'],"prodimg/$ptag/".$pic1);
		move_uploaded_file($_FILES['file2']['tmp_name'],"prodimg/$ptag/".$pic2);
		
	echo"<script> alert('Order Made Successfully');</script>";
	}
	else{
		echo"<script> alert('Order not made Succesfully');</script>";
	}

}


?>

</body>
</html>