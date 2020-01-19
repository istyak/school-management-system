<?php
 error_reporting(E_ALL ^ E_NOTICE);

	$name_Error ="";
	$student_id_Error ="";
	$month_Error ="";
	$year_Error ="";
	$money_Error ="";
	$error ="";

if ( isset($_POST['add_payment']) ) {
	
// clean user inputs to prevent sql injections  
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $student_id = trim($_POST['student_id']);
  $student_id = strip_tags($student_id);
  $student_id = htmlspecialchars($student_id);
  
  $month = trim($_POST['month']);
  $month = strip_tags($month);
  $month = htmlspecialchars($month);  
   
  $year = trim($_POST['year']);
  $year = strip_tags($year);
  $year = htmlspecialchars($year);
   
  $money = trim($_POST['money']);
  $money = strip_tags($money);
  $money = htmlspecialchars($money);

  $date = date("d-m-Y");

    // Name
  if (empty($name)) {
	$error = true;
	$name_Error = "Please enter Name.";
   } 

  // Student id
  if (empty($student_id)) {
	$error = true;
	$student_id_Error = "Please enter Student id.";
   } 

    // Date of Birth
  if (empty($month)) {
	$error = true;
	$month_Error = "Please enter Month.";
   } 

  // phone
  if (empty($year)) {
	$error = true;
	$year_Error = "Please enter Year.";
   } 

  // addreess
  if (empty($money)) {
	$error = true;
	$money_Error = "Please enter ammount of Money.";
   } 

  
  // if there's no error, continue to signup
  if( !$error ) {
	 $query = "INSERT INTO payments (name, student_id, month,year, money, date)
	VALUES ('$name', '$student_id', '$month','$year', '$money', '$date');";
	
	
	
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
		$month="";
		$year="";
		$money="";
		
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
							<h5 class="modal-title" id="exampleModalLabel">Payment Information</h5>
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
										<label for="recipient-name" class="col-form-label">Month
										</label>
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $month_Error; ?></small>			
										<select name="month" class="custom-select">
										  <option selected value="January">January</option>
										  <option value="February">February</option>
										  <option value="March">March</option>
										  <option value="April">April</option>
										  <option value="May">May</option>
										  <option value="June">June</option>
										  <option value="July">July</option>
										  <option value="August">August</option>
										  <option value="September">September</option>
										  <option value="October">October</option>
										  <option value="November">November</option>
										  <option value="December">December</option>
										</select>
									</div>	
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Year
										</label>										
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $year_Error; ?></small>
										<select name="year" class="custom-select">
										  <option selected value="2018">2018</option>
										  <option value="2019">2019</option>
										  <option value="2020">2020</option>
										  <option value="2021">2021</option>
										  <option value="2022">2022</option>
										  <option value="2023">2023</option>
										</select>
									</div>	
								 </div>

								 <div class="col-md-6">
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Student id
										</label>
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $student_id_Error; ?></small>			
										<input name="student_id" type="text" class="form-control" id="recipient-name" placeholder="Enter Student id" value="<?php echo $student_id ?>">
									</div>										
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Money
										</label>										
										<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $money_Error; ?></small>
										<input name="money" type="text" class="form-control" id="recipient-name" placeholder="Enter Ammount of Money" value="<?php echo $money ?>">
									</div>											
								 </div>								
								 </div>	
								 <div class="modal-footer">						
								 	<button name="add_payment" type="submit" class="btn btn-primary">Save changes</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>									
								</div>													 
							</form>
						</div>	
					</div>
				</div>
			</div>
		</div>
	  </div>			