<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<meta name="keywords" content="chat application, chatting app,chat site,web chatting application">
	<meta name="description" content="Web Chatting application free to use and device friendly">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="60">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Home Page</title>
</head>
<body>
	<header>
			<ul>
				<li><a href="#home">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
				<button><a href="registration.php">Sign Up</a></button>
			</ul>
			<div class="menu" id="menu" onclick="slide()">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="content" id="content">
				<ul>
					<li><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
				<button><a href="registration.php">Sign Up</a></button>		
			</div>
	</header>

	<section class="banner" id="home">
		<content>
			<h2 style="color: violet; text-shadow: 2px 2px 3px black; ">Welecome to our chat site</h2>
			<p style="padding: 10px 20px; color: black; text-align: center; font-size: 17px; ">A new chatting server system</p>
			<button><a href="login.php">Login</a></button>
		</content>
	</section>

	<section class="features">	
		<content>
		<h2 style="position: absolute; padding: 5px 0; ">Our Features</h2>
		<img src="images/features.png" width="400px">
			<ol>
				<li>Cheap and relible server</li>
				<li>More relible than others</li>
				<li>Encrypted Data</li>
				<li>Easy to use</li>
				<li>Multiple Users</li>
				<li>Can be access anytime anywhere</li>
				<li>Device Friendly</li>
			</ol>
		</content>
	</section>

	<section class="about" id="about">
		<div style="">
			<h2>About Us</h2>
			<img src="images/about.png" style="position: relative; right: 0%; border-radius: 10px; ">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
	</section>

	<footer id="contact">
		<div class="content">
			<h2>Get in touch</h2>
		<div class="contact">
			<h3>Phone</h3> <br>
			+91 7689042578 <br>
			+91 8902345780 <br> 
			+18008109346
			<br> <br>
			<h3>Email</h3> <br>
			example@gmail.com
		</div>
		<div class="location">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241412.52832103326!2d72.86834519926836!3d19.01660360120229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b9f0b81f13ad%3A0x3c12f7681185f869!2sNavi%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1709705663209!5m2!1sen!2sin" width="230" height="200" style="border:0; border-radius: 10px; margin-top: 5px; " allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<div class="quick-links">
			<h3>Quick Links</h3> <br> <br>
			Home <br><br>
			About <br> <br>
			Contact
		</div>
		<div class="feedback">
			<h3>Feedback</h3> <br> <br>
			<form>
				Name: <input type="text" name=""><br>
				Email: <input type="email" name=""><br>
				<textarea name="" noresize placeholder="Feedback"></textarea><br>

				<input type="submit" name="" value="Send">
			</form>
		</div>
	</div>
	</footer>

	<script type="text/javascript">
		var menu = document.getElementById("menu");
		var menubar = document.getElementById("content");
		function slide()
		{
			menu.classList.toggle("active");
			menubar.classList.toggle("active");
		};

		// if(localStorage.getItem('sitename','Chat%20Application/home.php')!=null)
		// {
		// 	location.href = 'dashboard.php';

		// }
		// else
		// {
		// 	localStorage.setItem('sitename','Chat%20Application/home.php');
		// 	// location.href = 'Chat%20Application/dashboard.php';
		// }
	</script>
</body>
</html>