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
	<?php include('../includes/add_teacher.php'); ?>	
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
						<li class="active_nav"><a href="teachers.php">Teachers</a></li>
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
		<div class="content container margin-top15">
			<div class="row">
				<div class="col-md-8">	
					<div class="search_students">
						<form action="search-teacher.php" method="post">
							<input name="id_search" type="text" class="form-control st_search" placeholder="Enter Teachers id">					
							<button type="submit" class="float-right btn btn-secondary">Search Teacher</button>
						</form>
					</div>
					
					<div class="single_content">
						<div class="student_table">							
							<?php
							$query = "SELECT * FROM teacher ORDER BY id ASC LIMIT 50";
							$result = mysqli_query($con,$query);
							echo "<table class='table-responsive-lg table table-bordered table-hover'>
						  <thead>
							<tr>
							  <th>#</th>
							  <th>Name</th>
							  <th>Teacher ID</th>
							  <th>Department</th>
							  <th>Phone</th>
							  <th> Edit</th>
							</tr>
						  </thead><tbody>"; 
							while($row = mysqli_fetch_array($result)){ 
							echo 
							 "<tr><th>" . $row['id'] 
							."</td><td>". $row['name'] 
							."</th><td>". $row['teacher_id'] 
							."</td><td>" .$row['dept']						
							."</td><td>" .$row['phone']						
							."<td><a style='text-align:center;display:block' href='profile.php?id=".$row['teacher_id']."'><img src='../images/edit_icon.png' alt=''></a></td>"							
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
							<b>Teachers Menu</b> 
						</p>
						<a  data-toggle="modal" data-target=".modal_ad_tc" href="#" class="list-group-item list-group-item-action">Add a Teacher</a>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Total Teachers		
							<?php
								$result = mysqli_query($con,'SELECT count(id) AS value_sum FROM teacher'); 
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
		
		
