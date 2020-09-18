    <?php include 'connection.php' ?>
	<div class="row">
      <div class="col-md-2">
		<hr>

		<center><img class="pp" src="<?php echo $_SESSION['user_url']; ?>" height="140" width="160"></center>
		<hr>
		<a class="btn btn-success" href="change_pic.php">Change Profile Picture</a>
      </div>
		<div class="col-md-5">
			<hr>
			<p>Personal Info</p>
				<?php
			$query = $conn->query("select * from users where user_id = '$session_id'");
			$row = mysqli_fetch_assoc($query);
			$id = $row['user_id'];
			?>
			<hr>
			<p>Name:<?php echo $row['name']; ?><span class="margin-p">
			<hr>
			<p>Bio:<?php echo $row['bio']; ?><span class="margin-p">

		</div>
      <!-- <div class="col-md-5">
			<form method="post" action="post.php">
						<textarea name="content" placeholder="Share your Story Here"></textarea>
						<br>
						<hr>
						<button class="btn btn-success"><i class="icon-share"></i> Share </button>
			</form> -->
      </div>
    </div> 