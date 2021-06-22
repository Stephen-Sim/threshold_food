<?php
require_once "../server/database.php";
require_once "./tranProcess.php";
require_once "./userLoginProcess.php";

$output = '';
$searchq='';
// to settle SEARCH BAR problem
unset($output);
//collect
	if (!empty($_POST['search']))
	{
		if(isset($_POST['search']))
		{
			$searchq = $_POST['search'];

			$query = mysqli_query($conn,"SELECT Product_Category FROM product WHERE Product_Name LIKE '%$searchq%'") or die ("Could not search");
			$count = mysqli_num_rows($query);
			if ($count ==0)
			{
				$output = 'No results';
			}
			else 
			{
				while($row=mysqli_fetch_array($query))
				{
					$product = $row['Product_Category'];
					$output = $searchq.' is in the category of '.$product;
				}
			}
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Threshold | Category</title>

	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   
    <!--Font Awesome CDN Link-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" type="text/css" href="../style/category_style.css">

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <!--Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
	<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>

	<style>
		/*for user log out button  & cannot work on external file*/
		.dropdown:hover .dropdown-menu{
			display:block;
		}
		.dropdown{
			list-style: none;
		}
	</style>
</head>


<body style="background-color: #ece5dd;">

	<!--logo-->
	<header> 
		<center>
			<a href="./main.php"><img src="../image/logo.png" id="up" style="height: 100px;"></a> 
		</center>
	</header>
		
	<!--navigation bar-->
	<nav class="navbar navbar-expand-lg navbar-light ">
		<div class="container-fluid" id="#navigate">
			<!--active when resize-->
		  	<a class="navbar-brand" href="category.php">Categories</a>

		  	<!--button appear when resize-->
   			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    		</button>

    		<!--navigation bar(menu)-->
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
				<!--towards right side-->
			    <div class="navbar-nav ms-auto">
					<!--search form-->
				    <form class="d-flex" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
				        <input class="form-control me-2" type="search" placeholder="Search Here" name="search" aria-label="Search">

				        <!--search button-->
				        <button class="btn btn-outline-dark searchBTN" type="submit" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				    </form>
					&nbsp;
					<!--user button-->
				    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				      	<li class="nav-item dropdown">
						    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>&nbsp&nbsp <?php echo $cus_name?></a>

						    <!--elements inside button-->
						    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						     <a class="dropdown-item" href="./history.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> History</a>
						     <a class="dropdown-item" href="../server/logoutProcess.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  Log Out</a>
						    </div>
						</li>
					</ul>
				</div> <!--end of right side div-->
			</div>	      
		</div> <!--end of navigation bar-->    
	</nav>

	<!-------- back to top button-------->
	<a href="#up"  id="navstick" class="go-up" title="Back to Top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</a>

	<!--alert message of buying successfully-->
	<?php if(isset($_SESSION['message'])):?>
	<div class="alert alert-success" role="alert">
		<?php
			echo $_SESSION['message'] . "<br>";
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif;?>

	<!--alert message for search result-->
	<?php if(isset($output)):?>
		<div class="alert alert-dark" role="alert">
	  <?php
		print("$output");
		unset($output);
	?>
	</div>
	<?php endif;?>
	
	<!--category 1-->
	<!--code in extracting data from database-->
	<?php
		$sql = "SELECT * FROM product WHERE Product_Category = 'Instant Noodle' ORDER BY Product_Name;";
		$result = mysqli_query($conn, $sql);

		$rowCount = mysqli_num_rows($result);

		if($rowCount > 0):
	?>
	<div class="section"><!--product displaying section-->
		<div class = "cards"> 
			
			<div class="container-fluid smallSection" id="instant_noodles">
				<h2>INSTANT NOODLES</h2><br>
			</div>
			

	<?php 
		while($row = mysqli_fetch_assoc($result)):
	?>
	<!--details of product-->
			<form action="" method="post">
		 		<input type="hidden" name="product_no" value="<?php echo $row['Product_No'];?>">
				<div class="card" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo $row['Product_Desc'];?>">
					<div class="image-section">
						<img src="../image/product_img/<?php echo $row['Product_No']?>.jpg" class="img-fluid" >
					</div>
					<div class="description">
						<h3><?php echo $row['Product_Name'];?></h3>
						<p>RM <?php echo $row['Product_Price'];?></p>
						<p class="max-qty">Stock left: <?php echo $row['Product_Quantity'];?></p>
				  		<div class="button-container">
				         	<?php
				         	if ($row['Product_Quantity'] == 0):?>
				         	<input type="text" name="qty" min="0" class="qty form-control" value="0" disabled />
				         	<div class="button-group">
								<input type="submit" class="order" name="purchase" value="Will be right back!" disabled>
							</div>
				         <?php else: ?>
							 <label >Quantity: &nbsp;</label>
				         		<input type="number" name="qty" min="1" class=" qty form-control" value="1" max="<?php echo $row['Product_Quantity']?>"/>
				         	<div class="button-group">
								<input type="submit" class="order" name="purchase" value="Purchase Now">
							</div>    
						<?php endif; ?>
				    	</div> <!--end of button-->
					</div> <!--end of description-->
				</div> <!--end of a card--> 
			</form>
	<?php endwhile;?>
		</div> <!--end of a category--> 
	<?php endif;?>
	
	<!--category 2-->
	<!--code in extracting data from database-->
	<?php
		$sql = "SELECT * FROM product WHERE Product_Category = 'Instant Hotpot' ORDER BY Product_Name;";
		$result = mysqli_query($conn, $sql);

		$rowCount = mysqli_num_rows($result);

		if($rowCount > 0):
	?>

		<div class = "cards">
			<div class="container-fluid smallSection" id="instant_hotpot">
				<h2>INSTANT HOTPOT</h2><br>
			</div>

	<?php 
		while($row = mysqli_fetch_assoc($result)):
	?>

	<!--details of product-->
			<form action="" method="post">
		 		<input type="hidden" name="product_no" value="<?php echo $row['Product_No'];?>">
				<div class="card" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo $row['Product_Desc'];?>">
					<div class="image-section">
						<img src="../image/product_img/<?php echo $row['Product_No']?>.jpg" class="img-fluid" >
					</div>
					<div class="description">
						<h3><?php echo $row['Product_Name'];?></h3>
						<p>RM <?php echo $row['Product_Price'];?></p>
						<p class="max-qty">Stock left: <?php echo $row['Product_Quantity'];?></p>
				  		<div class="button-container">
				         	<?php
				         	if ($row['Product_Quantity'] == 0):?>
				         	<input type="text" name="qty" min="0" class="qty form-control" value="0" disabled />
				         	<div class="button-group">
								<input type="submit" class="order" name="purchase" value="Will be right back!" disabled>
							</div>
				         <?php else: ?>
							 <label >Quantity: &nbsp;</label>
				         		<input type="number" name="qty" min="1" class=" qty form-control" value="1" max="<?php echo $row['Product_Quantity']?>"/>
				         	<div class="button-group">
								<input type="submit" class="order" name="purchase" value="Purchase Now">
							</div>    
						<?php endif; ?>
				    	</div> <!--end of button-->
					</div> <!--end of description-->
				</div> <!--end of a card--> 
			</form>
	<?php endwhile;?>
		</div> <!--end of a category--> 
	<?php endif;?>


	<!--category 3-->
	<?php
		$sql = "SELECT * FROM product WHERE Product_Category = 'Instant Rice' ORDER BY Product_Name;";
		$result = mysqli_query($conn, $sql);

		$rowCount = mysqli_num_rows($result);

		if($rowCount > 0):
	?>
		
		<div class = "cards">
			<div class="container-fluid smallSection" id="instant_rice">
				<h2>INSTANT RICE</h2><br>
			</div>

	<?php 
		while($row = mysqli_fetch_assoc($result)):
	?>
	<!--details of product-->
			<form action="" method="post">
		 		<input type="hidden" name="product_no" value="<?php echo $row['Product_No'];?>">
				<div class="card" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo $row['Product_Desc'];?>">
					<div class="image-section">
						<img src="../image/product_img/<?php echo $row['Product_No']?>.jpg" class="img-fluid" >
					</div>
					<div class="description">
						<h3><?php echo $row['Product_Name'];?></h3>
						<p>RM <?php echo $row['Product_Price'];?></p>
						<p class="max-qty">Stock left: <?php echo $row['Product_Quantity'];?></p>
				  		<div class="button-container">
				         	<?php
				         	if ($row['Product_Quantity'] == 0):?>
				         	<input type="text" name="qty" min="0" class="qty form-control" value="0" disabled />
				         	<div class="button-group">
								<input type="submit" class="order" name="purchase" value="Will be right back!" disabled>
							</div>
				         <?php else: ?>
							 <label >Quantity: &nbsp;</label>
				         		<input type="number" name="qty" min="1" class=" qty form-control" value="1" max="<?php echo $row['Product_Quantity']?>"/>
				         	<div class="button-group">
								<input type="submit" class="order" name="purchase" value="Purchase Now">
							</div>    
						<?php endif; ?>
				    	</div> <!--end of button-->
					</div> <!--end of description-->
				</div> <!--end of a card--> 
			</form>
	<?php endwhile;?>
		</div> <!--end of a category--> 
	<?php endif;?>


	<!--category 4-->
	<?php
		$sql = "SELECT * FROM product WHERE Product_Category = 'Drink' ORDER BY Product_Name;";
		$result = mysqli_query($conn, $sql);

		$rowCount = mysqli_num_rows($result);

		if($rowCount > 0):
	?>
		
		<div class = "cards">
			<div class="container-fluid smallSection" id="drinks">
				<h2>DRINKS</h2><br>
			</div>

	<?php 
		while($row = mysqli_fetch_assoc($result)):
	?>
	<!--details of product-->
			<form action="" method="post">
		 		<input type="hidden" name="product_no" value="<?php echo $row['Product_No'];?>">
				<div class="card" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo $row['Product_Desc'];?>">
					<div class="image-section">
						<img src="../image/product_img/<?php echo $row['Product_No']?>.jpg" class="img-fluid" >
					</div>
					<div class="description">
						<h3><?php echo $row['Product_Name'];?></h3>
						<p>RM <?php echo $row['Product_Price'];?></p>
						<p class="max-qty">Stock left: <?php echo $row['Product_Quantity'];?></p>
				  		<div class="button-container">
				         	<?php
				         	if ($row['Product_Quantity'] == 0):?>
				         	<input type="text" name="qty" min="0" class="qty form-control" value="0" disabled />
				         	<div class="button-group">
								<input type="submit" class="order" name="purchase" value="Will be right back!" disabled>
							</div>
				         <?php else: ?>
							 <label >Quantity: &nbsp;</label>
				         		<input type="number" name="qty" min="1" class=" qty form-control" value="1" max="<?php echo $row['Product_Quantity']?>"/>
				         	<div class="button-group">
								<input type="submit" class="order" name="purchase" value="Purchase Now">
							</div>    
						<?php endif; ?>
				    	</div> <!--end of button-->
					</div> <!--end of description-->
				</div> <!--end of a card--> 
			</form>
	<?php endwhile;?>
		</div> <!--end of a category--> 
	<?php endif;?>


	<!--category 5-->
	<?php
		$sql = "SELECT * FROM product WHERE Product_Category = 'Snack' ORDER BY Product_Name;";
		$result = mysqli_query($conn, $sql);

		$rowCount = mysqli_num_rows($result);

		if($rowCount > 0):
	?>
		
		<div class = "cards">
			<div class="container-fluid smallSection" id="snacks">
				<h2>SNACKS</h2><br>
			</div>

	<?php 
		while($row = mysqli_fetch_assoc($result)):
	?>
	<!--details of product-->
			<form action="" method="post">
		 		<input type="hidden" name="product_no" value="<?php echo $row['Product_No'];?>">
				<div class="card" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo $row['Product_Desc'];?>">
					<div class="image-section">
						<img src="../image/product_img/<?php echo $row['Product_No']?>.jpg" class="img-fluid" >
					</div>
					<div class="description">
						<h3><?php echo $row['Product_Name'];?></h3>
						<p>RM <?php echo $row['Product_Price'];?></p>
						<p class="max-qty">Stock left: <?php echo $row['Product_Quantity'];?></p>
				  		<div class="button-container">
				         	<?php
				         	if ($row['Product_Quantity'] == 0):?>
				         	<input type="text" name="qty" min="0" class="qty form-control" value="0" disabled />
				         	<div class="button-group">
								<input type="submit" class="order" name="purchase" value="Will be right back!" disabled>
							</div>
				         <?php else: ?>
							 <label >Quantity: &nbsp;</label>
				         		<input type="number" name="qty" min="1" class=" qty form-control" value="1" max="<?php echo $row['Product_Quantity']?>"/>
				         	<div class="button-group">
								<input type="submit" class="order" name="purchase" value="Purchase Now">
							</div>    
						<?php endif; ?>
				    	</div> <!--end of button-->
					</div> <!--end of description-->
				</div> <!--end of a card--> 
			</form>
	<?php endwhile;?>
		</div> <!--end of a category--> 
	<?php endif;?>
	
	</div> <!--end of product display-->
<br>

<!-- Footer -->

<div class="footer" >
	<div class="container">
		<div class="row">
				<!-- Display About Us -->
			<div class="col-md-4 footerBox col-sm-12" >
				<h5 class="footerTitle">About Us</h5>
				<p >Threshold food was founded in mid 2020 by a team of graduated youths.
Due to the current COVID-19 global pandemic situation, our team decided to make it easier for the citizens of our country to obtain food and drink supplies by offering delivery services right to their doorstep. Variety of food and drinks are available on the website, including imported food from different countries.
Feel free to check the products that are available on our website! </p>
			</div>
			<!-- Display Contact Us -->
			<div class="col-md-4 footerBox col-sm-12" >
				<h5 class="footerTitle">Contact Us</h5>
				<span><i class="fas fa-phone"></i> : 011-22223344</span>
				<br>
				<span><i class="far fa-envelope"></i> : askadmin@thresholdfood.com</span>
				<br>
				<span><i class="fas fa-clock"></i> : 8am - 5pm</span>
				<br>
				<div  class="location">
					<span style="font-size: 13px;">GPS: </span>
					<div style="max-width: 200px;height: auto;padding-top: 5px;">
		        		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.182694460068!2d101.61919861379069!3d3.0456730546317554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4b2878066b2d%3A0x2e9226b3915214c1!2sThreshold%20of%20Success!5e0!3m2!1sen!2smy!4v1623465212345!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		    		</div>
	    		</div>
			</div>
			<!-- Display Email Us -->
			<div class="col-md-4 footerBox col-sm-12" >
				<h5 class="footerTitle">Email Us</h5>
					<div>
						<form action="" method="get" >
							<div class="form-group">
								<label for="username">Name: </label>
							    <div class="col-sm-10">
									<input type="text" name="username"  placeholder="Username">
								</div>
							</div>
							<div class="form-group">							
								<label for="email" >Email: </label>
								<div class="col-sm-10">
									<input type="email" name="email" placeholder="Contact email">
								</div>
							</div>
							<div class="form-group">
								<label for="title" >Title: </label>
								<div class="col-sm-10">
									<input type="text" name="title"placeholder="Title content">
								</div>
							</div>
							<div class="form-group">
								<label for="content" >Content: </label>
								<div class="col-sm-10">
									<textarea name="textfield"  placeholder="Write down your thought..." ></textarea>
								</div>
							</div>
							<br>
							<div class="form-group" >
								<button type="submit" class="btn btn-light buttonClass ">Send</button>
							</div>
						</form>
					</div>
			</div>
		</div>
		
	</div>
	<br>
	<hr>
<p class="copyright" style="">@Copyright ThresholdFood</p>
	
</div>
</body>

	<!--------js for back to top button-------->
	<script type="text/javascript">
			
		/*-------- Get the button using id --------*/
		goup = document.getElementById("navstick");


		/*-------- set to show button when user scroll down 20px --------*/
		/* document.body.scrollTop ---- for safari */

		function scroll() {
		  if (document.documentElement.scrollTop > 20 || document.body.scrollTop > 20) {
		  	goup.style.display = "block";
		  } 
		  else {
		    goup.style.display = "none";
		  }
		}


		/*-------- show button when user start scroll down --------*/
		window.onscroll = function() {scroll()};

	</script>
</html>