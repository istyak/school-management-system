<?php
 error_reporting(E_ALL ^ E_NOTICE);

 ob_start();
 session_start();
 require_once '../dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['student']) ) {
  header("Location: ../login.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($con,"SELECT * FROM student WHERE student_id=".$_SESSION['student']);
 $userRow=mysqli_fetch_array($res);
 
 $usename=  $userRow['name']; 
 $student_id=  $userRow['student_id'];
 //$class=  $userRow['name'];
 
 $error = "";
  
 if ( isset($_POST['update_student']) ) {
	 
// clean user inputs to prevent sql injections  
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $dob = trim($_POST['dob']);
  $dob = strip_tags($dob);
  $dob = htmlspecialchars($dob);  
  
  $phone = trim($_POST['phone']);
  $phone = strip_tags($phone);
  $phone = htmlspecialchars($phone);
    
  $addreess = trim($_POST['addreess']);
  $addreess = strip_tags($addreess);
  $addreess = htmlspecialchars($addreess);


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
	 $query = "UPDATE  student SET name='$name' ,dob='$dob', phone='$phone' ,addreess='$addreess' WHERE student_id='$student_id'";	
	
	if (mysqli_multi_query($con, $query)) {
		echo "
		<div style='z-index:9999999999999;position:fixed;bottom:20px;right:0' class='alert alert-success alert-dismissible fade show' role='alert'>
		<strong>Successfully Updated!</strong> .
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>
		</div>	
		";	
	header("refresh: 3;");		
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
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="../images/fevicon.png" type="image/gif">


		<!-- Stylesheet -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../style.css">	
		<title>Dashboard | School Management System !</title>
		<style type="text/css">.single_content h4{font-size:40px !important}input#recipient-name{margin-bottom:15px}</style>
	</head>
	<body>
		<div class="container-full">		
		<header>
			<div class="logo container">
				<div class="row">
					<div class="col-md-6"><a href="index.php"><img src="../images/logo.png" alt="" /></a></div>
					<div class="col-md-6">
						<div class="social float-right">
							<a href=""><img src="../images/facebook.png" alt="" /></a>
							<a href=""><img src="../images/twitter.png" alt="" /></a>
							<a href=""><img src="../images/youtube.png" alt="" /></a>
							<a href=""><img src="../images/google-plus.png" alt="" /></a>
						</div>
					</div>
				</div>
			</div>
			<div class="navigation" id="myHeader">
				<nav class="container">				
					<ul>
						<li><a href="index.php">Dashboard</a></li>
						<li class="active_nav"><a href="profile.php">Profile</a></li>
						<li><a href="result.php">Results</a></li>	
						<li><a href="attendence.php">Attendance</a></li>
						<li><a href="payments.php">Payments</a></li>
						<li><a href="feedback.php">Feedbacks</a></li>
					</ul>
					<ul class="float-right login">
						<li><a href="../logout.php">Logout</a></li>
					</ul>
				</nav>		
			</div>				
		</header>		
		<div class="content container margin-top">
			<div class="row">
				<div class="col-md-3">	
					<div class="profile_pic">
						<img src="../images/circle.jpg" class="rounded" alt="..." width="200px">	
					</div>					
					<div class="form-group">
						<label for="recipient-name" class="st_nm col-form-label">Name : <?php echo  $usename ?></label><label for="recipient-name" class="st_nm col-form-label"> </label></br>
						<label for="recipient-name" class="st_nm col-form-label">ID : <?php echo  $student_id ?></label> <label for="recipient-name" class="st_nm col-form-label"> </label></br>
						<label for="recipient-name" class="st_nm col-form-label">Class : <?php echo $userRow['class']; ?></label> <label for="recipient-name" class="st_nm col-form-label"></label></br>
					</div>					
				</div>			
				<div class="col-md-9">	
					<form method="post" action="">	
						<div class="form-group">
							<label for="recipient-name" class="st_nm col-form-label">Student Info
							</label>
							<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $name_Error; ?></small>
							<small id="emailHelp" class="form-text text-muted">Name</small>
							<input name="name" type="text" class="form-control" id="recipient-name" value="<?php echo  $usename ?>">		
							
							<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $dob_Error; ?></small>
							<small id="emailHelp" class="form-text text-muted">Date of Birth</small>
							<input name="dob" type="text" class="form-control" id="recipient-name" value="<?php echo $userRow['dob']; ?>">							
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">More Info
							</label>
							
							<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $phone_Error; ?></small>
							<small id="emailHelp" class="form-text text-muted">Mobile No</small>
							<input name="phone" type="text" class="form-control" id="recipient-name" value="<?php echo $userRow['phone']; ?>">
							
							<small style="color:red !important" id="emailHelp" class="form-text text-muted"><?php echo $addreess_Error; ?></small>
							<small id="emailHelp" class="form-text text-muted">Address</small>
							<input name="addreess" type="text" class="form-control" id="recipient-name" value="<?php echo $userRow['addreess']; ?>">
						</div>
						<button name="update_student" type="submit" class="btn btn-primary">Save changes</button>
					</form>

					
				</div>						
			</div>
		</div>
		<?php include('footer.php'); ?>	
		
		
