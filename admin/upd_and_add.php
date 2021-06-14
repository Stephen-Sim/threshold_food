<?php require_once "./adminProcess.php";?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update and Add Product</title>
</head>
<body>
	<form action="adminProcess.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<div>
			<label>Product Name : </label>
			<input type="text" name="name" value="<?php echo $product_name;?>" placeholder="">
		</div>

		<div>
			<label>Product Price : </label>
			<input type="text" name="price" value="<?php echo $product_price;?>"  placeholder="">
		</div>

		<div>	
			<label>Product Category : </label>
			<input type="radio" name="category" value="instant noodle">
			<label>instant noodle</label>
			<input type="radio" name="category" value="instant hotpot">
			<label>instant hotpot</label>
			<input type="radio" name="category" value="intstant rice">
			<label>instant rice</label>
			<input type="radio" name="category" value="snack">
			<label>snack</label>
			<input type="radio" name="category" value="drink">
			<label>drink</label>
		</div>

		<div>
			<label>Product Quantity : </label>
			<input type="number" name="quantity" value="<?php echo $product_quantity;?>" placeholder="">
		</div>

		<?php if ($update == false):?>
		<div>
			<label>Upload Image : </label>
			<input type="file" name="image" value="">
		</div>
		<?php endif;?>

		<div>
			<?php
			if($update == true):
			?>
				<button type="submit" name="update">Update</button>
			<?php
			else:
			?>
				<button type="submit" name="save">Save</button>
			<?php endif;?>
		</div>
	</form>
</body>
</html>