<?php
require_once "../server/database.php";
$output = '';
$searchq='';
unset($output);
//collect
	if(isset($_POST['search'])){
			$searchq = $_POST['search'];

			$query = mysqli_query($conn,"SELECT Product_Category FROM product WHERE Product_Name LIKE '%$searchq%'") or die ("Could not search");
			$count = mysqli_num_rows($query);
			if ($count ==0){
				$output = 'No results';
			} else {
				while($row=mysqli_fetch_array($query)){
					$product = $row['Product_Category'];

					$output = $searchq.' is in the category of '.$product;
				}
			}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Threshold | Category</title>
	<link rel="stylesheet" type="text/css" href="../style/category_style.css">
	<!--font awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <!--Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</head>
<body style="background-color: #ece5dd;">

	<a href="main.php"><img src="../image/logo.png" style="height: 15%; width: 18%; margin-left: 41%;margin-right: 41%">
	</a>
		
	<nav class="navbar navbar-expand-lg navbar-light ">
		  <div class="container-fluid" id="#navigate">

		  	<a class="navbar-brand" href="category.php">Categories</a>
   			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    		</button>

		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
				      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
					      
					        <li class="nav-item">
					          <a class="nav-link" href="#instant_noodles">Instant Noodles</a>
					        </li>

					        <li class="nav-item">
					          <a class="nav-link" href="#instant_hotpot">Instant Hotpot</a>
					        </li>
					        <li class="nav-item">
					          <a class="nav-link" href="#instant_rice">Instant Rice</a>
					        </li>
					        <li class="nav-item">
					          <a class="nav-link" href="#drinks">Drinks</a>
					        </li>
					         <li class="nav-item">
					          <a class="nav-link" href="#snacks">Snacks</a>
					        </li>
				        
				      </ul>

				      <form class="d-flex" action="category.php" method="post" >
				        <input class="form-control me-2" type="search" placeholder="Search Here" name="search" aria-label="Search">

				        <button class="btn btn-outline-dark" type="submit" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				      </form>

		    </div>
		  </div>
	</nav>

	<?php if(isset($output)):?>
		<div class="alert alert-dark" role="alert">
	  <?php
		print("$output");
		unset($output);
	?>
	</div>
	<?php endif;?>
	
	
	<?php
		$sql = "SELECT * FROM product WHERE Product_Category = 'Instant Noodle' ORDER BY Product_Name;";
		$result = mysqli_query($conn, $sql);

		$rowCount = mysqli_num_rows($result);

		if($rowCount > 0):
	?>
	<div class="section">
		<!--category 1-->
		<div class = "cards">
			<div class="container-fluid smallSection" id="instant_noodles">
				<h2>INSTANT NOODLES</h2><br>
			</div>

			<!--product 1-->
	<?php 
		while($row = mysqli_fetch_assoc($result)):
	?>
			<div class="card">
				<div class="image-section">
					<img src="../image/product_img/<?php echo $row['Product_No']?>.jpg">
				</div>
				<div class="description">
					<h3><?php echo $row['Product_Name'];?></h3>
					<p>RM <?php echo $row['Product_Price'];?></p>
					<p>Stock left: <?php echo $row['Product_Quantity'];?></p>
					<button type="button" class="btn btn-outline-secondary"><i class="fa fa-plus" aria-hidden="true"></i></button>
					variable
					<button type="button" class="btn btn-outline-secondary"><i class="fa fa-minus" aria-hidden="true"></i></button><br><br> 
					<p>Details</p>
				</div>

				<div class="button-group">
					<a href="transaction.php" class="order">Buy Now</a>
				</div>
			</div>
	<?php endwhile;?>
		</div>
	<?php endif;?>
		<!--category 1-->

	<?php
		$sql = "SELECT * FROM product WHERE Product_Category = 'Instant Hotpot' ORDER BY Product_Name;";
		$result = mysqli_query($conn, $sql);

		$rowCount = mysqli_num_rows($result);

		if($rowCount > 0):
	?>
		<!--category 2-->
		<div class = "cards">
			<div class="container-fluid smallSection" id="instant_hotpot">
				<h2>INSTANT HOTPOT</h2><br>
			</div>

	<?php 
		while($row = mysqli_fetch_assoc($result)):
	?>
			<div class="card">
				<div class="image-section">
					<img src="../image/product_img/<?php echo $row['Product_No']?>.jpg">
				</div>
				<div class="description">
					<h3><?php echo $row['Product_Name'];?></h3>
					<p>RM <?php echo $row['Product_Price'];?></p>
					<p>Stock left: <?php echo $row['Product_Quantity'];?></p>
					<button type="button" class="btn btn-outline-secondary"><i class="fa fa-plus" aria-hidden="true"></i></button>
					variable
					<button type="button" class="btn btn-outline-secondary"><i class="fa fa-minus" aria-hidden="true"></i></button><br><br> 
					<p>Details</p>
				</div>

				<div class="button-group">
					<a href="transaction.php" class="order">Buy Now</a>
				</div>
			</div>
	<?php endwhile;?>
		</div>
	<?php endif;?>

	<?php
		$sql = "SELECT * FROM product WHERE Product_Category = 'Instant Rice' ORDER BY Product_Name;";
		$result = mysqli_query($conn, $sql);

		$rowCount = mysqli_num_rows($result);

		if($rowCount > 0):
	?>
		<!--category 2-->
		<div class = "cards">
			<div class="container-fluid smallSection" id="instant_rice">
				<h2>INSTANT RICE</h2><br>
			</div>

	<?php 
		while($row = mysqli_fetch_assoc($result)):
	?>
			<div class="card">
				<div class="image-section">
					<img src="../image/product_img/<?php echo $row['Product_No']?>.jpg">
				</div>
				<div class="description">
					<h3><?php echo $row['Product_Name'];?></h3>
					<p>RM <?php echo $row['Product_Price'];?></p>
					<p>Stock left: <?php echo $row['Product_Quantity'];?></p>
					<button type="button" class="btn btn-outline-secondary"><i class="fa fa-plus" aria-hidden="true"></i></button>
					variable
					<button type="button" class="btn btn-outline-secondary"><i class="fa fa-minus" aria-hidden="true"></i></button><br><br> 
					<p>Details</p>
				</div>

				<div class="button-group">
					<a href="transaction.php" class="order">Buy Now</a>
				</div>
			</div>
	<?php endwhile;?>
		</div>
	<?php endif;?>


	<?php
		$sql = "SELECT * FROM product WHERE Product_Category = 'Drink' ORDER BY Product_Name;";
		$result = mysqli_query($conn, $sql);

		$rowCount = mysqli_num_rows($result);

		if($rowCount > 0):
	?>
		<!--category 2-->
		<div class = "cards">
			<div class="container-fluid smallSection" id="drinks">
				<h2>DRINKS</h2><br>
			</div>

	<?php 
		while($row = mysqli_fetch_assoc($result)):
	?>
			<div class="card">
				<div class="image-section">
					<img src="../image/product_img/<?php echo $row['Product_No']?>.jpg">
				</div>
				<div class="description">
					<h3><?php echo $row['Product_Name'];?></h3>
					<p>RM <?php echo $row['Product_Price'];?></p>
					<p>Stock left: <?php echo $row['Product_Quantity'];?></p>
					<button type="button" class="btn btn-outline-secondary"><i class="fa fa-plus" aria-hidden="true"></i></button>
					variable
					<button type="button" class="btn btn-outline-secondary"><i class="fa fa-minus" aria-hidden="true"></i></button><br><br> 
					<p>Details</p>
				</div>

				<div class="button-group">
					<a href="transaction.php" class="order">Buy Now</a>
				</div>
			</div>
	<?php endwhile;?>
		</div>
	<?php endif;?>

	<?php
		$sql = "SELECT * FROM product WHERE Product_Category = 'Snack' ORDER BY Product_Name;";
		$result = mysqli_query($conn, $sql);

		$rowCount = mysqli_num_rows($result);

		if($rowCount > 0):
	?>
		<!--category 2-->
		<div class = "cards">
			<div class="container-fluid smallSection" id="snacks">
				<h2>SNACKS</h2><br>
			</div>

	<?php 
		while($row = mysqli_fetch_assoc($result)):
	?>
			<div class="card">
				<div class="image-section">
					<img src="../image/product_img/<?php echo $row['Product_No']?>.jpg">
				</div>
				<div class="description">
					<h3><?php echo $row['Product_Name'];?></h3>
					<p>RM <?php echo $row['Product_Price'];?></p>
					<p>Stock left: <?php echo $row['Product_Quantity'];?></p>
					<button type="button" class="btn btn-outline-secondary"><i class="fa fa-plus" aria-hidden="true"></i></button>
					variable
					<button type="button" class="btn btn-outline-secondary"><i class="fa fa-minus" aria-hidden="true"></i></button><br><br> 
					<p>Details</p>
				</div>

				<div class="button-group">
					<a href="transaction.php" class="order">Buy Now</a>
				</div>
			</div>
	<?php endwhile;?>
		</div>
	<?php endif;?>

	</div> <!--end of product display-->
</body>
</html>