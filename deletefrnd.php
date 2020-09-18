<?php
include('connection.php');
$id = $_GET['id'];
	$conn ->query("delete from friends where friends_id = '$id'");
	header('location:friends.php');
?>