<?php
	session_start();
	require_once('config.php');
?>


<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/s1.css">
</head>
<body style="background-color:#bdc3c7">
     <div class="container">
 	<div class="row">
 		<div class="col-lg-12">
 			<div class="content">
 				
				<hr>
				<h2>Sign Up Form</h2>
 			</div>
 		</div>
 	</div>
 </div>
	<div id="main-wrapper">
	<center><h2>Sign Up Form</h2></center>
		<form action="register.php" method="post">
				<div class="inner_container">
				<input style="color:black;" type="text" placeholder="Enter Username" name="username" required><br><br>
				<input style="color:black;" type="password" placeholder="Enter Password" name="password" required><br><br>
				<input style="color:black;" type="password" placeholder="confirm Password" name="cpassword" required><br><br>
				<input style="color:black;" type="email" placeholder="Enter Email" name="email" required><br><br>
				<input style="color:black;" type="text" placeholder="Enter phonenumber" name="phonenumber" required><br><br>
				<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				
				<a href="index.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['register']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				@$email=$_POST['email'];
				@$phonenumber=$_POST['phonenumber'];
				if($password==$cpassword)
				{
					$query = "select * from userinfo where username='$username'";
				$query_run = mysqli_query($sun,$query);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into userinfo values('$username','$password','$email','$phonenumber')";
							$query_run = mysqli_query($sun,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered..please go back and Login")</script>';
							    
						    }						
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>