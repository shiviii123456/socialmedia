<?php
include 'connection.php';
if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $cnfpassword=$_POST['confirmpassword'];

        $pass = md5($password);
        $cnfpass=md5($cnfpassword);

        $emailquery = " select * from users where user_email='$email' ";
        $query = mysqli_query($conn,$emailquery);
        $emailcount=mysqli_num_rows($query);
        if($emailcount>0){
            ?>
            <script>alert("email already registered");</script>
            <?php
        }
        else{
        
           if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
           if($pass === $cnfpass){
            if(strlen($password)>=4 && strlen($cnfpassword)<=8){
         $sql = "insert into users(name,user_name, user_email, password, confirmpassword) values(' $name','  $username','$email','$pass','  $cnfpass')";       
         $execute= mysqli_query($conn,$sql);
         if($execute)
         {
            ?>
            <script>alert("inserted successfully");</script>
            <?php
            header("location: login.php");
         }
        else
        {
            ?>
            <script>alert("not inserted");</script>
            <?php
        }
       }
       else{
        ?>
        <script>alert("password length must contain atleast 4 characters");</script>
        <?php
       }
       }
      else{
          ?>
      <script>alert("password not matched");</script>
      <?php
      }
    }
    else{
        ?>
        <script>alert ("enter a valid email");</script>
        <?php
    }


}
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
</head>

<body>
    <div id="container-register">
        <div id="title">
            <i>Register
        </div>

        <form action="registration.php" method="post">
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="name" placeholder="Name" name="name" type="text"  class="validate" autocomplete="off" required>
            </div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">email</i>
                </div>
`                       <input id="email" placeholder="Email" name="email" type="email"  class="validate" autocomplete="off" required>
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="username" placeholder="Username" name="username" type="text" class="validate" autocomplete="off" required>
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="password" placeholder="Password" name="password" type="password" class="validate" autocomplete="off" required>
            </div>
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
            <input id="cpassword" placeholder="ConfirmPassword" name="confirmpassword" type="password" class="validate" autocomplete="off" required>
            </div>
            <div class="remember-me">
                <input type="checkbox">
                <span style="color: #DDD">I accept Terms of Service</span>
            </div>
            <input type="submit" value="Register" name="register" />
        </form>
        <div class="privacy">
            <a href="#">Privacy Policy</a>
        </div>
        <div class="register">
            Do you already have an account?
            <a href="login.php"><button id="register-link">Log In here</button></a>
        </div>
    </div>
</body>

</html>