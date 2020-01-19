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
 $usename=  $userRow['name'];
 $student_id =  $userRow['student_id'];
 //$class=  $userRow['name'];
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
						<li class="active_nav"><a href="payments.php">Payments</a></li>
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
				<div class="col-md-8">	
					<div class="single_content">
						<div class="student_table">							
							<?php
							$query = "SELECT * FROM payments where student_id='$student_id' LIMIT 20";
							$result = mysqli_query($con,$query);
							echo "<table class='table-responsive-lg table table-bordered table-hover'>
						  <thead>
							<tr>
							  <th>id</th>
							  <th>Name</th>							  
							  <th>Month</th>
							  <th>Year</th>
							  <th>Money</th>							 
							  <th>Date</th>							 
							</tr>
						  </thead><tbody>"; 
							while($row = mysqli_fetch_array($result)){ 
							echo 
							 "</tr><th>". $row['student_id'] 
						    ."</td><td>". $row['name'] 
							."</td><td>". $row['month'] 
							."</th><td>". $row['year'] 
							."</td><td>" .$row['money']							
							."</td><td>" .$row['date'];							
							}
							echo "</tbody></table>"; 							
						?>	
						</div>	
					</div>							
				</div>					
				<div class="col-md-4">	
					<div class="list-group">
						<p href="#" class="list-group-item list-group-item-action active">
							<b>Payments Menu</b> 
						</p>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Total Payments		
							<?php
								$class=  $userRow['class'];
								if($class=='1'){
									echo "<span class='badge badge-primary badge-pill'>100000</span>";									
								}			
								elseif($class=='2'){
									echo "<span class='badge badge-primary badge-pill'>150000</span>";			
								}
								elseif($class=='3'){
									echo "<span class='badge badge-primary badge-pill'>200000</span>";			
								}
								elseif($class=='4'){
									echo "<span class='badge badge-primary badge-pill'>250000</span>";			
								}
								elseif($class=='5'){
									echo "<span class='badge badge-primary badge-pill'>250000</span>";			
								}
								else{
									echo "<span class='badge badge-primary badge-pill'>Class Error</span>";		
								}
							 ?>										
							
						</li>	
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Total Paid		
							<?php
								$result = mysqli_query($con,"SELECT sum(money) AS value_sum FROM payments where student_id='$student_id'"); 
								$row = mysqli_fetch_assoc($result); 
								$nt = $row['value_sum'];		
							 ?>										
							<span class="badge badge-primary badge-pill"><?php echo $nt; ?></span>
						</li>	
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Total Payable		
							<?php
								if($class=='1'){
									$total = '100000';
									$ans = $total- $nt;									
								}	
								elseif($class=='2'){
									$total = '150000';
									$ans = $total- $nt;	
								}
								elseif($class=='3'){
									$total = '200000';
									$ans = $total- $nt;		
								}
								elseif($class=='4'){
									$total = '250000';
									$ans = $total- $nt;	
								}
								elseif($class=='5'){
									$total = '250000';
									$ans = $total- $nt;
								}
								else{									
									echo "<span class='badge badge-primary badge-pill'>Class Error</span>";		
									$ans = "";								
								}								
							 ?>										
							<span class="badge badge-primary badge-pill"><?php echo $ans; ?></span>
						</li>								
					</div>										
				</div>			
					
			</div>
		</div>
		<?php include('footer.php'); ?>	
		
		
