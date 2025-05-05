<?php
include 'connection.php';
include 'session.php';

?>
<?php
$email = $_SESSION['email'];
$data = mysqli_query($conn,"select * from contact_list where uemail = '$email' ");
$total = mysqli_num_rows($data);
$result = mysqli_fetch_array($data);

$data1 = mysqli_query($conn,"select * from messages where uemail = '$email' ");
$total1 = mysqli_num_rows($data1);
$result1 = mysqli_fetch_array($data1);

$data2 = mysqli_query($conn,"select * from login_data where email = '$email' ");
$total2 = mysqli_num_rows($data2);
$result2 = mysqli_fetch_array($data2);
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/image-x" href="icon.ico">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
				<li><i class="fa fa-commenting-o" aria-hidden="true"></i><a href="cht.php?id=<?php echo dechex($result['chatid']); ?>">Go to chat</a></li>
				<li><i class="fa fa-gear" aria-hidden="true"></i><a href="settings.php">Settings</a></li>
				<li><i class="fa fa-comments" aria-hidden="true"></i><a href="feedback.php">Feedback</a></li>
				<li><i class="fa fa-phone" aria-hidden="true"></i><a href="contact.php">Contact</a></li>
				<li><i class="fa fa-address-book-o" aria-hidden="true"></i><a href="about.php">About</a></li>
			</ul>
		</div>
	</nav>

	<!-- code for navigation -->

	<div class="menu" id="menu" onclick="menu()">
		<span></span>
		<span></span>
		<span></span>
	</div>

	<div class="container">
		<div class="content">
			<h2>Dashboard</h2>
			<div style="background: red;">Total Accounts <?php echo $total2; ?> </div>
			<div style="background: green;">Total Chats <?php echo $total1; ?> </div>
			<div style="background: blue;">Total Contacts <?php echo $total; ?> </div>

			<!-- <div style="background: red;">Total Accounts</div>
			<div style="background: green;">Total Chats</div>
			<div style="background: blue;">Total Contacts</div>

			<div style="background: red;">Total Accounts</div>
			<div style="background: green;">Total Chats</div>
			<div style="background: blue;">Total Contacts</div>

			<div style="background: red;">Total Accounts</div>
			<div style="background: green;">Total Chats</div>
			<div style="background: blue;">Total Contacts</div> -->


		</div>
	</div>
	<script type="text/javascript">
		var menubar = document.getElementById("menu");
		var navigation = document.getElementById("navigation");
		function menu()
		{
			menubar.classList.toggle("active");
			navigation.classList.toggle("active");

		}
	</script>
</body>
</html>