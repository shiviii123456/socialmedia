$sql = "SELECT * from posts ORDER by post_id DESC limit 0,5";
     $qu = mysqli_query($conn,$sql);

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
   
      $content=$roww['caption'];
      $imgg = $roww['post_url'];
      $userid =$roww['user_id'];
      $sqll = "select * from users where user_id= '$userid'";
      $quu = mysqli_query($conn,$sqll);
      $rowww=mysqli_fetch_array($quu);
      $name =$rowww['user_name'];


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
          <span style='font-weight:bold; color: black; float:left;' >$name</span>
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
                               