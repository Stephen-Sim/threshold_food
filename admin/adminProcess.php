<?php
	require_once "../server/database.php";

	session_start();

	$id = 0; // default id

	$product_name = '';
	$product_price = '';
	$product_category = '';
	$product_quantity = '';

	$update = false;
	
	if(isset($_POST['save']))
	{
		$product_name = $_POST['name'];
		$product_price = $_POST['price'];
		$product_category = $_POST['category'];
		$product_quantity = $_POST['quantity'];

		$sql = "INSERT INTO product (Product_Name, Product_Price, Product_Category, Product_Quantity) VALUES ('$product_name', $product_price, '$product_category', $product_quantity)";

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
	}

	if(isset($_POST['update']))
	{
		$id = $_POST['id'];
		$product_name = $_POST['name'];
		$product_price = $_POST['price'];
		$product_category = $_POST['category'];
		$product_quantity = $_POST['quantity'];

		$sql = "UPDATE product SET Product_Name = '$product_name', Product_Price = $product_price, Product_Category = '$product_category', Product_Quantity = $product_quantity WHERE Product_No = $id;";

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
?>