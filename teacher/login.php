<?php
// Admin Panel
 ob_start();
 session_start();
 require_once '../dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['teacher'])!="" ) {
  header("Location: index.php");
  exit;
 }
 $error = false; 
 if( isset($_POST['login']) ) {   
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }  
  // if there's no error, continue to login
  if (!$error) {   
   $password = hash('sha256', $pass); // password hashing using SHA256  
   
   $res=mysqli_query($con,"SELECT teacher_id, name, Pass FROM teacher WHERE email='$email'");
   $row=mysqli_fetch_array($res);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row   
   if( $count == 1 && $row['Pass']==$password ) {
    $_SESSION['teacher'] = $row['teacher_id'];
    header("Location: index.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }}}
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
		<title>Login | School Management System !</title>

	</head>
	<body>
		<div class="content_area_login">       
			<div id="login-form">
				<div class="logo_login">
					  <img src="../images/fevicon.png" alt="">
				</div>	
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">					
					<div class="col-md-12">							
						<?php
						if ( isset($errMSG) ) {					
						?>
							<div class="form-group">
								<div class="alert alert-danger">
									<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
								</div>
							</div>
						<?php
							}
						?>						
						<div class="form-group">
							<small style="#888888 !important;margin-bottom:5px !important" id="emailHelp" class="form-text text-muted">Login as Teacher</small>
							<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
							<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php $email; ?>" maxlength="40" />
							</div>
							<span class="text-danger"><?php $emailError; ?></span>
						</div>
						<div class="form-group">
							<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
							</div>								
							<span class="text-danger"><?php $passError; ?></span>							
						</div>						
						<div class="form-group">
							<button type="submit" class="btn btn-block btn-secondary" name="login">Sign In</button>
						</div>						
						<div class="form-group">
							<a href="../index.php">Back to Homepage</a>
							Login as <a href="../student/login.php"> Parents </a> ,
							<a href="../admin/login.php"> Admin</a>
						</div>					
					</div>			   
				</form>
			</div>
		</div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.bundle.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/main.js"></script>
	</body>
</html>