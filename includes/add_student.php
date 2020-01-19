<?php
 error_reporting(E_ALL ^ E_NOTICE);

	$name_Error ="";
	$dob_Error ="";
	$student_id_Error ="";
	$course_id_Error ="";
	$phone_Error ="";
	$addreess_Error ="";
	$error ="";

if ( isset($_POST['add_student']) ) {

  // clean user inputs to prevent sql injections  
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $student_id = trim($_POST['student_id']);
  $student_id = strip_tags($student_id);
  $student_id = htmlspecialchars($student_id);
  
  $dob = trim($_POST['dob']);
  $dob = strip_tags($dob);
  $dob = htmlspecialchars($dob);  
  
  $class = trim($_POST['class']);
  $class = strip_tags($class);
  $class = htmlspecialchars($class);
  
  $phone = trim($_POST['phone']);
  $phone = strip_tags($phone);
  $phone = htmlspecialchars($phone);
  
  $addreess = trim($_POST['addreess']);
  $addreess = strip_tags($addreess);
  $addreess = htmlspecialchars($addreess);


  // Student id
  if (empty($student_id)) {
	$error = true;
	$student_id_Error = "Please enter student id.";
   }
   else{
	$query = "SELECT student_id FROM student WHERE student_id='$student_id'";
	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result);
	if($count!=0){
	$error = true;
	$student_id_Error = "Provided student id is already in use.";
	}
	
}  

    // Name
  if (empty($name)) {
	$error = true;
	$name_Error = "Please enter Name.";
   } 

    // Date of Birth
  if (empty($dob)) {
	$error = true;
	$dob_Error = "Please enter date of birth.";
   } 

   // Cource id
  if (empty($class)) {
	$error = true;
	$class_Error = "Please enter Class.";
   } 

  // phone
  if (empty($phone)) {
	$error = true;
	$phone_Error = "Please enter phone number.";
   } 

  // addreess
  if (empty($addreess)) {
	$error = true;
	$addreess_Error = "Please enter addreess.";
   } 

  
  // if there's no error, continue to signup
  if( !$error ) {
	 $query = "INSERT INTO student (name, student_id, dob,class, phone, addreess)
	VALUES ('$name', '$student_id', '$dob','$class', '$phone', '$addreess');";
	
	
	if (mysqli_multi_query($con, $query)) {
		echo "
		<div style='z-index:9999999999999;position:fixed;bottom:20px;right:0' class='alert alert-success alert-dismissible fade show' role='alert'>
		<strong>Successfully Added!</strong> .
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>
		</div>	
		";
		$name="";
		$student_id="";
		$dob="";
		$course_id="";
		$phone="";
		$addreess="";
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
	     <div id="modal_ad_st" class="modal modal_ad_student bd-example-modal-lg fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div id="modal_ad_student" class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						
						<div class="modal-body container">
							<form class="row" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
 								<div class="col-md-6">
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Name
										</label>
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $name_Error; ?></small>			
										<input name="name" type="text" class="form-control" id="recipient-name" placeholder="Enter Name" value="<?php echo $name ?>">
									</div>	
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Student Id
										</label>
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $student_id_Error; ?></small>			
										<input name="student_id" type="text" class="form-control" id="recipient-name" placeholder="Enter Student ID" value="<?php echo $student_id ?>">
									</div>	
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Class
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
								 </div>

								 <div class="col-md-6">
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Date of Birth
										</label>										
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $dob_Error; ?></small>
										<input name="dob" type="text" class="form-control" id="recipient-name" placeholder="Enter Date of Birth" value="<?php echo $dob ?>">
									</div>	
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Phone
										</label>										
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $phone_Error; ?></small>
										<input name="phone" type="text" class="form-control" id="recipient-name" placeholder="Enter Phone" value="<?php echo $phone ?>">
									</div>											
								 </div>
								 <div class="form-group container">
									<label for="message-text" class="col-form-label">Address</label>
									<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $addreess_Error;	?></small>
									<textarea maxlength="100" rows="4"  name="addreess" class="form-control" id="message-text" value=""></textarea>
								</div>		
								 </div>	
								 <div class="modal-footer">						
								 	<button name="add_student" type="submit" class="btn btn-primary">Save changes</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>									
								</div>	
													 
							</form>
						</div>	

					</div>
				</div>
			</div>
		</div>
	  </div>			