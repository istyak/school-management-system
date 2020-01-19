<?php
 ob_start();
 session_start();
 require_once '../dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: login.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($con,"SELECT * FROM admin WHERE adminId=".$_SESSION['user']);
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
						<li><a href="students.php">Students</a></li>
						<li><a href="teachers.php">Teachers</a></li>
						<li><a href="course.php">Course</a></li>
						<li><a href="payments.php">Payments</a></li>
						<li><a href="notice.php">Notices</a></li>
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
							<h5 class="card-title">Welcome to the Dashboard !</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.</p>
							<a href="#" class="btn btn-secondary">Need Help ?</a>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						  </div>
						</div>
					</div>	

					<div class="single_content">
						<div class="row">
						  <div class="col-sm-3">
							<div class="card">
							  <div class="card-body">
							  <?php
								$result = mysqli_query($con,'SELECT count(id) AS value_sum FROM student'); 
								$row = mysqli_fetch_assoc($result); 
								$st = $row['value_sum'];								
							  ?>
								<h5 class="card-title">Total Students</h5>
								<h4 class="card-title"><?php echo $st; ?></h4>
							  </div>
							</div>
						  </div>
						  <div class="col-sm-3">
							<div class="card">
							  <div class="card-body">
							  <?php
								$result = mysqli_query($con,'SELECT count(id) AS value_sum FROM teacher'); 
								$row = mysqli_fetch_assoc($result); 
								$tc = $row['value_sum'];								
							  ?>
								<h5 class="card-title">Total Teachers</h5>
								<h4 class="card-title"><?php echo $tc; ?></h4>
							  </div>
							</div>
						  </div>
						  <div class="col-sm-3">
							<div class="card">
							  <div class="card-body">
							  <?php
								$result = mysqli_query($con,'SELECT count(id) AS value_sum FROM notice'); 
								$row = mysqli_fetch_assoc($result); 
								$nt = $row['value_sum'];								
							  ?>
								<h5 class="card-title">Total Notices</h5>
								<h4 class="card-title"><?php echo $nt; ?></h4>
							  </div>
							</div>
						  </div>
						  <div class="col-sm-3">
							<div class="card">
							  <div class="card-body">
							  <?php
								$result = mysqli_query($con,'SELECT count(id) AS value_sum FROM feedback'); 
								$row = mysqli_fetch_assoc($result); 
								$fb = $row['value_sum'];								
							  ?>
								<h5 class="card-title">Total Feedbacks</h5>
								<h4 class="card-title"><?php echo $fb; ?></h4>
							  </div>
							</div>
						  </div>
						</div>
					</div>					
				</div>				
			</div>
		</div>
		<?php include('footer.php'); ?>	
		
		
