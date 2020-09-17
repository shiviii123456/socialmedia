<?php include('header.php'); ?>    
<?php include('session.php'); ?>    
    <body>
	<?php include('navbar.php'); ?>
    
    <div class="container">
					<div class="row">
					<div class="col-md-12">
						<div class="top-spacer"> </div>
					</div>
					</div> 
				</div>
  <?php

      
          include 'connection.php';
          $useremail = $_GET['email'];
        
          $n=0;
          $qp="SELECT * FROM posts WHERE user_email='$useremail'";
          $result = $conn->query($qp);

           if ($result->num_rows != 0) 
           {
 
             while($row = $result->fetch_assoc()) {
             $n=$n+1;
             }
            }
            $sql = "SELECT * FROM users WHERE user_email= '$useremail'";
            $resultt = $conn->query($sql);
            $row = $resultt->fetch_assoc();
            $q = $row['name'];
            $w = $row['user_name'];
            $r =$row['bio'];
            $s =$row['url'];

  ?>              
			
<div class="container">
  <div class="row">
    <div class="col-md-12"> 
      <div class="panel">
        <div class="panel-body">
          <!--/stories-->
          <div class="row">    
            <br>

    <div class="row">    
            <div class="col-md-2 text-center">
             <img  src="<?php echo $friend_image; ?>" style="width:100px;height:100px" class="img-circle"></a>
            </div>
				<div class="col-md-10">
					<div class="pull-right"><a href="delete_friend.php<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="icon-remove"></i>  Unfriend </a></div>
					<div class="alert"><?php echo $friend_name; ?></div>
				</div>
            </div>
			<hr>
			<br><br>
	<?php  ?>		
          </div>
          <hr>
        </div>
      </div>
                                                                                       
	                                                
                                                      
   	</div><!--/col-12-->
  </div>
</div>

        <div class="container">
            <div class="profile">
                <div class="profile-image">
                    <img src="$s" alt="About">
                </div>
                
                <div class="profile-user-settings">
                    <h1 class="profile-user-name"><?php echo  $q; ?></h1>
                
                                
                
                </div>
                <div class="profile-stats">

                    <ul>
                        <li><span class="profile-stat-count"><?php echo $n; ?></span> posts</li>
                        <li><span class="profile-stat-count">188</span> followers</li>
                        <li><span class="profile-stat-count">206</span> following</li>
                    </ul>
                </div>
                <div class="profile-bio">

                    <p>  <?php echo  $r; ?> </p>
                    
                </div>
            </div>
            <!-- End of profile section -->
        </div>
        
  
</body>
</html>                                                                                               
        
    </body>
    
</html>