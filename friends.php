<?php include('header.php'); ?>    
<?php include('session.php'); ?>    
<body>
	<?php include('navbar.php'); ?>
			<div id="masthead">  
				<div class="container">
				
				</div><!-- /cont -->
				<div class="container">
					<div class="row">
					<div class="col-md-12">
						<div class="top-spacer"> </div>
					</div>
					</div> 
				</div><!-- /cont -->
			</div>
<div class="container">
  <div class="row">
    <div class="col-md-12"> 
      <div class="panel">
        <div class="panel-body">
          <!--/stories-->
          <div class="row">    
            <br>
				<?php
	$query = $conn->query("select users.user_id , users.name, users.url , friends.friends_id   from users ,friends
	where friends.my_friend_id = '$session_id' and users.user_id = friends.my_id
	OR friends.my_id = '$session_id' and users.user_id = friends.my_friend_id");
	while($row=mysqli_fetch_assoc($query)){
	$friend_name = $row['name'];
	$friend_image = $row['url'];
	$id = $row['friends_id'];
	?><div class="row">    
            <div class="col-md-2 text-center">
             <img  src="<?php echo $friend_image; ?>" style="width:100px;height:100px" class="img-circle"></a>
            </div>
				<div class="col-md-10">
					<div class="pull-right"><a href="deletefrnd.php<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="icon-remove"></i>  Unfriend </a></div>
					<div class="alert"><?php echo $friend_name; ?></div>
				</div>
            </div>
			<hr>
			<br><br>
	<?php } ?>		
          </div>
          <hr>
        </div>
      </div>
                                                                                       
	                                                
                                                      
   	</div><!--/col-12-->
  </div>
</div>
                                                                                                             

        
    </body>
</html>















