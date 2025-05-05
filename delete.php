<?php
include 'connection.php';
$id = $_GET['id'];
$id1 = $_GET['id1'];
$data = mysqli_query($conn,"delete from messages where id = '$id1' ");
$id = dechex($id);
header("location:cht.php?id=$id");
 ?>