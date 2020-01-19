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
		<title>Feedbacks | School Management System !</title>

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
						<li><a href="students.php">Students</a></li>
						<li><a href="teachers.php">Teachers</a></li>
						<li><a href="course.php">Course</a></li>
						<li><a href="payments.php">Payments</a></li>
						<li><a href="notice.php">Notices</a></li>
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
				<div class="col-md-12">
					<div class="single_content">
						<div class="row">
							<div class="col-md-8">
								<?php
								$query = "SELECT * FROM feedback ORDER BY id DESC LIMIT 10";
								$result = mysqli_query($con,$query);						
								while($row = mysqli_fetch_array($result)){ 
									echo "	
									<div class='single_notice'>
										<div class='card'>
										  <div class='card-body'>
											<h5 class='card-title'>{$row['name']} - {$row['student_id']}</h5>
											<p class='card-text'>{$row['description']}</p>
											<small class='form-text text-muted'>Posted on: {$row['date']}</small>
										  </div>
										</div>
									</div>";
								}
								?>	
							</div>
							<div class="col-md-4">
								<div class="list-group">
									<p href="#" class="list-group-item list-group-item-action active">
										<b>More Menu</b> 
									</p>
									<li class="list-group-item d-flex justify-content-between align-items-center">
										Total Feedbacks
									<?php
										$result = mysqli_query($con,'SELECT count(id) AS value_sum FROM feedback'); 
										$row = mysqli_fetch_assoc($result); 
										$fb = $row['value_sum'];								
									 ?>										
										<span class="badge badge-primary badge-pill"><?php echo $fb; ?></span>
									</li>						
								</div>
							</div>
						</div>
					</div>					
					<div class="single_content">
						
					</div>				
				</div>				
			</div>
		</div>
		<?php include('footer.php'); ?>	
		
		
