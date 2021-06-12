<?php
	require_once "../server/database.php";
	require_once "./process.php";	
?>

</body>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Page</title>
</head>
<body>
	<?php if(isset($_SESSION['message'])):?>
	<div>
		<?php
			echo $_SESSION['message'] . "<br>";
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif;?>

	<a href="./upd_and_add.php">add product</a>
	<a href="login.php">log out</a>

	<?php 
		$sql = "SELECT * FROM product;";
		$result = mysqli_query($conn, $sql);
	?>
	<div>
		<table>
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Prodcut Price</th>
					<th>Product Category</th>
					<th>Product Quantity</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
	<?php 
		while($row = mysqli_fetch_assoc($result)):
	?> 
		<tr>
			<td><?php echo $row['Product_Name']?></td>
			<td><?php echo $row['Product_Price']?></td>
			<td><?php echo $row['Product_Category']?></td>
			<td><?php echo $row['Product_Quantity']?></td>
			<td>
				<a href="upd_and_add.php?update=<?php echo $row['Product_No']?>">update</a>
				<a href="process.php?delete=<?php echo $row['Product_No']?>">delete</a>
			</td>
		</tr>
	<?php
		endwhile;
	?>
		</table>
	</div>
</body>
</html>