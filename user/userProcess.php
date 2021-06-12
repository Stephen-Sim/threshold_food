<?php
	require_once "../server/database.php";

	session_start();

	define('REQUIRE_ERROR', 'THIS FIELD IS REQUIRED');

	$error = [];

	$customer_name = "";
	$customer_password = "";
	$customer_confirm = "";
	$customer_phone = "";
	$customer_email = "";

	function storeData($data)
	{
		if(isset($data))
		{
			return htmlspecialchars(stripcslashes($data)); 
		}
		else
		{
			return false;
		}
	}

	if(isset($_POST['create']))
	{
		$customer_name = storeData($_POST['username']);
		$customer_password = storeData($_POST['password']);
		$customer_confirm = storeData($_POST['confirm_pass']);
		$customer_phone = storeData($_POST['phoneNo']);
		$customer_email = storeData($_POST['email']);


		if(!$customer_name)
		{
			$error['username'] = REQUIRE_ERROR;
		}

		if(!$customer_password)
		{
			$error['password'] = REQUIRE_ERROR;
		}

		if(!$customer_confirm)
		{
			$error['confirm_pass'] = REQUIRE_ERROR;
		}

		if($customer_password && $customer_confirm && ($customer_password != $customer_confirm))
		{
			$error['confirm_pass'] = "IT MUST MATCH THE PASSWORD";
			$customer_password = '';
			$customer_confirm = '';
		}

		if(!$customer_phone)
		{
			$error['phoneNo'] = REQUIRE_ERROR;
		}

		if(!$customer_email)
		{
			$error['email'] = REQUIRE_ERROR;
		}

		if($customer_name && $customer_password && $customer_confirm && $customer_phone && $customer_email)
		{
			$sql = "INSERT INTO customer (Customer_Name, Customer_Password, Customer_Phone, Customer_Email) VALUES ('$customer_name', '$customer_password', $customer_phone, '$customer_email');";

			$result = mysqli_query($conn, $sql);

			$_SESSION['message'] = "You have successfully registered!";
			header("location: register.php");
		}
	}
?>