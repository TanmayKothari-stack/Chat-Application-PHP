<?php
include 'connection.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Glassphorisim Form</title>
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
	height: 420px;
	width: 430px;
	background-color: rgba(255,255,255, 0.07);
	position: absolute;
	transform: translate(-50%);
	left: 50%;
	top: 17%;
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
	margin-top: 30px;
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
	<span>Login To Your Account</span>
</h3>
<label for="email">Email</label>
<input type="text" name="email" placeholder="Enter Your Email" id="email">

<label for="password">Password</label>
<input type="password" name="password" placeholder="Enter Your Password" id="password">
<input type="submit" name="submit" value="Login">
</form>
</body>
</html>


<?php

if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$data = mysqli_query($conn,"select * from account where email = '$email' and password = '$pass' ");
	$total = mysqli_num_rows($data);

	$result = mysqli_fetch_array($data);
	$name = $result[1];
	$device = gethostname();

	if($total == 1)
	{
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;

		$data1 = mysqli_query($conn,"select * from login_data where device_name = '$device' ");
		$total1 = mysqli_num_rows($data1);

		if($total1 == 0)
		{

		$data2 = mysqli_query($conn,"insert into login_data (email,password,device_name) values ('$email','$pass','$device') ");

		}
		header("location:dashboard.php");
	}

	else
	{
		echo "<script>alert('Sorry A Technical Fault Occur To Submit Your Data')</script>";
	}
}
?>