<?php
require_once "../server/database.php";
require_once "./userLoginProcess.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Threshold | History</title>
	<!-- Responsive meta tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../style/history_style.css">

	<!-- CSS for datatable -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!--Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  	
	<!-- js for datatable -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />


		
		<!-- Datatable JS -->
		<script type="text/javascript">
			  $(document).ready(function() {
	   			 $('#example').DataTable();
				} );
			  $('#example').DataTable( {
    				responsive: true
				} );

		</script>

		<!-- javascript to confirm email sent -->
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
		<!-- CSS for hover -->
    <style type="text/css">
    	/*for user log out button  & cannot work on external file*/
		.dropdown:hover .dropdown-menu{
			display:block;
		}
		.dropdown{
			list-style: none;
		}

    </style>
</head>

<body style="background-color:#ECE5DD;font-size:15px;  overflow-x: hidden;">
	<!-- Header logo -->
	<header>
		<div >
			<a href="main.php"><img src="../image/logo.png" class="logoHere"></a>
		</div>
	</header>
	<!-- Nav Bar -->
	<nav class="navbar navbar-expand-lg navbar-light ">
		<div class="container-fluid" id="#navigate">

		  	<a class="navbar-brand" href="category.php">Categories</a>
   			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    		</button>

		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
				      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-right:30px;">
					      
					        <li class="nav-item">
					          <a class="nav-link" href="category.php#instant_noodles">Instant Noodles</a>
					        </li>

					        <li class="nav-item">
					          <a class="nav-link" href="category.php#instant_hotpot">Instant Hotpot</a>
					        </li>
					        <li class="nav-item">
					          <a class="nav-link" href="category.php#instant_rice">Instant Rice</a>
					        </li>
					        <li class="nav-item">
					          <a class="nav-link" href="category.php#drinks">Drinks</a>
					        </li>
					         <li class="nav-item">
					          <a class="nav-link" href="category.php#snacks">Snacks</a>
					        </li>
					        
				        
				      </ul>
				     
				      <ul class="navbar-nav mr-auto mb-2 mb-lg-0" >
				      	<li class="nav-item dropdown">
						    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>&nbsp&nbsp <?php echo $cus_name?></a>
						    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						    
						     <a class="dropdown-item" href="../server/logoutProcess.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  Log Out</a>
						    </div>
						</li>
					 </ul>
		    </div>   
		  
	</nav>

		
	
	<br>
	<h1 style="margin-bottom: 50px;">Transaction History</h1>
	<br>
	<br>

	<!-- Datatable -->
	<?php 
		$sql = "SELECT b.Transaction_Time, b.Product_No, p.Product_Name, b.Buy_Quantity, b.Total_Price FROM bill b  LEFT OUTER JOIN product p ON b.Product_No = p.Product_No WHERE Customer_Id = $cus_id;";
		$result = mysqli_query($conn, $sql);
	?> 	
	<div >
		<table  class="table table-hover table-striped dataTableBox" id="example" style="width:80%;margin-left: auto;
			 margin-right: auto;overflow-x: auto;">
			<thead>		
			  	<tr>
			  		<th scope="col"><i class='fa fa-calendar'></i> Transaction Time</th>
			  		<th scope="col"><i class="fa fa-image"></i> Picture of Item</th>
			  		<th scope="col"><i class="fa fa-cart-arrow-down"></i> Item Purchased</th>
			  		<th scope="col"> Amount of Item</th>
			  		<th scope="col"><i class="fa fa-money"></i> Amount Paid</th>
			  	</tr>
	  		</thead>
			<tbody>
			<?php
				while($row = mysqli_fetch_assoc($result)):
					
			?> 
			  	<tr>
				<?php
					$time = strtotime($row['Transaction_Time']);
					$time = date("Y-m-d h:i:sa", $time);
				?>
			  		<td scope="row"><?php echo $time;?></td>
			  		<td><img src="../image/product_img/<?php echo $row['Product_No'];?>.jpg" style="max-width: 200px;height: auto;margin-left: auto;margin-right: auto;"></td>
			  		<td><?php echo $row['Product_Name']?></td>
			  		<td><?php echo $row['Buy_Quantity']?></td>
			  		<td><?php echo $row['Total_Price']?></td>

			  	</tr>
			  <?php
			  	unset($time);
			  	endwhile;
			  ?>
	  		</tbody>
		</table>
	</div>
	<br>

	<!-- Back button -->

	<!-- Footer -->
<footer >
	<div class="container">
		<div class="row">
				<!-- Display About Us -->
			<div class="col-md-4 footerBox col-sm-12" >
				<h5 class="footerTitle">About Us</h5>
				<p >Threshold food was founded in mid 2020 by a team of graduated youths. <br> Due to the current COVID-19 global pandemic situation, our team decided to make it easier for the citizens of our country to obtain food and drink supplies by offering delivery services right to their doorstep. Variety of food and drinks are available on the website, including imported food from different countries. <br> Feel free to check the products that are available on our website! </p>
			</div>
			<!-- Display Contact Us -->
			<div class="col-md-4 footerBox2 col-sm-12" >
				<h5 class="footerTitle">Contact Us</h5>
		        <span><i class="fa fa-phone" aria-hidden="true"></i> : 011-22223344</span>
		        <br>
		        <span><i class="fa fa-envelope-o" aria-hidden="true"></i> : askadmin@thresholdfood.com</span>
		        <br>
		        <span><i class="fa fa-clock-o"></i> : 8am - 5pm</span>
		        <br>
				<div  class="location">
					<span class="GPSclass">GPS: </span>
					<div style="max-width: 200px;height: auto;">
		        		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.182694460068!2d101.61919861379069!3d3.0456730546317554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4b2878066b2d%3A0x2e9226b3915214c1!2sThreshold%20of%20Success!5e0!3m2!1sen!2smy!4v1623465212345!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		    		</div>
	    		</div>
			</div>
			<!-- Display Email Us -->
			<div class="col-md-4 footerBox2 col-sm-12" >
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
									<input type="email" name="email" placeholder="Contact email" >
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
						</form>
					</div>
			
			</div>
		</div>
		
	</div>
	<br>
	<hr>
<p class="copyright" >@Copyright ThresholdFood</p>
	
</footer>

</body>
</html>