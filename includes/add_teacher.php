<?php
 error_reporting(E_ALL ^ E_NOTICE);

	$name_Error ="";
	$dob_Error ="";
	$teacher_id_Error ="";
	$dept_Error ="";
	$phone_Error ="";
	$addreess_Error ="";
	$error ="";

if ( isset($_POST['add_teacher']) ) {
	
// clean user inputs to prevent sql injections  
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $teacher_id = trim($_POST['teacher_id']);
  $teacher_id = strip_tags($teacher_id);
  $teacher_id = htmlspecialchars($teacher_id);
  
  $dob = trim($_POST['dob']);
  $dob = strip_tags($dob);
  $dob = htmlspecialchars($dob);  
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);  
  
  $dept = trim($_POST['dept']);
  $dept = strip_tags($dept);
  $dept = htmlspecialchars($dept);
  
  $phone = trim($_POST['phone']);
  $phone = strip_tags($phone);
  $phone = htmlspecialchars($phone);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  $addreess = trim($_POST['addreess']);
  $addreess = strip_tags($addreess);
  $addreess = htmlspecialchars($addreess);

  
   // email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT email FROM teacher WHERE email='$email'";
   $result = mysqli_query($con, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }

  // Student id
  if (empty($teacher_id)) {
	$error = true;
	$teacher_id_Error = "Please enter teacher id.";
   } 

    // Name
  if (empty($name)) {
	$error = true;
	$name_Error = "Please enter Name.";
 }    
	else{
		$query = "SELECT name FROM teacher WHERE name='$name'";
		$result = mysqli_query($con, $query);
		$count = mysqli_num_rows($result);
		if($count!=0){
		$error = true;
		$name_Error = "Provided Name is already in use.";
		}
	}


    // Date of Birth
  if (empty($dob)) {
	$error = true;
	$dob_Error = "Please enter date of birth.";
   } 

   // Cource id
  if (empty($dept)) {
	$error = true;
	$dept_Error = "Please enter department.";
   } 
   
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }  

  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
    
   
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
	 $query = "INSERT INTO teacher (name, teacher_id, dob,dept, phone, addreess,pass,email)
	VALUES ('$name', '$teacher_id', '$dob','$dept', '$phone', '$addreess','$password','$email');";
	
	
	
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
		$teacher_id="";
		$dob="";
		$dept="";
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
	     <div id="modal_ad_tc" class="modal modal_ad_tc bd-example-modal-lg fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div id="modal_ad_tc" class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Teacher Information</h5>
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
										<label for="recipient-name" class="col-form-label">Teacher Id
										</label>
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $teacher_id_Error; ?></small>			
										<input name="teacher_id" type="text" class="form-control" id="recipient-name" placeholder="Enter Teacher ID" value="<?php echo $teacher_id ?>">
									</div>	
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Email
										</label>
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $emailError; ?></small>			
										<input name="email" type="text" class="form-control" id="recipient-name" placeholder="Enter Email id" value="<?php echo $email ?>">
									</div>	
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Department
										</label>
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $dept_Error; ?></small>			
										<select name="dept" class="custom-select">
										  <option value="CSE">CSE</option>
										  <option value="SWE">SWE</option>
										  <option value="ENGLISH">ENGLISH</option>
										  <option value="MATH">MATH</option>
										  <option value="PHYSICS">PHYSICS</option>
										  <option value="CHEMISTRY">CHEMISTRY</option>
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
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Password
										</label>										
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $passError; ?></small>
										<input name="pass" type="password" class="form-control" id="recipient-name" placeholder="Enter Password" value="<?php echo $pass ?>">
									</div>											
								 </div>
								 <div class="form-group container">
									<label for="message-text" class="col-form-label">Address</label>
									<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $addreess_Error;	?></small>
									<textarea maxlength="100" rows="4"  name="addreess" class="form-control" id="message-text" value=""></textarea>
								</div>		
								 </div>	
								 <div class="modal-footer">						
								 	<button name="add_teacher" type="submit" class="btn btn-primary">Save changes</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>									
								</div>													 
							</form>
						</div>	
					</div>
				</div>
			</div>
		</div>
	  </div>			