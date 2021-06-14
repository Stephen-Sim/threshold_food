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
<body style="background-color: #ece5dd">
	<?php if(isset($_SESSION['message'])):?>
	<div class="alert alert-success" role="alert">
		<?php
			echo $_SESSION['message'] . "<br>";
			session_destroy();
		?>
	</div>
	<?php endif;?>
	<!-- header part -->
	<header>
			<img src="../image/logo.png" style="height: 15%; width: 18%; margin-left: 40%;">
	</header>
	
	<!--form-->

	<div class="wrapper">
		<div class="registration_form">
			<div class="title">
				create an account
			</div>
			<form action="" method="post">
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
						<input type="submit" name="login" value="Click to Login" >
					</div>		
				</div>
			</form>
		</div>
	</div>

<?php
	if($customer_name && $customer_password && $customer_confirm && $customer_phone && $customer_email)
	{
		$sql = "INSERT INTO customer (Customer_Name, Customer_Password, Customer_Phone, Customer_Email) VALUES ('$customer_name', '$customer_password', $customer_phone, '$customer_email');";

		$result = mysqli_query($conn, $sql);

		$_SESSION['message'] = "You have successfully registered!";
		header("location: register.php");
	}

?>

</body>
</html>