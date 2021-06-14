<?php
require_once "./server/database.php";

define('REQUIRE_ERROR', 'THIS FIELD IS REQUIRED');

$error = [];
$username = $password = "";

function storeData($data)
{
	if(isset($data))
	{
		return $data;
	}
	else
	{
		return false;
	}
}

if($_SERVER['REQUEST_METHOD'] === "POST")
{
	if(isset($_POST['userLogin']))
	{
		$username = storeData($_POST['username']);
		$password = storeData($_POST['password']);

		if(!$username)
		{
			$error['username'] = REQUIRE_ERROR;
		}

		if(!$password)
		{
			$error['password'] = REQUIRE_ERROR;
		}

		if($username && $password)
		{
			$sql = "SELECT * FROM customer WHERE (Customer_Name = '$username' OR Customer_Email = '$username') AND Customer_Password = '$password'";
			$result = mysqli_query($conn, $sql);
			$rowCount = mysqli_num_rows($result);

			if($rowCount > 0) // one basically
			{
				header("location: ../user/main.php");
			}
			else
			{
				$sql = "SELECT * FROM customer WHERE Customer_Name = '$username;'";
				$result = mysqli_query($conn, $sql);
				$rowCount = mysqli_num_rows($result);

				if($rowCount > 0)
				{
					$error['password'] = "WRONG PASSWORD";
				}
				else
				{
					$error['username'] = "WRONG USERNAME";
				}
			}
		}
	}

	if(isset($_POST['adminLogin']))
	{
		$username = storeData($_POST['username']);
		$password = storeData($_POST['password']);

		if(!$username)
		{
			$error['username'] = REQUIRE_ERROR;
		}

		if(!$password)
		{
			$error['password'] = REQUIRE_ERROR;
		}

		if($username && $password)
		{
			$sql = "SELECT * FROM administrator WHERE Admin_Name = '$username' AND Admin_Password = '$password';";
			$result = mysqli_query($conn, $sql);
			$rowCount = mysqli_num_rows($result);

			if($rowCount > 0)
			{
				$row = mysqli_fetch_array($result);
				session_start();
				$_SESSION['id'] = $row['Admin_Id'];
				$_SESSION['admin_name'] = $row['Admin_Name'];
				header("location: ./admin/admin.php");
			}
			else
			{
				$sql = "SELECT * FROM administrator WHERE Admin_Name = '$username';";
				$result = mysqli_query($conn, $sql);
				$rowCount = mysqli_num_rows($result);

				if($rowCount > 0)
				{
					$error['password'] = "WRONG PASSWORD";
				}
				else
				{
					$error['username'] = "WRONG USERNAME";
				}
			}
		}
	}
}
?>