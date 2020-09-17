<div id="masthead">  
				<div class="container">
					<?php include('heading.php'); ?>
				</div><!-- /cont -->
				<div class="container">
					<div class="row">
					<div class="col-md-12">
						<div class="top-spacer"> </div>
					</div>
					</div> 
				</div><!-- /cont -->
			</div>


            <p>Name:<?php echo $row['firstname']." ".$row['lastname']; ?><span class="margin-p"> </span>Gender:<?php echo $row['gender']; ?></p>
			<hr>
			<p>Address:<?php echo $row['address']; ?></p>