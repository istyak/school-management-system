<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="images/fevicon.png" type="image/gif">


		<!-- Stylesheet -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">	
		<title>School Management System !</title>

	</head>
	<body>
		<div class="container-full">		
		<header>
			<div class="logo container">
				<div class="row">
					<div class="col-md-6"><a href="index.php"><img src="images/logo.png" alt="" /></a></div>
					<div class="col-md-6">
						<div class="social float-right">
							<a href=""><img src="images/facebook.png" alt="" /></a>
							<a href=""><img src="images/twitter.png" alt="" /></a>
							<a href=""><img src="images/youtube.png" alt="" /></a>
							<a href=""><img src="images/google-plus.png" alt="" /></a>
						</div>
					</div>
				</div>
			</div>
			<div class="navigation" id="myHeader">
				<nav class="container">				
					<ul>
						<li><a href="index.php">Home</a></li>
						<li class="active_nav"><a href="info.php">Information</a></li>
						<li><a href="curricular.php">Co-Curricular</a></li>
						<li><a href="reasult.php">Result</a></li>
						<li><a href="notice.php">Notice</a></li>
						<li><a href="contact.php">Contact Us</a></li>
					</ul>
					<ul class="float-right login">
						<li><a href="student/login.php">Login</a></li>
					</ul>
				</nav>		
			</div>
				
		</header>
		<div class="content container margin-top">
			<div class="row">
				<div class="col-md-8">					
					<div class="single_content">
					<img class="w-100" src="images/demo.png" alt="" /></br></br>
						<h4>Information about our School !</h4>
						<p>Birshreshtha Noor Mohammad Public College at Peelkhana, Dhaka is one of the most reputed educational institutions in Dhaka Metropolitan City. This institution is uniquely housed in a lush green shadowy environment with enviably safe surroundings. As a tranquil citadel of learning the pulpit disseminates enlightenment following the dictates of advance teaching methods.The blossoming of all the potentials of a learner is the unflinching task of the institution. The institution opened its door on the 1st of August in 1977 in order to help build up the offsprings of the BGB personnel as genuinely educated future citizens. Functioning under the direct patronage of Bangladesh BGB</br> The institution is proud of getting the blessings of Director General and Deputy Director General of BGB as the Chairman and the Vice-Chairman of the Governing Body. Under their superb guidance the tireless toils of the teachers and staff here have already earned for the institution the name and fame at the national level.
						</p>
						<p>Birshreshtha Noor Mohammad Public College at Peelkhana, Dhaka is one of the most reputed educational institutions in Dhaka Metropolitan City. This institution is uniquely housed in a lush green shadowy environment with env order to help build up the offsprings of the BGB personnel as genuinely educated future citizens. Functioning under the direct patronage of Bangladesh BGB</br> The institution is proud of getting the blessings of Director General and Deputy Director General of BGB as the Chairman and the Vice-Chairman of the Governinal level.
						</p>
					</div>						
				</div>
				<div class="col-md-4">					
					<div class="single_sidebar">
						<?php
							$query = "SELECT * FROM notice ORDER BY id DESC LIMIT 1";
							$result = mysqli_query($con,$query);						
							while($row = mysqli_fetch_array($result)){ 
								echo "	
								<h4>Recent Notice</h4>
								<p>{$row['notice']}</p>";
							}
						?>	
					</div>		
					<div class="single_sidebar">
						<h4>News and Updates</h4>
						<ul>
							<li><a href="">Chairman and the Vice-Chairman of the Governing Body</a></li>
							<li><a href="">Under their superb guidance the tireless</a></li>
							<li><a href="">The institution opened its door on the</a></li>
							<li><a href="">Under their superb guidance the tireless</a></li>
							<li><a href="">Chairman and the Vice-Chairman of the Governing Body</a></li>
						</ul>
					</div>				
				</div>	
			</div>
		</div>
		<?php include('footer.php'); ?>	
		
		
