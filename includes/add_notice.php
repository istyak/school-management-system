<?php
 error_reporting(E_ALL ^ E_NOTICE);

 $title_Error = "";
 $dept_Error = "";
 $notice_Error = "";
 
if ( isset($_POST['add_notice']) ) {

  // clean user inputs to prevent sql injections  
  $title = trim($_POST['title']);
  $title = strip_tags($title);
  $title = htmlspecialchars($title);

  $dept = trim($_POST['dept']);
  $dept = strip_tags($dept);
  $dept = htmlspecialchars($dept);
  
  $notice = trim($_POST['notice']);
  $notice = strip_tags($notice);
  $notice = htmlspecialchars($notice);  
  
  $date = date("Y-m-d");


  // Student id
  if (empty($title)) {
	$error = true;
	$title_Error = "Please enter title.";
   } 

    // Name
  if (empty($dept)) {
	$error = true;
	$dept_Error = "Please enter Class.";
   } 

    // Date of Birth
  if (empty($notice)) {
	$error = true;
	$notice_Error = "Please enter notice.";
   } 

  
  // if there's no error, continue to signup
  if( !$error ) {
	 $query = "INSERT INTO notice (title, dept, notice,date)
	VALUES ('$title', '$dept', '$notice','$date');";
	
	
	if (mysqli_multi_query($con, $query)) {
		echo "
		<div style='z-index:9999999999999;position:fixed;bottom:20px;right:0' class='alert alert-success alert-dismissible fade show' role='alert'>
		<strong>Successfully Added!</strong> .
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>
		</div>	
		";
		$title="";
		$dept="";
		$notice="";
		$date="";
	} else {
		echo "
		<div style='z-index:9999999999999;position:fixed;bottom:20px;right:0' class='alert alert-danger alert-dismissible fade show' role='alert'>
		<strong>Error!</strong> Try Again .
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>
		</div>	
		";
	}   
  } 
  else{
	echo "
	<div style='z-index:9999999999999;position:fixed;bottom:20px;right:0' class='alert alert-danger alert-dismissible fade show' role='alert'>
	<strong>Error!</strong> Try Again .
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		<span aria-hidden='true'>&times;</span>
	</button>
	</div>	
	";
  } 
 }
?>
	 <div class="modal_student_details">
	     <div id="modal_ad_notice" class="modal_ad_notice modal bd-example-modal-lg fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div id="modal_ad_notice" class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Notice Information</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						
						<div class="modal-body container">
							<form class="row" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
 								<div class="col-md-8">
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Title
										</label>
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $title_Error; ?></small>			
										<input name="title" type="text" class="form-control" id="recipient-name" placeholder="Enter Title" value="<?php echo $title ?>">
									</div>																	
								 </div>

								 <div class="col-md-4">
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Class
										</label>										
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $dept_Error; ?></small>
										<input name="dept" type="text" class="form-control" id="recipient-name" placeholder="Enter Class" value="<?php echo $dept ?>">
									</div>																			
								 </div>
								 <div class="form-group container">
									<label for="message-text" class="col-form-label">Notice</label>
									<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $notice_Error;	?></small>
									<textarea maxlength="250" rows="4"  name="notice" class="form-control" id="message-text" value=""></textarea>
								</div>		
								 </div>	
								 <div class="modal-footer">						
								 	<button name="add_notice" type="submit" class="btn btn-primary">Save changes</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>									
								</div>	
													 
							</form>
						</div>	

					</div>
				</div>
			</div>
		</div>
	  </div>			