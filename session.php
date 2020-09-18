<?php
session_start();
if (!isset($_SESSION['id'])){
header('location:login.php');
}
$session_id = $_SESSION['id'];
$session_query = $conn->query("select * from users where user_id = '$session_id'");
$sql=mysqli_fetch_assoc($session_query);
$username = $sql['name'];
$image = $sql['url'];
?>




