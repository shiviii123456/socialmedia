<?php
  $servername = "localhost";
  $username = "root";
  $password ="";
  $database = "socialdb";
  $conn = mysqli_connect($servername,$username,$password,$database);
  if(!$conn){
      echo "no connection";
  }
 
  ?>
