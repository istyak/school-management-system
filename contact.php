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
						<li><a href="info.php">Information</a></li>
						<li><a href="curricular.php">Co-Curricular</a></li>
						<li><a href="reasult.php">Result</a></li>
						<li><a href="notice.php">Notice</a></li>
						<li class="active_nav"><a href="contact.php">Contact Us</a></li>
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
						<form action="">
							 <div class="form-group">
								<label for="exampleInputEmail1">Name</label>
								<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
							 </div>
							  <div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
							 </div>
							  <div class="form-group">
								<label for="exampleInputEmail1">Description</label>
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
							 </div>
							 <button type="button" class="btn btn-secondary">Submit</button>
						</form>
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
		
		
