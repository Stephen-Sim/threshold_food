<?php
	require_once "./server/loginProcess.php";
?>

<!DOCTYPE html>
<html>
<head>
	<!-- CSS style -->
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<!--bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<!-- responsive meta tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Threshold | Login</title>
</head>
<body>

	<!-- header part -->
			<img src="./image/logo.png" style="height: 15%; width: 18%; margin-left: 40%;">


	
	<!-- login form page -->
	<div class="wrapper">
		<div class="registration_form">
			<div class="title">
				login your account
			</div>
			<form action="" method="post">
				<div class="form_wrap">
					<div class="input_group">
						<div class="input_wrap">
							<label>Username: </label>
							<input type="text" class="form-control <?php echo isset($error['username']) ? 'is-invalid' : '';?>" name="username" placeholder="Username/Email" value="<?php echo $username;?>">
							<div class="invalid-feedback">
								<?php echo $error['username'] ?? '';?>
							</div>
						</div>

						<div class="input_wrap">
							<label>Password: </label>
							<input type="Password" class="form-control <?php echo isset($error['password']) ? 'is-invalid' : '';?>" name="password">
							<div class="invalid-feedback">
								<?php echo $error['password'] ?? '';?>
							</div>
						</div>

						<input type="submit" name="userLogin" value="User Login"> 
						<input type="submit" name="adminLogin" value="Admin Login">

						<a href="./user/register.php" style="text-decoration: none;"> 
							<p style="text-align: center;clear: both;margin-top: 25px;color: black;text-decoration: underline;">Haven't have an account? Click me!</p>
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>