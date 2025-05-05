<?php
error_reporting(0);
include 'connection.php'; 
session_start();
$profile = $_SESSION['email'];
if($profile == true)
{

}
else
{
	header("location:login.php");
}

 ?>