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
					<img class="w-100" src="images/rules.jpg" alt="" /></br></br>
						<h5 class="card-title">School Rules and Regulations</h5>
							<p class="card-text">The school rules have been established in partnership with the community over a long period of time. They reflect the school community’s expectations in terms of acceptable standards of behaviour, dress and personal presentation in the widest sense. Students are expected to follow the school rules at all times when on the school grounds, representing the school, attending a school activity or when clearly associated with the school i.e. when wearing school uniform.</p>
							<h6 class="card-title">Students have the responsibility:</h6>
							<ul>							
								<li>To attend school regularly</li>
								<li>To respect the right of others to learn</li>
								<li>To respect their peers and teachers regardless of ethnicity, religion or gender</li>
								<li>To respect the property and equipment of the school and others</li>
								<li>To carry out reasonable instructions to the best of their ability</li>
								<li>To conduct themselves in a courteous and appropriate manner in school and in public</li>
								<li>To keep the school environment and the local community free from litter</li>
								<li>To observe the uniform code of the school</li>
								<li>To read all school notices and bring them to their parents’/guardians’ attention</li>
							</ul>	
							<p class="card-text">Students are representatives of our school from leaving home until they return and are thus expected to set themselves a high standard of behaviour both inside and outside the school.</p>	
							<h6 class="card-title">THE SCHOOL UNIFORM and GROOMING</h6>
							<p>should be worn tidily and correctly both at school and between home and school. The full school uniform must be worn at all times. Shirts are to be tucked in; socks are to be pulled up; heel straps in place. Where a situation arises concerning a student’s uniform, written requests for temporary wearing of non-regulation items must be referred to a Dean or Deputy Headmaster.</p>
							Students are to be clean-shaven at all times while representing the school.
							No visible jewellery is to be worn. Jewellery of religious or cultural significance may be worn but must be covered at all times.
							No piercings are allowed. In particular, clear plastic studs, or otherwise, used to maintain the piercing, are not allowed.
							<p>A student’s hair must be kept clean and tidy at all times. The length of the hair should not be shorter than a “number 2” razor cut. Hair should not be touching the shirt collar and should be off the face. The fringe when straightened /combed down must not hang in the eyes. The style of the hair should not be extreme including but not limited to mohawk, afro, shaved styles and/or patterns, hair tied up and braided. The colour must be the student’s own natural colour; no dye nor highlights are allowed.</p>
							<p>Make-up must not be worn. Students are not permitted to have visible tattoos.</p>
							<h6>The following are not to be brought on to the school grounds:</h6>
							<ul>							
								<li>Alcohol or drugs in any form</li>
								<li>Chemicals</li>
								<li>Cigarettes or tobacco</li>
								<li>Knives or other weapons, including BB guns</li>
								<li>Matches/lighters/explosive or dangerous material</li>
								<li>Pornographic or any other offensive material</li>
								<li>Cameras</li>
								<li>Skateboards or scooters or similar</li>
								<li>Expensive bicycles or bicycle accessories or other costly equipment</li>								
							</ul>	
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
						<h4>Useful Links</h4>
						<ul>
							<li><a href="rules.php">Rules and Regulations</a></li>
							<li><a href="">Club Activities</a></li>
							<li><a href="">The institution opened its door on the</a></li>
							<li><a href="">Under their superb guidance the tireless</a></li>
							<li><a href="">Chairman and the Vice-Chairman of the Governing Body</a></li>
						</ul>
					</div>				
				</div>	
			</div>
		</div>
		<?php include('footer.php'); ?>	
		
		
