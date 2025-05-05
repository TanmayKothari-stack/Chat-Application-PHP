<?php
include 'connection.php';
include 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/image-x" href="icon.ico">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Profile</title>
</head>
<body>
	<div class="heading">
		<h3>Web chatting site</h3>
	</div>

<nav class="navigation" id="navigation">
		<div class="content">
			<ul>
				<li><i class="fa fa-tachometer" aria-hidden="true"></i><a href="dashboard.php">Dashboard</a></li>
				<li><i class="fa fa-user-circle" aria-hidden="true"></i><a href="profile.php">Profile</a></li>
				<li><i class="fa fa-commenting-o" aria-hidden="true"></i><a href="cht.php">Go to chat</a></li>
				<li><i class="fa fa-gear" aria-hidden="true"></i><a href="settings.php">Settings</a></li>
				<li><i class="fa fa-comments" aria-hidden="true"></i><a href="feedback.php">Feedback</a></li>
				<li><i class="fa fa-phone" aria-hidden="true"></i><a href="contact.php">Contact</a></li>
				<li><i class="fa fa-address-book-o" aria-hidden="true"></i><a href="about.php">About</a></li>
			</ul>
		</div>
	</nav>

  <!-- navigation code -->


	<div class="menu" id="menu" onclick="menu()">
		<span></span>
		<span></span>
		<span></span>
	</div>

	<div class="container">
		<?php

		$email = $_SESSION['email'];
		$data = mysqli_query($conn,"select * from account where email = '$email' ");
		$result = mysqli_fetch_array($data);
		 ?>
		<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
			<h3 align="center">User Profile</h3>
			<input type="file" id="file" name="file" style="visibility: hidden;">
			<div class="photo" onclick="document.getElementById('file').click()"><?php if($result['photo']!="" and $result['photo']!="profiles/"){echo "<img src='$result[7]' width='100px' height='100px' style='border-radius:50%;' >";} else{echo "<i class='fa fa-user-circle' aria-hidden='true'></i>";} ?></div>

		<div class="user-data">
			<label>Username</label>
			<input type="text" name="name" id="name" required placeholder="Username" value = <?php echo $result[1];  ?>>

			<label>Password</label>
			<input type="text" name="password" id="password" required placeholder="Password" value = <?php echo $result[2];  ?>>

			<label>Conform Password</label>
			<input type="text" name="conformpassword" id="conformpassword" required placeholder="Conform Password" value =  <?php echo $result[3];  ?>>

			<label>Mobile</label>
			<input type="number" name="mobile" id="mobile" required placeholder="Mobile Number" value = <?php echo $result[4]; ?>>

			<label>Email</label>
			<input type="email" name="email" id="email" required placeholder="Email" value = <?php echo $result[5];  ?>>

			<input type="submit" name="update" value="Update" onclick="return update_data()">
		</div>

	</div>

		</form>

<script type="text/javascript">
		var menubar = document.getElementById("menu");
		var navigation = document.getElementById("navigation");
		function menu()
		{
			menubar.classList.toggle("active");
			navigation.classList.toggle("active");

		}
	</script>

	<script type="text/javascript">
		function update_data()
		{
		var name = document.getElementById('name').value;
		var pass = document.getElementById('password').value;
		var conpass = document.getElementById('conformpassword').value;
		var email = document.getElementById('email').value;
		var mobile = document.getElementById('mobile').value;

		if(name.trim() == "")
		{
			alert("Please write your name");
			return false;
		}

		if(name.trim().length < 2)
		{
			alert("Please write proper name");
			return false;
		}

		if(pass.trim() == "")
		{
			alert("Please write your password");
			return false;
		}

		if(pass.trim().length < 3)
		{
			alert("Please write your password atleast 3 charaters");
			return false;
		}

		if(conpass.trim() == "")
		{
			alert("Please write your conform password");
			return false;
		}

		if(conpass!==pass)
		{
			alert("Your password and conform password doesn't match");
			return false;
		}

		if(mobile.trim() == "")
		{
			alert("Please write your mobile number");
			return false;
		}

		if(mobile.trim().length < 10 || mobile.trim().length > 10)
		{
			alert("Please write your proper mobile number");
			return false;
		}

		if(email.trim() == "")
		{
			alert("Please write your email");
			return false;
		}

		if(email.trim().length < 12)
		{
			alert("Please write your proper email");
			return false;
		}

		if(email.charAt(email.length-3)!='.' && email.charAt(email.length-4)!='.')
		{
			alert("Please write proper email");
			return false;
		}



	}
	</script>

</body>
</html>

<?php
if(isset($_POST['update']))
{
	$uemail = $_SESSION['email'];
	$name = $_POST['name'];
	$pass = $_POST['password'];
	$conpass = $_POST['conformpassword'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$photo_name = $_FILES['file']['name'];
	$photo = $_FILES['file']['tmp_name'];
	$folder_name = "profiles/".$photo_name;
	$folder = move_uploaded_file($photo, "profiles/".$photo_name);

	$data = mysqli_query($conn,"update account set name = '$name',password = '$pass' , conformpassword = '$conpass' , mobile = '$mobile' , email = '$email' , photo = '$folder_name' where email = '$uemail' ");
	// if($result['photo'] == "" or $result['photo'] == "profiles/")
	// {
	// 	$data1 =  mysqli_query($conn,"update account set photo = '$folder_name' where email = '$uemail' ");
	// }
	if($data)
	{
	header("location:dashboard.php");
		//echo "<script>alert('Hello')</script>";
	}
}
?>