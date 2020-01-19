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
 $class =  $userRow['dept'];
 $teacher_name =  $userRow['name'];	
 
 
 
	$course_name_Error ="";
	$class_Error ="";
	$teacher_Error ="";
	$error ="";

if ( isset($_POST['attenxxdence']) ) {
	
// clean user inputs to prevent sql injections  
  $course_name = trim($_POST['attendance']);
  $course_name = strip_tags($course_name);
  $course_name = htmlspecialchars($course_name);
 
  
  // if there's no error, continue to signup
  if( !$error ) {
	 $query = "INSERT INTO attendance (student_id, month, attend)
	VALUES ('$course_name', '$course_name' , '$course_name');";
	
		
	if (mysqli_multi_query($con, $query)) {
		echo "
		<div style='z-index:9999999999999;position:fixed;bottom:20px;right:0' class='alert alert-success alert-dismissible fade show' role='alert'>
		<strong>Successfully Added!</strong> .
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>
		</div>	
		";		
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
							<select selected='$s_id'  style="max-width:185px;margin-right:5px" name="course_name" class="custom-select">
								<?php								
									$query = "SELECT course_name FROM course where course.teacher='$teacher_name'";
									$result = mysqli_query($con,$query);
									while($row = mysqli_fetch_array($result)){ 
									echo 
									 "<option>" . $row['course_name'] . "</option>"; 							
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
							<button type="submit" class="float-right btn btn-secondary">Search Student</button>
						
					
							<div class="single_content">
								<div class="student_table" style="margin-top:20px">		
									<?php												
									$s_id = trim($_POST['course_name']);
									$s_id = strip_tags($s_id);
									$s_id = htmlspecialchars($s_id);							
									$query = "SELECT * FROM student,course where student.class=course.class and course.teacher='$teacher_name' and course.course_name ='$s_id'";
									$result = mysqli_query($con,$query);
									echo "<table class='table-responsive-lg table table-bordered table-hover'>
								  <thead>
									<tr>
									  <th>Name</th>
									  <th>Student ID</th>
									  <th>Class</th>							  
									  <th>Course Name</th>
									  <th>Attendance</th>
									</tr>
								  </thead><tbody>"; 
									while($row = mysqli_fetch_array($result)){ 
									echo 
									 "</th><td>". $row['name'] 
									."</td><td>". $row['student_id'] 
									."</td><td>" .$row['class']											
									."</td><td>" .$row['course_name']	
									."</td><td><input type='text' name='attendance' class='form-control' style='width:80px' ></td><tr>"; 
									}
									echo "</tbody></table>"; 									
									
									?>						
								</div>
							</div>	
							<button name="attenxxdence" type="submit" class="float-right btn btn-secondary">Save Changes</button>
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
														
							<span class="badge badge-primary badge-pill"></span>
						</li>										
					</div>				
				</div>
			</div>
		</div>
		<?php include('footer.php'); ?>	
		
		
