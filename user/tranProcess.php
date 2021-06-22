<?php
require_once "./userLoginProcess.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if(isset($_POST['purchase']))
	{
		$_SESSION['quantity'] = $_POST['qty'];
		$_SESSION['product_no'] = $_POST['product_no'];
		header("location: ./transaction.php");
	}

	if(isset($_POST['confirm']))
	{
		$cus_id = $_POST['cus_id'];
		$pro_no = $_POST['pro_no'];
		$buy_qty = $_POST['buy_qty'];
		$totalPrice = $_POST['totalPrice'];
		$time = $_POST['time'];

		$sql = "INSERT INTO bill VALUES ($cus_id, $pro_no, $buy_qty, $totalPrice, '$time');";

		if(mysqli_query($conn, $sql))
		{
			$_SESSION['message'] = "Product Successfully Purchased";
			$sql = "SELECT Product_Quantity, Total_Sales FROM product WHERE Product_No = $pro_no;";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);

			$product_qty = $row["Product_Quantity"] - $buy_qty;
			$Total_Sales = $row['Total_Sales'] + $totalPrice;

			$sql = "UPDATE product SET Product_Quantity = $product_qty, Total_Sales = $Total_Sales WHERE Product_No = $pro_no;";

			if(mysqli_query($conn, $sql))
			{
				header("location: ./category.php#");
			}

		}
		else
		{
			die("failed");
		}

	}

	if(isset($_POST['cancel']))
	{
		header("location: ./category.php");
	}
}