<?php
 ob_start();
 session_start();
 require_once '../dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['teacher']) ) {
  header("Location: login.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($con,"SELECT * FROM teacher WHERE teacher_id=".$_SESSION['teacher']);
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
		<title>Attendance | School Management System !</title>
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
						<li><a href="students.php">Students</a></li>
						<li class="active_nav"><a href="attendance.php">Attendance</a></li>
						<li><a href="marks.php">Marks</a></li>
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
					<div class="search_students">
						<form action="search-course.php" method="post">
							<select  style="max-width:185px;margin-right:5px" name="course_name" class="custom-select">
								<?php	
									$teacher_name =  $userRow['name'];
									$query = "SELECT course_name FROM course where course.teacher='$teacher_name'";
									$result = mysqli_query($con,$query);
									while($row = mysqli_fetch_array($result)){ 
									$coursename= $row['course_name'];
									echo 
									 "<option value='$coursename'>" . $row['course_name'] . "</option>"; 							
									}
								 ?>	
							</select>	
							<select  style="max-width:185px;margin-right:5px" name="month" class="custom-select">
								 <option value="January">January</option>
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
							<select  style="max-width:185px" name="year" class="custom-select">
								 <option value="2018">2018</option>
								  <option value="2019">2019</option>
								  <option value="2020">2020</option>
								  <option value="2021">2021</option>
								  <option value="2022">2022</option>
								  <option value="2023">2023</option>
								  <option value="2024">2024</option>
							</select>										
							<button type="submit" class="float-right btn btn-secondary">Show Students</button>
						</form>
					</div>
					
					<div class="single_content">
						<div class="student_table">							
							<?php
							$teacher_name =  $userRow['name'];
							$query = "SELECT * FROM student,course where student.class=course.class and course.teacher='$teacher_name' ORDER BY course_name DESC";
							$result = mysqli_query($con,$query);
							echo "<table class='table-responsive-lg table table-bordered table-hover'>
						  <thead>
							<tr>
							  <th>Name</th>
							  <th>Student ID</th>
							  <th>Class</th>
							  <th>Phone</th>
							  <th>Course Name</th>
							</tr>
						  </thead><tbody>"; 
							while($row = mysqli_fetch_array($result)){ 
							echo 
							 "</th><td>". $row['name'] 
							."</td><td>". $row['student_id'] 
							."</td><td>" .$row['class']						
							."</td><td>" .$row['phone']						
							."</td><td>" .$row['course_name']						
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
							<b>Feedback Menu</b> 
						</p>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Total Feedbacks		
														
							<span class="badge badge-primary badge-pill"></span>
						</li>										
					</div>					
				</div>							
			</div>
		</div>
		<?php include('footer.php'); ?>	
		
		
