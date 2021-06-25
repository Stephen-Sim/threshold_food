<?php 
	require_once "../server/database.php";
	require_once "./tranProcess.php";
	
	date_default_timezone_set("Asia/Kuala_Lumpur");

	$product_no = (int)$_SESSION['product_no'];
	$customer_id = (int)$_SESSION['customer_id'];
	$product_quantity = (int)$_SESSION['quantity'];
	$time = date('Y-m-d H:i:s');

	$sql = "SELECT * FROM customer JOIN product WHERE Product_No = $product_no AND Customer_Id = $customer_id;";
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_assoc($result);

	$totalPrice = number_format($product_quantity * $row['Product_Price'],2);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Threshold | Transaction</title>

	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!--Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	<!--mycss-->
	<link rel="stylesheet" type="text/css" href="../style/transaction_style.css"/>


</head>
<body>
	<header>
		<center>
			<a href="main.php"><img src="../image/logo.png" id="up"></a> <!--go to main page-->
		</center>
	</header>

	<nav class="sticky-top">
	    <div style="text-align: right;">
			<div class="nav_name">Hello, <?php echo $row['Customer_FullName']?></div> <!--display username-->    	
	    </div>
	</nav>


	<!-------- back to top button-------->
	<a href="#up"  id="navstick" class="go-up" title="Back to Top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</a>


	<!-------- Transaction Content -------->
	<div class="styleit">
		<center>
			<p class="table_name">RECEIPT</p>
		</center>
		<br />

		<form action="" method="post">	
			<div class="set_content">
				<input type="hidden" name="cus_id" value="<?php echo $row['Customer_Id']?>">
				<input type="hidden" name="pro_no" value="<?php echo $row['Product_No']?>">
				<input type="hidden" name="buy_qty" value="<?php echo $product_quantity?>">
				<input type="hidden" name="totalPrice" value="<?php echo $totalPrice?>">
				<input type="hidden" name="time" value="<?php echo $time?>">

				<table>
					<tr>
						<th colspan="3">Transaction Details</th>
					</tr>
					<tr>
						<td class="sub">Customer Name </td>
						<td>: </td>
						<!--TESTING-->
						<td><span><?php echo $row['Customer_FullName']?></span></td> <!--put cust name-->
					</tr>
					<tr>
						<td class="sub">Bill to </td>
						<td>: </td>
						<td><span>Threshold Food</span></td>
					</tr>
					<tr>
						<td class="sub">Transaction Time </td>
						<td>: </td>
						<td>
							<!--check again(time is wrong)-->
							<span><?php echo $time ?></span>
						</td>
					</tr>


					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>

					<tr>
						<th colspan="3">Description</th>
					</tr>
					<tr>
						<td class="sub">Item Image </td>
						<td>: </td>
						<td><span><img src="../image/product_img/<?php echo $row['Product_No']?>.jpg"><span></td>
					</tr>
					<tr>
						<td class="sub">Item Name </td>
						<td>: </td>
						<td><span><?php echo $row['Product_Name']?></span></td> <!--put itemname-->
					</tr>
					<tr>
						<td class="sub">Item Quantity </td>
						<td>: </td>
						<td><span><?php echo $product_quantity?></span></td> <!--put quantity-->
					</tr>


					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>


					<tr>
						<th  colspan="3">Amount</th>
					</tr>
					<tr>
						<td class="sub">Total (RM) </td>
						<td>:</td>
						<td><span><?php echo $totalPrice;?></span></td>
					</tr>
				</table>
			</div>
			<br />
			<br />
			<center>
				<hr style="width: 90%;" />
				<!-------- Confirm and cancel button -------->
				<div>
					<input type="submit" class="return" name="confirm" value="Confirm">
					<input type="submit" class="return" name="cancel" value="Cancel">
				</div>
			</center>

			<br />

		</form>
	</div>
	
	<br />

	<!-------- Footer -------->
	<footer >
		<div class="container">
			<div class="row">
					<!-- Display About Us -->
				<div class="col-md-4 footerBox col-sm-12" >
					<h5 class="footerTitle">About Us</h5>
					<p >Threshold food was founded in mid 2020 by a team of graduated youths. <br> Due to the current COVID-19 global pandemic situation, our team decided to make it easier for the citizens of our country to obtain food and drink supplies by offering delivery services right to their doorstep. Variety of food and drinks are available on the website, including imported food from different countries. <br> Feel free to check the products that are available on our website! </p>
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
						<span class="GPSclass">GPS: </span>
						<div style="max-width: 200px;height: auto;">
			        		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.182694460068!2d101.61919861379069!3d3.0456730546317554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4b2878066b2d%3A0x2e9226b3915214c1!2sThreshold%20of%20Success!5e0!3m2!1sen!2smy!4v1623465212345!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			    		</div>
		    		</div>
				</div>
				<!-- Display Email Us -->
				<div class="col-md-4 footerBox col-sm-12" >
					<h5 class="footerTitle">Email Us</h5>
						<div>
							<form action="" method="get" name="myForm" >
								<div class="form-group">
									<label for="username">Name: </label>
								    <div class="col-sm-10">
										<input type="text" name="username"  value="<?php echo $cus_name?>" readonly >
									</div>
								</div>
								<div class="form-group">							
									<label for="email" >Email: </label>
									<div class="col-sm-10">
										<input type="email" name="email" id="name" placeholder="Contact email" >
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
										<textarea name="content"  placeholder="Write down your thought..." ></textarea>
									</div>
								</div>
								<br>
								<div class="form-group" >
									<button type="button " class="btn btn-light buttonClass " onclick="validateForm();">Send</button>
								</div>

								<!-------- javascript to confirm email sent -------->
								<script type="text/javascript">

										function validateForm() {
											let y = document.forms["myForm"]["email"].value;
											if (y == "") {
												alert("Email must be filled out");
												return false;
											}

											let x = document.forms["myForm"]["content"].value;
												if (x == "") {
												alert("Content must be filled out");
												return false;
											} 
											else{
												var confirm="Thank you for submitting the feedback to us!";
												alert(confirm);

											}
										  
										}
								
								</script>

							</form>
						</div>
				
				</div>
			</div>
			
		</div>
		<br>
		<hr>
	<center><p class="copyright" >@Copyright ThresholdFood</p></center>
		
	</footer>

	


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

</body>
</html>

