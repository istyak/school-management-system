<?php
 ob_start();
 session_start();
 require_once '../dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['student']) ) {
  header("Location: login.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($con,"SELECT * FROM student WHERE student_id=".$_SESSION['student']);
 $userRow=mysqli_fetch_array($res);
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
						<li class="active_nav"><a href="index.php">Dashboard</a></li>
						<li><a href="profile.php">Profile</a></li>
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
				<div class="col-md-12">
					<div class="single_content alert-dismissible alert" role="alert">
						<div class="card">
						  <div class="card-body">
								<h5>Welcome to our Parent/Student Portal</h5>
								<h6>On this portal you can find:</h6>
								<ul>
									<li>Student contact details - please request changes if incorrect</li>
									<li>School reports</li>
									<li>School fees (parent access only)</li>
									<li>Student timetables and attendance information</li>
									<li>Teachers’ names and contact information</li>
									<li>The Current NCEA Assessment calendar</li>
									<li>Other Important documents</li>
									<li>Links to our other online services</li>								
								</ul>
								<p>If you wish to add or check balances on your student's Printing, Canteen or Uniform shop accounts, please do this using My Monitor</p>
								<h6>Usernames and Passwords (Parent/Student Portal only)</h6>
								<ul>
									<li>Students: Log in with normal username and school initial password</li>
									<li>Caregivers: Username - same as student; Password - A password has been allocated to you. These are emailed.</li>
									<li>Forgotten or unknown password - Please click on the Lost Password link to request one be sent to you</li>
									<li>Please note: The Parent/Student Portal has a different username and password from My Monitor.</li>
								</ul>
								<p>To view a description of our online services, please see http://www.westlake.school.nz/curriculum/our-online-services/</p>
						  </div>
						</div>
					</div>										
				</div>				
			</div>
		</div>
		<?php include('footer.php'); ?>	
		
		
