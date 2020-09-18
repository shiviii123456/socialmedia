<?php
include('connection.php');
include('session.php');
$caption = $_POST['caption'];
$conn->query("insert into posts(caption,post_date,user_id) values('$caption',NOW(),'$session_id')");
header('location:home.php');

?>