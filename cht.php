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
	<link rel="stylesheet" type="text/css" href="css/style4.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Chatting</title>
</head>
<body>

<div class="heading">
		<h3>Web chatting site</h3>
	</div>

	<?php

?>

<nav class="contactlist" id="contactlist" style="color: white;">
		<div class="content">
			<ul>
<?php
$id = $_GET['id'];
$email = $_SESSION['email'];
$dta = mysqli_query($conn,"select * from contact_list where cemail = '$email' ");
$ttl = mysqli_num_rows($dta);
if($ttl!== 0)
{
while($res = mysqli_fetch_array($dta))
{
	$res[7] = dechex($res[7]); 
				echo "<li><i class='fa fa-phone'></i><a href='cht.php?id=$res[7]'>$res[1]</a></li>"; 
			} 
	}
			else
			{
				echo "No Contacts Found";
			}
	?>
			</ul>
		</div>
	</nav>

	<!-- Navigation code -->

	<div class="menu" id="menu" onclick="menu()">
		<span></span>
		<span></span>
		<span></span>
	</div>

<div class="footer" id="footer">
	<ul>
		<li><p style="cursor: pointer;" onclick="document.getElementById('add-content-content').classList.add('active')"><i class="fa fa-plus" aria-hidden="true" style="padding: 0 10px;"></i>Add Contact</p></li>
		<li style="position: relative; left: -15px; "><a href='settings.php'><i class="fa fa-gear" aria-hidden="true" style="padding: 0 10px;"></i>Settings</a></li>		
	</ul>
</div>


<div class="container">
	<div class="content">
		<div class="heading">Welcome</div>
		<div class="profile">
			<?php
			$email = $_SESSION['email'];
			$dta = mysqli_query($conn,"select * from account where email = '$email' ");
			$res = mysqli_fetch_array($dta);
			if($res[7]!="" and $res[7]!="profiles/")
			{
				echo "<a href='profile.php' style='color: black;'><img src='$res[7]' width='30px' height='30px' style='border-radius:50%;'></a>";
			}
			else
			{
			echo "<a href='profile.php' style='color: black;'><i class='fa fa-user-circle' aria-hidden='true'></i></a>";
		}
			?>
		</div>
		<div class="chats">
			
		</div>
		<form action="" method="post">
			<textarea name="message"></textarea>
			<input type="submit" name="submit" value="Send">
		</form>
	</div>
</div>

<div class="add-contact">
	<div class="content" id="add-content-content">
	<form action="" method="post" autocomplete="off">
		<div class="header">
		<h4>Add persons to your contact</h4>
		<i class="fa fa-times" aria-hidden="true" class="cancel" onclick="document.getElementById('add-content-content').classList.remove('active')"></i>
	</div>
		<input type="number" id ="contact_number" name="number" placeholder="Enter Mobile Number">
		<input type="submit" name="add_contact" value="Add to contact">
	</form>
</div>
</div>


<script type="text/javascript">
		var menubar = document.getElementById("menu");
		var contactlist = document.getElementById("contactlist");
		var footerdata = document.getElementById("footer");
		function menu()
		{
			menubar.classList.toggle("active");
			contactlist.classList.toggle("active");
			footerdata.classList.toggle("active");

		}
	</script>

	<script type="text/javascript">
		let data = document.getElementById("test");
		let content = document.getElementById("content");
		location.href("chat.php?data='' ");
	</script>

	<script type="text/javascript" src="Jquery/jquery.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){
			refresh();
		});
		function refresh()
		{
			setTimeout(function(){
				$(".chats").load("chtting.php?id=<?php echo hexdec($_GET['id']); ?>")
				refresh();
		},200);

		}
	</script>


</body>
</html>
<?php

if(isset($_POST['submit']))
{
$id = hexdec($_GET['id']);
$msg = $_POST['message'];
$email = $_SESSION['email'];

$dta = mysqli_query($conn,"select * from contact_list where uemail = '$email' ");
$result = mysqli_fetch_array($dta);

$name = $result['uname'];
$email = $_SESSION['email'];
$mobile = $result['umobile'];

$cname = $result['cname'];
$cemail = $result['cemail'];
$cmobile = $result['cmobile'];

if(trim($msg))
{
$data = mysqli_query($conn,"insert into messages (uname,uemail,umobile,cname,cemail,cmobile,chatid,message) values('$name','$email','$mobile','$cname','$cemail','$cmobile','$id','$msg') ");
}
}
?>

<?php
if(isset($_POST['add_contact']))
{
	$email = $_SESSION['email'];
	$data = mysqli_query($conn,"select * from account where email = '$email' ");
	$result = mysqli_fetch_array($data);
	//echo "<script>alert('$result[4]')</script>";
	$uname = $result[1];
	$umobile = $result[4];
	$contact = $_POST['number'];
	if($contact!==$umobile)
	{
	$data1 = mysqli_query($conn,"select * from account where mobile = '$contact' ");
	$result1 = mysqli_fetch_array($data1);
	//echo "<script>alert('$result1[1]')</script>";
	$total1 = mysqli_num_rows($data1);
	if($total1 == 0)
	{
		echo "<script>alert('Sorry this contact is not available ')</script>";
	}
	else
	{

	$cname = $result1[1];
	$cemail = $result1[5];
	$chatid = random_int(111111111, 999999999);

	$data2 = mysqli_query($conn,"select * from contact_list where cmobile = '$contact' and umobile = '$contact' and chatid = '$chatid' ");
	$total2 = mysqli_num_rows($data2);
	if(trim($contact) and $total2<1)
	{
		$data3 = mysqli_query($conn,"insert into contact_list (uname,uemail,umobile,cname,cemail,cmobile,chatid) values('$uname','$email','$umobile','$cname','$cemail','$contact','$chatid') ");

		$data4 = mysqli_query($conn,"insert into contact_list (uname,uemail,umobile,cname,cemail,cmobile,chatid) values('$cname','$cemail','$contact','$uname','$email','$umobile','$chatid') ");

		$data5 = mysqli_query($conn,"select * from contact_list where uemail = '$email' and cemail = '$cemail' ");
		$result5 = mysqli_fetch_array($data5);
		$chid = dechex($result5[7]);

		if($data3)
		{
			header("location:cht.php?id=$chid");
		}
	}
}

}

}
?>