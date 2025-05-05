<?php
include 'connection.php';
include 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chatting</title>
	<style type="text/css">
		.right
		{
			border: 0px solid red;
			width: 45%;
			position: relative;
			right: 5%;
			height: auto;
			padding: 5px 10px;
			float: right;
			display: flex;
			flex-direction: column;
			align-items: flex-end;
		}
		.left
		{
			border: 0px solid green;
			width: 45%;
			position: relative;
			height: auto;
			padding: 5px 10px;
			float: left;
		}
		.options1
		{
			border: 0px solid;
			position: relative;
			top: 10px;
			padding: 10px;
			width: fit-content;
			border-radius: 5px;
			background: lightgreen;
			opacity: 0;
		}
		.options1:hover
		{
			opacity: 100%;
		}
		.options1.active
		{
			opacity: 100%;
		}

		.options2
		{
			border: 0px solid;
			position: relative;
			top: 10px;
			padding: 10px;
			width: fit-content;
			border-radius: 5px;
			background: lightyellow;
			opacity: 0;
		}
		.options2:hover
		{
			opacity: 100%;
		}
		.options2.active
		{
			opacity: 100%;
		}
		
	</style>
</head>

<body>

<?php 
$id = $_GET['id'];
$email = $_SESSION['email'];
$data = mysqli_query($conn,"select * from messages where chatid = '$id' ");
$data1 = mysqli_query($conn,"select * from messages where chatid = '$id' ");

//echo $id;
?>

<div class="left">
	<?php 

	while($result = mysqli_fetch_array($data))
{
	if($result['uemail'] == $email)
	{
	echo "<div style='width: fit-content; height: auto; background: green; color: white; padding: 10px 20px; border-radius: 5px; ' class='msg1' >$result[8]</div>

	<div class='options1' id='options1'><a href='delete.php?id=$result[7]&id1=$result[0]' style='color:red;' onclick='return delete_msg()' >Delete</a></div><br><br>

	";
}

}

	?>
</div>

<div class="right">
	
<?php
	while($result1 = mysqli_fetch_array($data1))
	{
		if($result1['uemail']!= $email)
		{
		echo "<div style='width: fit-content; height: auto; background: yellow; color: white; padding: 10px 20px; border-radius: 5px; ' class='msg2'>$result1[8]</div>
		

		<div class='options2' id='options2'><a href='delete.php?id=$result1[7]&id1=$result1[0]' style='color:red;' onclick='return delete_msg()' >Delete</a></div><br><br>";
	}

	}
 ?>

</div>

<script type="text/javascript">
	var data1 = document.getElementsByClassName('msg1');
	var option1 = document.getElementsByClassName('options1');
	
	for(var i=0; i<=data1.length; i++)
	{
		data1[i].addEventListener("mouseover",function(){
			for(var j = 0; j<=option1.length; j++)
			{
				option1[j].classList.toggle("active");
			}
		});
	}

	
</script>

<script type="text/javascript">
	var data2 = document.getElementsByClassName('msg2');
	var option2 = document.getElementsByClassName('options2');
	for(var k=0; k<=data2.length; k++)
	{
		data2[k].addEventListener("mouseover",function(){
			for(var l = 0; l<=option1.length; l++)
			{
				option2[l].classList.toggle("active");
			}
		});
	}
</script>

<script type="text/javascript">
	function delete_msg()
	{
		return confirm("Are you sure want to delete this message?");
	}
</script>

</body>
</html>

