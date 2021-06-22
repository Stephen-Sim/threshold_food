<?php
	session_start();
	if (!isset($_SESSION['customer_id']))
	{
		header("location: ../index.php");
	}

	$cus_id = $_SESSION['customer_id'];
	$cus_name = $_SESSION['username'];

?>