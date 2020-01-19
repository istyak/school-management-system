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
		<title>Teachers | School Management System !</title>

	</head>
	<body>
	<?php include('../includes/add_course.php'); ?>	
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
						<li class="active_nav"><a href="course.php">Course</a></li>
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
		<div class="content container margin-top15">
			<div class="row">
				<div class="col-md-8">						
					<div class="single_content">
						<div class="student_table">							
							<?php
							$query = "SELECT * FROM course ORDER BY id ASC";
							$result = mysqli_query($con,$query);
							echo "<table class='table-responsive-lg table table-bordered table-hover'>
						  <thead>
							<tr>
							  <th>#</th>
							  <th>Couse Name</th>
							  <th>Class</th>
							  <th>Course Code</th>
							  <th>Teacher</th>
							</tr>
						  </thead><tbody>"; 
							while($row = mysqli_fetch_array($result)){ 
							echo 
							 "<tr><th>" . $row['id'] 
							."</th><td>". $row['course_name'] 
							."</td><td>". $row['class'] 
							."</td><td>" .$row['course_code']						
							."</td><td>" .$row['teacher']						
							."</td><tr>"; 
							}
							echo "</tbody></table>"; 							
						?>	
						</div>	
					</div>					
				</div>
				<div class="col-md-4">
					<div class="list-group">
						<p href="#" class="list-group-item list-group-item-action active">
							<b>	Course Menu</b> 
						</p>
						<a  data-toggle="modal" data-target=".modal_ad_cs" href="#" class="list-group-item list-group-item-action">Add a Course</a>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Total Course		
							<?php
								$result = mysqli_query($con,'SELECT count(id) AS value_sum FROM course'); 
								$row = mysqli_fetch_assoc($result); 
								$cs = $row['value_sum'];		
							 ?>										
							<span class="badge badge-primary badge-pill"><?php echo $cs; ?></span>
						</li>													
					</div>													
				</div>
			</div>
		</div>
		<?php include('footer.php'); ?>	
		
		
