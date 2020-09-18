<?php
include 'connection.php';
include 'header.php';

session_start();
if (!isset($_SESSION['id'])){
header('location:login.php');
}
$id=$_SESSION['id'];

?>

<?php
if(isset($_POST['post_upload']))
  {
    $user_id = $_SESSION['id'];
    $user_email = $_SESSION['useremail'];
    $username = $_SESSION['username'];
    $caption = $_POST['caption'];
    $post_date = date("yy-m-d");
    $upload_file = $_FILES['photo']; //php function wgich can accept any type of file
    $location = $upload_file['tmp_name'];  //path define
    $name = $upload_file['name']; 
    $url = "./images/posts/".$name; 
    move_uploaded_file($location, $url); 

    $q = "INSERT INTO posts(user_id, user_email, user_name, caption, post_date, post_url) VALUES ('$user_id', '$user_email' , '$username', '$caption', '$post_date', '$url')"; 
    $query= mysqli_query($conn,$q);
    if($query){
        echo "<script> alert('success'); </script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  -->
    <script src="https://kit.fontawesome.com/d3d6f2df1f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="headerr.css">
     <link rel="stylesheet" href="home.css"> 
     <link rel="stylesheet" href="./css/my_style.css"> 

    <title>social media</title>
</head>

<body >
        
<header class="navbar navbar-bright navbar-fixed-top" role="banner">
  <div class="container" style="display:flex;">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="home.php" class="navbar-brand"><i class="icon-home"></i> Home</a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
      <div class="ultags">
      <ul class="nav navbar-nav">
        <li><a href="profile.php"><i class="icon-user"></i> Profile</a></li>
        <li><a href="photos.php"><i class="icon-picture"></i> Posts</a></li>
        <li><a href="friends.php"><i class="icon-group"></i> Friends</a></li>
		
        </li>
        <li>
          <a href="logout.php"><i class="icon-signout"></i> Logout</a>
        </li>
      </ul>
      </div>
  
		<!-- <div class="pull-right">
            <form class="form-inline" method="post" action="search.php">
             <input type="text" name="search" class="form-control"  id="span5" placeholder="Search">
            </form>
		</div>
    -->
      </nav>
  </div>
</header>

    <div class="mt-4">
        <div class="container d-flex " style="padding: 50px 0 0 90px;" >
            <div class="col-9">
                <div class="row">
                    <div class="col-8">
                        
                        <!-- START OF STATUS -->
                        <!-- Start of post an content -->
                        <form method="post" action="home.php" enctype="multipart/form-data" >
                          <div class="main mainpost" style="margin-bottom:20px; padding-bottom:10px; width: 700px; height: 200px;">    

                            <div class="userimg"><img src="<?php echo $_SESSION['user_url'];?>"/>
                            </div>
                            <div class="username">               <p class="name" style="top:15px; font-weight:bold; color: black;"><?php echo $_SESSION['fname']; ?></p>
                            </div>
                            <p class="quotes">
                                <textarea id="mypara" name="caption" placeholder="Share an article ,photo ,video or idea."></textarea>
                            </p>
                            <!-- image load to post -->
                            <div class="post " id="post_preview" style="display: none;">
                                <div id="preview_div">
                                    
                                </div>
                            </div>

                            <div class="postbar">
                                <input type="file" name="photo" accept="images/*" id="chooseimg" onchange="preview()" />
                                <button type="button" class="imgbttn" id="imgbttn" style="float:left;">&#x1f4f7; Images</button>
                                <button name="post_upload" type="submit" id="postmypost" class="postmypost">Post</button>
                            </div>

                         </div>
                        </form>
                        <!-- End of post an content -->
                        <!-- END OF STATUS -->

                        <!-- START OF POSTS -->
                        <div class="d-flex flex-column mt-4 mb-4">

 <div class='card' style='width: 700px;'>
    <div class='card-header p-3'>
        <div class='d-flex flex-row align-items-center'>
            <div
                class='rounded-circle overflow-hidden d-flex justify-content-center align-items-center border border-danger post-profile-photo mr-3'>
                <img src='' alt=''...
                    style='transform: scale(1.5); width: 100%; position: absolute; left: 0;'>
            </div>
            <span class='font-weight-bold'></span>
        </div>
    </div>

    <div class="card-body p-0">
    <?php
     include 'connection.php';
     $sql = "SELECT * from posts ORDER by post_id DESC limit 0,5";
     $qu = mysqli_query($conn,$sql);
     while($roww=mysqli_fetch_array($qu)){
       $t= $_SESSION['fname'];
       $content=$roww['caption'];
       $imgg = $roww['post_url'];
       echo "<div class='mainpost'>";
       echo "<p class='quotes'>$content</p>";
       echo" <div class='post'><img class='postimg' src='$imgg'/></div>";
       echo "</div>";
       echo " <div class='card-header p-3'>
       <div class='d-flex flex-row '>
           <div
               class='rounded-circle overflow-hidden d-flex justify-content-center align-items-center border border-danger post-profile-photo mr-3'>
               <img src='assets/images/profiles/profile-1.jpg' alt=''...
                   style='transform: scale(1.5); width: 100%; position: absolute; left: 0;'>
           </div>
           <span style='font-weight:bold; color: black; float:left;' >$t</span>
       </div>";

     }


     ?>
        

</div>
                        
                                 
                        
                                    

                                    <!-- posted content view -->
                                    <div class="allpost">
                                    <!-- post 1 by creator-->
                                        <div class="mainpost">
                        
                                            <p class="quotes">
                                            </p>
                                        <div class="post">
                                            <img class="postimg" src=""/>
                                        </div>

                                        <div class="likedislike">
                                            <p class="like">
                                                <span class="nooflike" id="like1">0 </span> likes &nbsp <span class="noofdislike" id="dislike1">0 </span> dislikes
                                            </p>
                                            <p class="likedisbttn">
                                                <span id="thumbsup1" class="fa fa-thumbs-up" onclick="increase('like1','dislike1','thumbsup1','thumbsdown1');"></span> <span id="thumbsdown1" class="fa fa-thumbs-down" onclick="decrease('like1','dislike1','thumbsup1','thumbsdown1');"></span>
                                            </p>
                                            <p class="like">
                                                <span class="nooflike" id="like1">0 </span> Comments</span>
                                            </p>
                                        </div>
                                    </div>
                                <!-- end of post 1 by creator -->
                                </div>
                                <!-- end of posted content view -->

                                <!-- button to view more previous post -->
                                <!-- <button type="button" id="viewmore" class="viewmore" onclick="newpost();">View More</button> -->

                                    


                            </div>
                            </div>

                        </div>
                        <!-- END OF POSTS -->
                    </div>
                    <!-- RIGHT SIDE START
                    <div class="col-4">
                        <div class="d-flex flex-row align-items-center" >
                            <div
                                class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center border sidenav-profile-photo">
                                <img src="assets/images/profiles/profile-6.jpg" alt="..."
                                    style="transform: scale(1.5); width: 100%; position: absolute;">
                            </div>
                            <div class="profile-info ml-3">
                                <span class="profile-info-username">codingvenue</span>
                                <span class="profile-info-name">Coding Venue</span>
                            </div>
                        </div> 
                        <div class="mt-4">
                            <div class="d-flex flex-row justify-content-between">
                                <small class="text-muted font-weight-normal" >Suggestions For You</small>
                                <small>See All</small>
                            </div>
                            <div> -->
                                <!-- start of right section suggestion user 
                               
                                <div class="d-flex flex-row justify-content-between align-items-center mt-3 mb-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <div
                                            class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center border sugest-profile-photo">
                                            <img src="assets/images/profiles/profile-3.jpg" alt="..."
                                                style="transform: scale(1.5); width: 100%; position: absolute; left: 0;">
                                        </div>
                                        <strong class="ml-3 sugest-username">instagram</strong>
                                    </div>
                                    <button class="btn btn-primary btn-sm p-0 btn-ig ">Follow</button>
                                </div>
                                <div class="d-flex flex-row justify-content-between align-items-center mt-3 mb-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <div
                                            class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center border sugest-profile-photo">
                                            <img src="assets/images/profiles/profile-4.png" alt="..."
                                                style="transform: scale(1.5); width: 100%; position: absolute; left: 0;">
                                        </div>
                                        <strong class="ml-3 sugest-username">dccomics</strong>
                                    </div>
                                    <button class="btn btn-primary btn-sm p-0 btn-ig ">Follow</button>
                                </div>
                                <div class="d-flex flex-row justify-content-between align-items-center mt-3 mb-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <div
                                            class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center border sugest-profile-photo">
                                            <img src="assets/images/profiles/profile-5.jpg" alt="..."
                                                style="transform: scale(1.5); width: 100%; position: absolute; left: 0;">
                                        </div>
                                        <strong class="ml-3 sugest-username">thecw</strong>
                                    </div>
                                    <button class="btn btn-primary btn-sm p-0 btn-ig">Follow</button>
                                </div>
                            </div>
                                
                            End of right section suggestion user 
                        
                            
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- JS, Popper.js, and jQuery -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/main.js"></script> 
       
</body>

</html>
