<?php
 error_reporting(E_ALL ^ E_NOTICE);

	$course_name_Error ="";
	$class_Error ="";
	$teacher_Error ="";
	$error ="";

if ( isset($_POST['add_course']) ) {
	
// clean user inputs to prevent sql injections  
  $course_name = trim($_POST['course_name']);
  $course_name = strip_tags($course_name);
  $course_name = htmlspecialchars($course_name);

  $class = trim($_POST['class']);
  $class = strip_tags($class);
  $class = htmlspecialchars($class);
 
  $teacher = trim($_POST['teacher']);
  $teacher = strip_tags($teacher);
  $teacher = htmlspecialchars($teacher);
 

  // Course Name
  if (empty($course_name)) {
	$error = true;
	$course_name_Error = "Please enter course name.";
   } 

  
  // if there's no error, continue to signup
  if( !$error ) {
	 $query = "INSERT INTO course (course_name, class, course_code , teacher)
	VALUES ('$course_name', '$class' , '$course_name$class', '$teacher');";
	
	
	
	if (mysqli_multi_query($con, $query)) {
		echo "
		<div style='z-index:9999999999999;position:fixed;bottom:20px;right:0' class='alert alert-success alert-dismissible fade show' role='alert'>
		<strong>Successfully Added!</strong> .
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>
		</div>	
		";
		$course_name="";
		$class="";
		
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
	<strong>Error!</strong> Try Again.
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		<span aria-hidden='true'>&times;</span>
	</button>
	</div>	
	";
  } 
 }
?>
	 <div class="modal_student_details">
	     <div id="modal_ad_cs" class="modal modal_ad_cs bd-example-modal-md fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div id="modal_ad_cs" class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Course Information</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>						
						<div class="modal-body container">
							<form class="row" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
 								<div class="col-md-12">
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Course Name
										</label>
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $course_name_Error; ?></small>			
										<input name="course_name" type="text" class="form-control" id="recipient-name" placeholder="Enter Course Name" value="<?php echo $course_name ?>">
									</div>										
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Select Class
										</label>
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $class_Error; ?></small>			
										<select name="class" class="custom-select">
										  <option value="1">One</option>
										  <option value="2">Two</option>
										  <option value="3">Three</option>
										  <option value="4">Four</option>
										  <option value="5">Five</option>
										</select>
									</div>	
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Select Teacher
										</label>
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $teacher_Error ; ?></small>			
										<select name="teacher" class="custom-select total_class" size="1">
											<?php
												$query = "SELECT * FROM teacher ORDER BY id ASC";
												$result = mysqli_query($con,$query);
												while($row = mysqli_fetch_array($result)){ 
												$name = $row['name'];
												echo 
												 "<option value='$name'>" . $row['name'] . "</option>"; 							
												}
											?>		
										</select>
									</div>	


						

									
								 </div>	
								 </div>	
								 <div class="modal-footer">						
								 	<button name="add_course" type="submit" class="btn btn-primary">Save changes</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>									
								</div>													 
							</form>
						</div>	
					</div>
				</div>
			</div>
		</div>
	  </div>			