<?php  
	session_start();
	include("connection.php");
	include("function.php");
	

	//$user_data = check_login($con);
	if(isset($_POST["signup"])){
	if($_SERVER['REQUEST_METHOD']== "POST"){
		//something was posted 
		$user_name=$_POST['user_name'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		$email=$_POST['email'];
		$phnno=$_POST['phnno'];
		
		if (empty($user_name)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($phnno)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }

		if(!empty($user_name)&& !empty($password)&& !is_numeric($user_name)){
			//save to db
			$user_id= rand(0,100000);
			$query = "insert into users (user_id, user_name,email,phnno, password) values ('$user_id','$user_name', '$email','$phnno','$password')";

			mysqli_query( $con,$query   );

			header("Location: login.php");
			die;
		}
		else{
			echo "Please enter some valid information!";
		}
	}}
	if(isset($_POST["signin"])){
	if($_SERVER['REQUEST_METHOD']== "POST"){
		//something was posted 
		$user_name=$_POST['user_name'];
		$password=$_POST['password'];

		if(!empty($user_name)&& !empty($password)&& !is_numeric($user_name)){
			//read db
			
			$query = "select * from users where user_name = '$user_name' limit 1";

			$result=mysqli_query( $con,$query   );

			
				if($result)
				{
					if($result && mysqli_num_rows($result)>0)
					{
						$user_data=mysqli_fetch_assoc($result);
						
						if($user_data['password']==$password){
							$_SESSION['user_id'] = $user_data['user_id'];
							$_SESSION['user_name']= $user_data['user_name'];
							header("Location: index.php");
							die;
						}
					}
				}

			echo "wrong password";
		}
		else{
			echo "Please enter some valid information!";
		}
	}}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/main.css" />
		<link rel="shortcut icon" href="images/icon.png"> 
		<title>JobDukaan</title>
	</head>
	<body>
	    <div class="container">
		    <div class="forms-container">
			    <div class="signin-signup">
				    <form action="#" method="POST" class="sign-in-form">
					<h3 class="title">Need a Job?</h3>
						
						<button type="submit" class="btn solid"><a style="text-decoration: none; color:#fff" href="home.php" >Get Started &nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a></button>

						<h2 class="title">Sign in</h2>
						<p>(Only for Employers)</p><br>
						<div class="input-field">
						    <i class="fas fa-user"></i>
							<input type="text" placeholder="Username" name="user_name"/>
						</div>
						<div class="input-field">
						    <i class="fas fa-lock"></i>
							<input type="password" placeholder="Password" name="password"/>
						</div>
						<input type="submit" name="signin" value="Login" class="btn solid" />
						
						
					</form>
					<form action="#" class="sign-up-form" method="POST">
					    <h2 class="title">Sign up</h2>
						<div class="input-field">
						    <i class="fas fa-user"></i>
							<input type="text" placeholder="Username" name="user_name"/>
						</div>
						<div class="input-field">
						    <i class="fas fa-envelope"></i>
							<input type="email" placeholder="Email" name="email"/>
						</div>
                        <div class="input-field">
						    <i class="fas fa-phone"></i>
							<input type="number" placeholder="phone number" name="phnno"/>
						</div>
						<div class="input-field">
						    <i class="fas fa-lock"></i>
							<input type="password" placeholder="Password" name="password"/>
						</div>
                        <div class="input-field">
						    <i class="fas fa-lock"></i>
							<input type="password" placeholder="Confirm Password" name="cpassword"/>
						</div>
						
						
						<input type="submit" value="signup" name="signup" class="btn solid" />
					</form>
				</div>
			</div>
			
			<div class="panels-container">
			    <div class="panel left-panel">
				    <div class="content">
                        <h3><img style="width: 30vh;" src="images/logo2.png"></h3>
					    <h3>New here?</h3>
						<p>Enter your personal details and start journey with us.</p>
						<button class="btn transparent" id="sign-up-btn">Sign up</button>
					</div>
					<img src="images\1.svg" class="image" alt="" />
				</div>
				<div class="panel right-panel">
				    <div class="content">
					    <h3><img style="width: 30vh;" src="images/logo2.png"></h3>
                        <h3>Already been here?</h3>
						<p>To keep connected with us please login with your personal info.</p>
						
						<button class="btn transparent" id="sign-in-btn">Sign in</button>
						
					</div>
					<img src="images\2.svg" class="image" alt="" />
				</div>
			</div>
		</div>
		
		<script src="js/script.js"></script>
	</body>
</html>