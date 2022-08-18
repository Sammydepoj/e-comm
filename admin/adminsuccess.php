<html>
<head>
<title></title>
<?php
include_once('connect.php');
session_start();
$myemail=$_SESSION['email'];
?>
<style>
.txt{
	padding: 5 20px;
	font-size:18px;
}
.ghg{
	color:blue;
}
#progress_status{
	width: 100px;
	background-color:#ddd;
}
#myBar{
	width:10%;
	height:30px;
	background-color:green;
	text-align:center;
	line-height:32px;
	color:black;
}
</style>

</head>
<body>
<h1>Welcome <span class="ghg"><?php echo $myemail;?></span> u can now login with ur email and passsword</h1>
<div id="progress_status">
<div id="myBar">10%</div>
</div>
<button class="txt" onclick="move()">Click to login</button>
<script>
function move(){
const myBar =document.getElementById('myBar');
var width=0;
var timeInt=setInterval(frame,70);
function frame(){
	if(width>=100){
	clearInterval(timeInt);
}else{
	width++;
	myBar.style.width=width+'%';
	myBar.innerHTML=width+'%';
					location.href="adminlogin.php";

}
}
}

</script>
</body>
</html>