<?php
	session_start();
	require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/s1.css">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


</head>
<body style="background-img:#bdc3c7;">
      <div class="container">
 	<div class="row">
 		<div class="col-lg-12">
 			<div class="content">
 	
 				
				<hr>
				<h2>Login Form</h2>
 			</div>
 		</div>
 	</div>
 </div>
	<div id="main-wrapper">
		
		<form action="login.php" method="post">
		      	  <div class="imgcontainer">
				<img src="images/ml.png" alt="no img" class="avatar">
			</div>
			<div class="inner_container" style="color:black;">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="login_button" name="login" type="submit">Login</button>
				<a href="register.php"><button type="button" class="register_btn">Register</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['login']))
			{    
		       
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$query = "select * from userinfo where username='$username' and password='$password' ";
				$query_run = mysqli_query($sun,$query);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					header( "Location: index1.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
			
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>