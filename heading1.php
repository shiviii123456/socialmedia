
    <div class="row">
      <div class="col-md-2">
		<hr>
		<center><img class="pp" src="<?php echo $_SESSION['user_url'];?>" height="140" width="160"></center>
		<hr>
		<a class="btn btn-success" href="change_pic.php">Change Profile Picture</a>
      </div>
		<div class="col-md-10">
			<hr>
			<div class="pull-right"><a href="edit_profile.php" class="btn btn-info"><i class="icon-pencil"></i> Edit</a></div>
			<p>Personal Info
			
			</p>
				<?php
			$query = $conn->query("select * from users where user_id = '$session_id'");
			$row = mysqli_fetch_assoc($query);
			$id = $row['user_id'];
			?>
			<hr>
			<p>Name:<?php echo $row['name']; ?><span class="margin-p"> 
		
						<hr>
			<p>Contact No:<?php echo $row['phone']; ?></p>
				
						<hr>
				<p>Bio:<?php echo $row['bio']; ?></p>
			
		</div>

    </div> 