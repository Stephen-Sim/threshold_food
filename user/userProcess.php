<?php
	require_once "../server/database.php";

	session_start();
	if(isset($_POST['login']))
	{
		header("location: ../index.html");
	}

	define('REQUIRE_ERROR', 'THIS FIELD IS REQUIRED');

	$error = [];
	$customer_fname = "";
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


	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['create']))
		{
			$customer_fname = storeData($_POST['fullname']);
			$customer_name = storeData($_POST['username']);
			$customer_password = storeData($_POST['password']);
			$customer_confirm = storeData($_POST['confirm_pass']);
			$customer_phone = storeData($_POST['phoneNo']);
			$customer_email = storeData($_POST['email']);
			
			if (!$customer_fname)
			{
				$error['fullname'] = REQUIRE_ERROR;
			}

			if(!$customer_name)
			{
				$error['username'] = REQUIRE_ERROR;
			}
			elseif (strlen($customer_name) > 16 || strlen($customer_name) < 6)
			{
				$error['username'] = "MUST BE BETWEEN 6 AND 16 CHARACTERS";
				$customer_name = false;
			}
			elseif(strpos($customer_name, " "))
			{
				$error['username'] = "INVALID FORMAT: SPACING INCLUDED";
				$customer_name = false;
			}
			
			$sql = "SELECT customer_name FROM customer WHERE Customer_Name = '$customer_name';";
			$result = mysqli_query($conn, $sql);

			if($rowCount = mysqli_num_rows($result))
			{
				$error['username'] = "USERNAME IS TAKEN";
				$customer_name = false;
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
			elseif(!is_numeric($customer_phone))
			{
				$error['phoneNo'] = "INVALID PHONE NUMBER FORMAT";
				$customer_phone = false;
			}
			elseif($customer_phone > 9999999999)
			{
				$error['phoneNo'] = "PHONE NUMBER IS TOO LONG";	
			}

			if(!$customer_email)
			{
				$error['email'] = REQUIRE_ERROR;
			}
			elseif (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) 
			{
	  			$error['email'] = "INVALID EMAIL FORMAT";
	  			$customer_email = false;
			}

			$sql = "SELECT Customer_Email FROM customer WHERE Customer_Email = '$customer_email';";
			$result = mysqli_query($conn, $sql);

			if($rowCount = mysqli_num_rows($result))
			{
				$error['email'] = "EMAIL IS TAKEN";
				$customer_email = false;
			}
		}

		if(isset($_POST['login']))
		{
			header("location: ../index.php");
		}
	}
?>