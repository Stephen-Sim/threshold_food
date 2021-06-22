<?php
	require_once "../server/database.php";

	session_start();

	$id = 0; // default id

	define('REQUIRE_ERROR', 'THIS FIELD IS REQUIRED');
	$error = [];

	$product_name = '';
	$product_price = '';
	$product_category = '';
	$product_quantity = '';
	$product_desc = '';

	$update = false;

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

	if(isset($_POST['back']))
		{
			header("location: admin.php");
		}
	
	if(isset($_POST['save']))
	{
		$product_name = storeData($_POST['name']);
		$product_price = storeData($_POST['price']);
		$product_category = storeData($_POST['category']);
		$product_quantity = storeData( $_POST['quantity']);
		$product_desc = storeData($_POST['desc']);
		
		if($_FILES['image']['error'] == 4)
		{
			$product_img = false;
		}
		else
		{
			$product_img = true;
		}

		if(!$product_name)
		{
			$error['name'] = REQUIRE_ERROR;
		}

		if(!$product_price)
		{
			$error['price'] = REQUIRE_ERROR;
		}

		if(!$product_category || $product_category == "")
		{
			$error['category'] = REQUIRE_ERROR;
		}

		if(!$product_quantity)
		{
			$error['quantity'] = REQUIRE_ERROR;
		}

		if(!$product_desc)
		{
			$error['desc'] = REQUIRE_ERROR;
		}

		if(!$product_img)
		{
			$error['image'] = REQUIRE_ERROR;
		}

		if($product_name && $product_price && $product_category && $product_quantity && $product_desc && $product_img)
		{
			$sql = "INSERT INTO product (Product_Name, Product_Price, Product_Category, Product_Quantity, Product_Desc) VALUES ('$product_name', $product_price, '$product_category', $product_quantity, '$product_desc');";

			if(mysqli_query($conn, $sql))
			{
				$row = mysqli_fetch_array(mysqli_query($conn, "SELECT Product_No From product WHERE Product_Name = '$product_name';"));

				$product_no = $row['Product_No'];

				if(isset($_FILES['image']))
				{
					move_uploaded_file($_FILES['image']['tmp_name'], "../image/product_img/$product_no.jpg");
				}

				$_SESSION['message'] = "Product Successfully Added";
				$_SESSION['message_type'] = "success";
				header("location: admin.php");
			}
		}

		// header("location: {$_SERVER['HTTP_REFERER']}");
		// exit;
	}

	if(isset($_GET['delete']))
	{
		$id = $_GET['delete'];
		$sql = "DELETE FROM product WHERE Product_No = $id";
		if(mysqli_query($conn, $sql))
		{
			$_SESSION['message'] = "Product Successfully Deleted";
			$_SESSION['message_type'] = "danger";
			header("location: admin.php");
		}
	}

	if(isset($_GET['update']))
	{
		$id = $_GET['update'];
		$sql = "SELECT * FROM product WHERE Product_No = $id";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);

		$update = true;

		$product_name = $row['Product_Name'];
		$product_price = $row['Product_Price'];
		$product_category = $row['Product_Category'];
		$product_quantity = $row['Product_Quantity'];
		$product_desc = $row['Product_Desc'];
	}

	if(isset($_POST['update']))
	{
		$id = $_POST['id'];
		$product_name = storeData($_POST['name']);
		$product_price = storeData($_POST['price']);
		$product_category = storeData($_POST['category']);
		$product_quantity = storeData($_POST['quantity']);
		$product_desc = storeData($_POST['desc']);

		if(!$product_name)
		{
			$error['name'] = REQUIRE_ERROR;
		}

		if(!$product_price)
		{
			$error['price'] = REQUIRE_ERROR;
		}

		if(!$product_category)
		{
			$error['category'] = REQUIRE_ERROR;
		}

		if(!$product_quantity)
		{
			$error['quantity'] = REQUIRE_ERROR;
		}

		if(!$product_desc)
		{
			$error['desc'] = REQUIRE_ERROR;
		}

		if($product_name && $product_price && $product_category && $product_quantity && $product_desc)
		{	
			$sql = "UPDATE product SET Product_Name = '$product_name', Product_Price = $product_price, Product_Category = '$product_category', Product_Quantity = $product_quantity, Product_Desc = '$product_desc' WHERE Product_No = $id;";

			if(mysqli_query($conn, $sql))
			{
				$_SESSION['message'] = "Product Successfully Updated";
				$_SESSION['message_type'] = "success";
				header("location: admin.php");
			}
			else {
				die("failed");
			}
		}

	}
?>