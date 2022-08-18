<html>
<head>
<title></title>
<?php

include_once('connect.php');
$sur=$_POST['fname'];
$other=$_POST['othernames'];
$nick=$_POST['nickname'];
$email=$_POST['email'];
$pass=$_POST['password'];
$doby=$_POST['doby'];
$dobm=$_POST['dobm'];
$dobd=$_POST['dobd'];
$gend=$_POST['gender'];
$phone=$_POST['phone'];
$address=$_POST['address'];

if(isset($_POST['sub'])){
	$ins="insert into signup(fname,lname,nname,email,pass,dob,gender,phonenumber,address) 
	value('$sur','$other','$nick','$email','$pass','$doby$dobm$dobd','$gend','$phone','$address')";
	$myquery=mysql_query($ins);
	
	if($myquery){
		echo"<script> alert('Registered successfully');</script>";
	}
	else{
		echo"<script> alert('Registration not successfully');</script>";
	}
}
?>
<style>
.content{
width:800px;
margin:0px auto;
}
.right1{
background-color:red;
width:60%;
height:600px;
float:left;
color:white;
padding:5px;
}
.right2{
background-color:blue;
width:100%;
height:600px;
padding:5px;
color:white;
}
h1{
text-align:center;
font-size:50px;
text-decoration-color:white;
}
input{
width:60%;
display:block;
height:22px;
border:none;
}
input1{
width:20%;
height:22px;
border:none;
}
label{
	display:in-line-block;
}
</style>
</head>
<body>

<div class="content">

<div class="right1">

<h3>Signup to be our member</h3>
<form method="post">
<label>Firstname</label>
<input name="fname" type="text" placeholder="Enter Your Firstname">

<label>Lastname</label>
<input name="othernames" type="text" placeholder="Enter Your Lastname">

<label>Nick Name</label>
<input name="nickname" type="text" placeholder="Enter Your NickName">

<label>Email address</label>
<input name="email" type="email" placeholder="Enter Your Email address">

<label>Password</label>
<input name="password" type="password" placeholder="Enter Your Password">
<br>
<label>Date Of Birth</label>
<select name="doby">
 <script language="javascript">
var min=1988;
var max=2022;

for(i=min; i<=max; i++)
{
document.write("<option value='"+i+"'>"+i+"</option>");
}
</script>
 </select>
 
  <select name="dobm">
 <script language="javascript">
var myarray= new Array("January","Febrary","March","April","May","June","July","august","September","October","November","December");
for(j=0;j<12;j++)
{
document.write("<option value='"+myarray[j]+"'>"+myarray[j]+"</option>");
}
</script>
 </select>
  <select name="dobd">
 <script language="javascript">

var days= new Array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
for(y=0;y<31;y++)
{
document.write("<option value='"+days[y]+"'>"+days[y]+"</option>");
}
</script>
 </select>
 <br>
<label>Gender</label>
<br>
<label>Male</label><input class="input1" name="gender" type="radio" value="Male">
<label>Female</label><input class="input1" name="gender" type="radio" value="Female">

<label>Phone Number</label>
<input name="phone" type="text" placeholder="Enter Your Phone number">
<br>
<label>Address</label>
<textarea name="address" type="text-area" placeholder="Enter Your address"></textarea>

<br></br>
<input name="sub" type="submit" value="Signup">
</form>

</div>


<div class="right2">
<h2>Your details Are:</h2>

<label>Firstname</label>
<?php 
	echo $sur;
?>
<br>
<label>Lastname</label>
<?php 
echo $other;
?>
<br>
<label>Nick Name</label>
<?php 
echo $nick;
?>
<br>
<label>Email address</label>
<?php 
echo $email;
?>
<br>
<label>Password</label>
<?php 
echo $pass;
?>
<br>
<label>Date Of Birth</label>
<?php 
echo $doby.$dobm.$dobd;
?>
<br>
<label>Gender</label>
<?php 
echo$gend;
?>
<br>
<label>Phone Number</label>

<?php 
echo $phone;
?>
<br>
<label>Address</label>

<?php 
echo $address;
?>
<br>
</div>

</div>

</body>
</html>