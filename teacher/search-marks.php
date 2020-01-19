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
 
  $error='';
  $teacher_name =  $userRow['name'];	
  
  $s_id = trim($_POST['course_name']);
  $s_id = strip_tags($s_id);
  $s_id = htmlspecialchars($s_id);
 
  if ( isset($_POST['add_marks']) ) {
 
  $student_id = trim($_POST['student_id']);
  $student_id = strip_tags($student_id);
  $student_id = htmlspecialchars($student_id);

  $quiz = trim($_POST['quiz']);
  $quiz = strip_tags($quiz);
  $quiz = htmlspecialchars($quiz);
 
  $mid = trim($_POST['mid']);
  $mid = strip_tags($mid);
  $mid = htmlspecialchars($mid);	 
 
  $final = trim($_POST['final']);
  $final = strip_tags($final);
  $final = htmlspecialchars($final);
	
  $date = date("d-m-Y");
  
 if (empty($s_id)) {
	$error = true;
	$quizError = "Please enter your Quiz.";
   } else{
		// check email exist or not
	   $query = "SELECT course_name FROM marks WHERE course_name='$_POST[course_name]' and student_id='$_POST[student_id]'";
	   $result = mysqli_query($con,$query);
	   $count = mysqli_num_rows($result);
	   if($count!=0){
		$error = true;
	   }
	   
   }  

    if( !$error ) {
  // if there's no error, continue to do things 
	 $query = "INSERT INTO marks (student_id, quiz,mid_term, final, date,course_name)
	VALUES ('$_POST[student_id]', '$quiz','$mid', '$final', '$date', '$_POST[course_name]');";
	
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
		<strong>Mysql Error!</strong> Try Again .
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>
		</div>	
		";
	} 
	} 
  else{
	echo "<div style='z-index:9999999999999;position:fixed;bottom:20px;right:0' class='alert alert-success alert-dismissible fade show' role='alert'>
		<strong>Error !</strong> Duplicate Course Name and id Found.
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
						<li><a href="attendance.php">Attendance</a></li>
						<li class="active_nav"><a href="marks.php">Marks</a></li>
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
						<form action="search-marks.php" method="post">
							<select style="max-width:585px;margin-right:5px" name="course_name" class="custom-select" value="<?php echo $course ?>">
								<?php								
									$query = "SELECT course_name FROM course where course.teacher='$teacher_name'";
									$result = mysqli_query($con,$query);
									while($row = mysqli_fetch_array($result)){ 
									echo 
									 "<option>" . $row['course_name'] . "</option>"; 							
									}
								 ?>	
							</select>											
							<button type="submit" class="float-right btn btn-secondary">Search Student</button>
						</form>		 
					
							<div class="single_content">
								<div class="student_table" style="margin-top:20px">		
									<?php																
									$query = "SELECT * FROM student,course where student.class=course.class and course.teacher='$teacher_name' and course.course_name ='$s_id'";
									$result = mysqli_query($con,$query);
									echo "<table class='table-responsive-lg table table-bordered table-hover'>
								  <thead>
									<tr>
									  <th>Name</th>
									  <th>Student id</th>
									  <th>Course</th>							  
									  <th>Quiz</th>							  
									  <th>Mid</th>
									  <th>Final</th>
									  <th>Save</th>
									</tr>
								  </thead><tbody>"; 
									while($row = mysqli_fetch_array($result)){ 		
									echo "<form action='search-marks.php' method='post'>";
									echo 
									 "<tr>
										<td><input disabled name='name' style='width:85px' class='form-control' type='text' value='". $row['name'] ."' /></td>									
										<td><input  name='student_id'  style='width:85px'  class='form-control' type='text' value='". $row['student_id'] ."' /></td>
										<td><input  name='course_name' class='form-control'  style='width:85px' type='text' value='". $row['course_name'] ."' /></td>
										<td><input name='quiz' type='text' class='form-control'></td>
										<td><input name='mid' type='text' class='form-control'></td>
										<td><input name='final' type='text' class='form-control'></td>
										<td><button name='add_marks' type='submit' class='btn btn-secondary'>Save</button></td>
									</tr></form>"; 
									}
									echo "</tbody></table>"; 									
									
									?>						
								</div>
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
		
		
