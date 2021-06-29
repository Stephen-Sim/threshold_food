<?php 
	//error_reporting(0);
	$dbHost = "localHost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "threshold_food";

	if(($conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName)) == false)
	{
		require_once "./server/resetDatabase.php";
	}

?>