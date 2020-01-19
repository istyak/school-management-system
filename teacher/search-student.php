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
						<li class="active_nav"><a href="students.php">Students</a></li>
						<li><a href="attendance.php">Attendance</a></li>
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
						<form action="search-student.php" method="post">
							<input name="id_search" type="text" class="form-control st_search" placeholder="Enter Student id">					
							<button type="submit" class="float-right btn btn-secondary">Search Student</button>
						</form>
					</div>
					
					<div class="single_content">
						<div class="student_table">		
							<?php												
							$s_id = trim($_POST['id_search']);
							$s_id = strip_tags($s_id);
							$s_id = htmlspecialchars($s_id);
							if(empty($s_id)){							
								$teacher_name =  $userRow['name'];
								$query = "SELECT * FROM student,course where student.class=course.class and course.teacher='$teacher_name'";
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
								echo "
								<div style='z-index:9999999999999;position:fixed;bottom:20px;right:0' class='alert alert-danger alert-dismissible fade show' role='alert'>
								<strong>Please ! </strong> Enter Student id .
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
								</button>
								</div>	
								";							
							}
							else{
								$teacher_name =  $userRow['name'];
								$query = "SELECT * FROM student,course where student.class=course.class and course.teacher='$teacher_name' and student.student_id ='$s_id'";
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
							}
							?>						
						</div>
					</div>					
				</div>
				<div class="col-md-4">
					<div class="list-group">
						<p href="#" class="list-group-item list-group-item-action active">
							<b>Registered Course</b> 
						</p>						
						<select class='custom-select'>
							<?php								
								$query = "SELECT course_name FROM course where course.teacher='$teacher_name'";
								$result = mysqli_query($con,$query);
								while($row = mysqli_fetch_array($result)){ 
								echo 
								 "<option>" . $row['course_name'] . "</option>"; 							
								}
							 ?>	
						</select>							
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Total Students		
							<?php
								$result = mysqli_query($con,"SELECT count(student_id) AS value_sum FROM student,course where student.class=course.class and course.teacher='$teacher_name'"); 
								$row = mysqli_fetch_assoc($result); 
								$nt = $row['value_sum'];		
								mysqli_close($con);										
							 ?>										
							<span class="badge badge-primary badge-pill"><?php echo $nt; ?></span>
						</li>						
					</div>				
				</div>
			</div>
		</div>
		<?php include('footer.php'); ?>	
		
		
