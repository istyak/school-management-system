<?php
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

	$name ="";
	$feedback ="";	
    $id="";
	$date= date("Y-m-d");
	$error ="";
	$student_id=  $userRow['student_id'];
	 
if ( isset($_POST['add_feedback']) ) {
	
// clean user inputs to prevent sql injections  
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $feedback = trim($_POST['feedback']);
  $feedback = strip_tags($feedback);
  $feedback = htmlspecialchars($feedback);


  // Course Name
  if (empty($name)) {
	$error = true;
	$name_Error = "Please enter Name.";
   } 
  
  if (empty($feedback)) {
	$error = true;
	$feedback_name_Error = "Please enter Feedback.";
   } 

  
  // if there's no error, continue to signup
  if( !$error ) {
	 $query = "INSERT INTO feedback (name, student_id, description, date)
	VALUES ('$name', '$student_id' , '$feedback' , '$date');";
	
	
	
	if (mysqli_multi_query($con, $query)) {
		echo "
		<div style='z-index:9999999999999;position:fixed;bottom:20px;right:0' class='alert alert-success alert-dismissible fade show' role='alert'>
		<strong>Thanks For you Feedback !</strong> .
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>
		</div>	
		";

	$name ="";
	$feedback ="";
		
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
 $student_id = $userRow['student_id'];
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
		<style type="text/css">.single_content h4{font-size:40px !important}</style>
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
						<li><a href="profile.php">Profile</a></li>
						<li><a href="result.php">Results</a></li>
						<li><a href="attendence.php">Attendance</a></li>	
						<li><a href="payments.php">Payments</a></li>			
						<li class="active_nav"><a href="feedback.php">Feedbacks</a></li>
					</ul>
					<ul class="float-right login">
						<li><a href="../logout.php">Logout</a></li>
					</ul>
				</nav>		
			</div>				
		</header>		
		<div class="content container margin-top">
			<div class="row">
				<div class="col-md-8">						
					<div class="single_content">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
							 <div class="form-group">
								<label for="exampleInputEmail1">Name</label>
								<input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
							 </div>							 
							  <div class="form-group">
								<label for="exampleInputEmail1">Feedback</label>
								<textarea name="feedback" class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
							 </div>
							 <button type="submit" name="add_feedback" class="btn btn-secondary">Submit</button>
						</form>
					</div>					
				</div>
				<div class="col-md-4">
					<div class="list-group">
						<p href="#" class="list-group-item list-group-item-action active">
							<b>Feedback Menu</b> 
						</p>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Total Feedbacks		
							<?php
								$result = mysqli_query($con,"SELECT count(id) AS value_sum FROM feedback where student_id='$student_id'"); 
								$row = mysqli_fetch_assoc($result); 
								$nt = $row['value_sum'];		
							 ?>										
							<span class="badge badge-primary badge-pill"><?php echo $nt; ?></span>
						</li>										
					</div>									
				</div>
			</div>
		</div>
		<?php include('footer.php'); ?>	
		
		
