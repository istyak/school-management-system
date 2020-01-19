<?php
// Admin Panel
 ob_start();
 session_start();
 require_once '../dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['student'])!="" ) {
  header("Location: index.php");
  exit;
 }
 $error = false; 
 if( isset($_POST['login']) ) {   
  // prevent sql injections/ clear user invalid inputs
  $student_id = trim($_POST['student_id']);
  $student_id = strip_tags($student_id);
  $student_id = htmlspecialchars($student_id);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($student_id)){
   $error = true;
   $student_idError = "Please enter your Your id.";
  } 
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }  
  // if there's no error, continue to login
  if (!$error) {      
   $res=mysqli_query($con,"SELECT student_id,name,pass,phone FROM student WHERE student_id='$student_id'");
   $row=mysqli_fetch_array($res);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row   
   if( $count == 1 && $row['student_id']==$pass ) {
    $_SESSION['student'] = $row['student_id'];
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
		<title>School Management System !</title>

	</head>
	<body>
		<div class="content_area_login">       
			<div id="login-form">
				<div class="logo_login">
					  <a href="login.php"><img src="../images/fevicon.png" alt=""></a>
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
							<small style="#888888 !important;margin-bottom:5px !important" id="emailHelp" class="form-text text-muted">Login as Parents</small>
							<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
							<input type="text" name="student_id" class="form-control" placeholder="Student id" value="<?php $student_id; ?>" maxlength="40" />
							</div>
							<span class="text-danger"><?php $student_idError; ?></span>
						</div>
						<div class="form-group">
							<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							<input type="password" name="pass" class="form-control" placeholder="Password" maxlength="15" />
							</div>								
							<span class="text-danger"><?php $passError; ?></span>
						</div>                   
						<div class="form-group">
							<button type="submit" class="btn btn-block btn-secondary" name="login">Sign In</button>
						</div>						
						<div class="form-group">
							<a href="../index.php">Back to Homepage</a>
							Login as <a href="../teacher/login.php"> Teacher </a> ,
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