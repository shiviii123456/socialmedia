<div class="row">
      <div class="col-md-2">
		<hr>
		<center><img class="pp" src="<?php echo $image; ?>" height="140" width="160"></center>
		<hr>
		<a class="btn btn-success" href="change_pic.php">Change Profile Picture</a>
      </div>
		<div class="col-md-5">
		
		</div>
      <div class="col-md-5">
			<form  id="upload_image"  class="form-horizontal" method="POST" enctype="multipart/form-data">
				<div class="control-group">
					<label class="control-label" for="input01">Image:</label>
					<div class="controls">
						<input type="file" name="image" class="font" required>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" name="submit" class="btn btn-success">Upload</button>
					</div>
				</div>
			</form>
	<?php
	if (isset($_POST['submit'])) {
 
		$image = $_FILES['image']['tmp_name'];    //sever pe file ka name
        $image_name = $_FILES['image']['name'];   //client machine ka name
        
		move_uploaded_file($_FILES["image"]["tmp_name"], "images/".$_FILES["image"]["name"]);
		$location = "images/".$_FILES["image"]["name"];
		$conn->query("update users set url = '$location' where user_id ='$session_id'");
	?>
	
      </div>