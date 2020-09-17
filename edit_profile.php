<?php
   include 'connection.php';
   session_start();
   $id=$_SESSION['id'];
   $query=mysqli_query($conn,"SELECT * FROM users where user_id='$id'")or die(mysqli_error());
   $row=mysqli_fetch_array($query);
  
?>  
  
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="editprofile" type="css" href="editprofile.css">
  <title>Edit-Profile</title>
</head>
<body>

<div class="container mt-4">
<h3>Edit your profile here:</h3>
<hr>

<form action="edit_profile.php" method="POST" style="margin-bottom: 50px;"  enctype="multipart/form-data">
  <!-- <div class="form-group">
    <label for="exampleInputEmail1">Profile Pic url</label>
    <input type="url" name="pic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter url">
  </div> -->

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Enter Username" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Bio</label>
    <input type="text" name="bio" class="form-control" id="exampleInputPassword1" placeholder="Enter Bio" required>
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="mumber" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Enter Phone" required>
  </div>
  
  <button type="submit" name="loginsubmit" class="btn btn-primary">Submit</button>

</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

</body>
</html>

<?php
 if(isset($_POST['loginsubmit']))
    {
      $fullname = $_POST['fname'];
      $username = $_POST['username'];
      $bio = $_POST['bio'];
      $phone = $_POST['phone'];
      $sql= $query = "UPDATE users SET name='$fullname', user_name = '$username', bio = '$bio', phone = '$phone' WHERE user_id = '$id'";
         $execute = mysqli_query($conn,$sql);
         if($execute)
         {
            ?>
            <script>alert("inserted successfully");</script>
            <?php
        
         }
        else
        {
            ?>
            <script>alert("not inserted");</script>
            <?php
        }
    }

?>


