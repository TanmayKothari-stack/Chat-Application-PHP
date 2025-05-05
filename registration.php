<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<style type="text/css">
		*, *:before, *:after
{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
body
{
	background-color: #080710;
}
.container
{
	width: 430px;
	height: 520px;
	border: 0px solid white;
	position: absolute;
	transform: translate(-50%, -50%);
	left: 50%;
	top: 50%;
}

.circle1, .circle2
{
	height: 200px;
	width: 200px;
	position: absolute;
	border-radius: 50%;
}

.circle1
{
	background: linear-gradient(blue, #bf23f6);
	left: -80px;
	top: -50px;
}

.circle2
{
	background: linear-gradient(to right, #ff512f, yellow);
	right: -350px;
	top: 200%;
}


form
{
	height: 590px;
	width: 430px;
	background-color: rgba(255,255,255, 0.07);
	position: absolute;
	transform: translate(-50%);
	left: 50%;
	top: 7%;
	right: 50%;
	border-radius: 10px;
	backdrop-filter: blur(10px);
	border: 2px solid rgba(255,255,255, 0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}

form *
{
	color: white;
	letter-spacing: 0.5px;
	outline: none;
	
}
h3
{
	font-size: 33px;
	font-weight: bold;
	line-height: 42px;
	text-align: center;
}

form h3 span
{
	display: block;
	font-size: 16px;
    font-weight: 300;
}

label
{
	display: block;
	margin: 15px;
	font-size: 16px;
	font-weight: 500px;
}

input
{
	background-color: rgba(255,255,255,0.07);
	display: block;
	width: 100%;
	height: 30px;
	outline: none;
	border-radius: 5px;
	padding-left: 10px;
}


input[type="submit"]
{
	background-color: rgb(255,255,255);
	color: black;
	cursor: pointer;
	margin-top: 20px;
}
input[type="submit"]:hover
{
	background: linear-gradient(to right, #ff512f, yellow);
	color: white;
}
	</style>
</head>
<body>
<div class="container">
	<div class="circle1">
		<div class="circle2"></div>
	</div>
</div>
<form action="" method="post" autocomplete="off">
	<h3>Welcome
	<span>Register To Your Account</span>
</h3>
<label for="username">Username</label>
<input type="text" name="name" placeholder="Enter Your Name" id="username">
<label for="password">Password</label>
<input type="password" name="password" placeholder="Enter Your Password" id="password">
<label for="Conform Password">Conform Password</label>
<input type="password" name="conformpass" placeholder="Enter Your Conform Password" id="Conform Password">
<label for="mobile">Mobile</label>
<input type="text" name="mobile" placeholder="Enter Your Mobile Number" id="mobile">
<label for="email">Email</label>
<input type="text" name="email" placeholder="Enter Your Email" id="email">
<input type="submit" name="submit" value="Register">
</form>
</body>
</html>


<?php
$name = $_POST['name'];
$pass = $_POST['password'];
$email = $_POST['email'];
$sql = "select * from account where name = '$name' || password = '$pass' || email = '$email' ";
$raw = mysqli_query($conn, $sql);
$ttl = mysqli_num_rows($raw);

if($ttl == 1)
{
echo "<script>alert('This Name Password and Email is Aleraedy Registered Please Choose The Diffrent One')</script>";
}
else
{	
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$pass = $_POST['password'];
	$conpass = $_POST['conformpass'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$device_name = gethostname();

	$query = "insert into account (name, password, conformpassword, mobile, email,device_name) values ('$name', '$pass', '$conpass', '$mobile', '$email','$device_name')  ";
	$data = mysqli_query($conn, $query);

	if($data)
	{
		header('location:login.php');
	}

	else
	{
		echo "<script>alert('Sorry A Technical Fault Occur To Submit Your Data')</script>";
	}
}
}
?>