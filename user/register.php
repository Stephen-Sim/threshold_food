<?php
	require_once "./userProcess.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Threshold | Registration</title>
	<!--css style-->
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<!--bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	
</head>
<body>
	<?php if(isset($_SESSION['message'])):?>
	<div class="alert alert-success" role="alert">
		<?php
			echo $_SESSION['message'] . "<br>";
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif;?>
	<header>
		<img src="../image/logo_threshold.jpeg" id="logoHere">
		<div class=" Head">	
			<p class="mainTitle">Registration</p>
		</div>
		
	</header>
	<!--form-->
	<div class="wrapper">
		<div class="registration_form">
			<div class="title">
				create an account
			</div>
			<form action="./userProcess.php" method="post">
				<div class="form_wrap">
					<div class="input_group">

						<div class="input_wrap">
							<label>Username: </label>
								<input class="form-control <?php echo isset($error['username']) ? 'is-invalid' : '';?>" type="text" name="username" value="<?php echo $customer_name;?>">
								<div class="invalid-feedback">
									<?php echo $error['username'] ?? '';?>
								</div>
						</div>

						<div class="input_wrap">
							<label>Password: </label>
								<input class="form-control <?php echo isset($error['password']) ? 'is-invalid' : '';?>" type="password" name="password" value="<?php echo $customer_password;?>">
								<div class="invalid-feedback">
									<?php echo $error['password'] ?? '';?>
								</div>
						</div>

						<div class="input_wrap">
							<label>Confirm password: </label>
								<input class="form-control <?php echo isset($error['confirm_pass']) ? 'is-invalid' : '';?>" type="password" name="confirm_pass" value="<?php echo $customer_confirm;?>">
								<div class="invalid-feedback">
									<?php echo $error['confirm_pass'] ?? '';?>
								</div>
						</div>
						<div class="input_wrap">
							<label>Phone number: </label>
								<input class="form-control <?php echo isset($error['phoneNo']) ? 'is-invalid' : '';?>" type="tel" name="phoneNo" value="<?php echo $customer_phone;?>">
								<div class="invalid-feedback">
									<?php echo $error['phoneNo'] ?? '';?>
								</div>
						</div>
						<div class="input_wrap">
							<label>Email: </label>
								<input class="form-control <?php echo isset($error['email']) ? 'is-invalid' : '';?>" type="email" name="email" value="<?php echo $customer_email;?>">
								<div class="invalid-feedback">
									<?php echo $error['email'] ?? '';?>
								</div>
						</div>

						<input type="submit" name="create" value="Create my Profile" >
					</div>		
				</div>
			</form>
		</div>
	</div>







	<footer>
		<div id="marginFooter">
			<h5>Phone number: 011-22223344</h5>
		<h5>Email address: askadmin@thresholdfood.com</h5>
		<h5>GPS</h5>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.182694460068!2d101.61919861379069!3d3.0456730546317554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4b2878066b2d%3A0x2e9226b3915214c1!2sThreshold%20of%20Success!5e0!3m2!1sen!2smy!4v1623465212345!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		<h5>Operating hour: 8am - 5pm</h5>
		</div>
		
		<!--logo here-->
		</footer>
</body>
</html>