<?php require_once "./adminProcess.php";?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<!--fontawesome-->
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

	<style>
		body{
			background-color: #ECE5DD;
		}
		center{
			margin-bottom: 30px;
		}
		form{
			background: #D3D3D3; 
			width:550px;
			border-radius: 20px;
		}

		input[type="submit"]{
			margin-bottom: 10px;
			margin-left: 10px;
			position: relative;
			left: 120px;
			font-size: 18px;
		}

		input[type="submit"]:hover{
			background-color: white;
			color: black;
			transition: 0.5s;
		}

		label{
			float: left;
			font-size: 17px;
			font-family: 'Alegreya Sans SC', sans-serif;
			font-weight:  10;
		}

		#file{
			margin-left: 45px;
			margin-top: 15px;
		}

		.title{
			font-family: 'Alegreya Sans SC', sans-serif;
			font-size: 37px;
			font-weight: bold;
		}

		.col-sm-10{
			margin-top: 15px;
		}

		@media only screen and (max-width: 600px) {
      		form{
        		max-width: 90%;
      		}

      		input[type="submit"]{
      			position: relative: ;
      			left: 50px;
      			font-size: 15px;
      		}
    	}

    	@media only screen and (max-width: 572px) {
      		form{
        		max-width: 90%;
      		}

      		#file {
      			position: relative;
      			right: 40px;
      		}
    	}
    	 footer {
	      background-color: #D0C6BA;
	      text-align: center;
	      font-family: Tahoma;
	      float: bottom;
	      bottom: 0;
	      left: 0;
	      right: 0;
	      padding: 10px;
	     }


	</style>
	
	<title>Threshold | <?php echo $update == false ? "Add Product" : "Update Product";?>
	</title>
</head>
<body>
	<header>
			<img src="../image/logo.png" style="height: 15%; width: 18%; margin-left: 40%;">
	</header>
	<center>
		<form  style="" action="" method="post" enctype="multipart/form-data">
				<div class = "title">
				<?php echo $update == false ? "Add Product" : "Update Product";?>
				</div>
				<div class="container">
					<div>
						<input type="hidden" name="id" value="<?php echo $id;?>">

						<div class="col-sm-10">
							<label><i class="fas fa-shopping-cart"></i> Product Name : </label>
							<input type="text" name="name" class="form-control form-control-sm <?php echo isset($error['name']) ? 'is-invalid' : '';?>" value="<?php echo $product_name;?>" placeholder="">
							<div class="invalid-feedback">
								<?php echo $error['name'] ?? '';?>
							</div>
						</div>

						<div class="col-sm-10">
							<label><i class="fas fa-money-bill-alt"></i> Product Price : </label>
							<input type="text" name="price" class="form-control form-control-sm <?php echo isset($error['price']) ? 'is-invalid' : '';?>" value="<?php echo $product_price;?>"  placeholder="">
							<div class="invalid-feedback">
								<?php echo $error['price'] ?? '';?>
							</div>
						</div>

						<div class="col-sm-10">
							<label><i class="fas fa-shopping-basket"></i> Product Category : </label>	
							<select name ="category" class ="form-control form-control-sm <?php echo isset($error['category']) ? 'is-invalid' : '';?>">
							<?php
								if($product_category != ""):
							?>
								<option value ="<?php echo $product_category?>"><?php echo $product_category;?></option>
							<?php else:?>
								<option value="">Product Category</option>
							<?php
								endif;
							?>
								<option value ="Instant Noodle">Instant Noodle</option>
								<option value ="Instant Hotpot">Instant Hotpot</option>
								<option value ="Instant Rice">Instant Rice</option>
								<option value ="Snack">Snack</option>
								<option value ="Drink">Drink</option>
							</select>
							<div class="invalid-feedback">
								<?php echo $error['category'] ?? '';?>
							</div>
						</div>

						<div class="col-sm-10">
							<label><i class="fas fa-shopping-bag"></i> Product Quantity : </label>
							<input type="number" name="quantity" class="form-control form-control-sm <?php echo isset($error['quantity']) ? 'is-invalid' : '';?>" value="<?php echo $product_quantity;?>" placeholder="">
							<div class="invalid-feedback">
								<?php echo $error['quantity'] ?? '';?>
							</div>
						</div>

						<div class="col-sm-10">
							<label><i class="fas fa-list-alt"></i> Product Description : </label>
							<input type="text" name="desc" class="form-control form-control-sm <?php echo isset($error['desc']) ? 'is-invalid' : '';?>" value="<?php echo $product_desc;?>" placeholder="">
							<div class="invalid-feedback">
								<?php echo $error['desc'] ?? '';?>
							</div>
						</div>

						<?php if ($update == false):?>
							<label id="file"><i class="fas fa-file-image"></i> Select Image ： </label>
						    <input type="file" class="is-invalid" style="all:unset; padding-top:15px; padding-bottom: 15px;" name="image" value="upload image">
						    <div class="invalid-feedback">
								<?php echo $error['image'] ?? '';?>
							</div>
						<?php endif;?>

						<?php
						if($update == true):
						?>
							<input type="submit" class="btn btn-dark" name="update" value="UPDATE">
						<?php
						else:
						?>
							<input type="submit" class="btn btn-dark" name="save" value="SAVE">
						<?php endif;?>
							<input type="submit" class="btn btn-dark" name="back" value="BACK">
					</div>		
				</div>
			</form>
	</center>
	<footer><b>Copyright @Threshold Food</b></footer>
</body>
</html>