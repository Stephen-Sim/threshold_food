<?php
	require_once "../server/database.php";
	require_once "./adminProcess.php";

	if(!isset($_SESSION['id']))
	{
		header("location: ../index.php");
	}
?>

</body>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Page</title>
	<link rel="icon" href="../image/logo.png">
	<link rel="stylesheet" type="text/css" href="../style/style.css">

	<!--font awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<style>

		/* -------- hearder -------- */
		center img{
			max-width:50%;
			height:auto;
		}


		/*-------- for table --------*/
		td img{
			width: 50%;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: center;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #c0c0c0;
		}


		/*-------- Product list --------*/
		b{
			font-size: 200%;
			margin: 3%;
		}


		/*-------- navigation bar --------*/
		.nav_style{
			position: sticky;
			padding: 2%;
			background-color:#807E7D;
		}

		.dropbtn {
		  background-color: black;
		  color: white;
		  padding: 16px;
		  font-size: 16px;
		  border: none;
		}

		.dropdown {
		  position: relative;
		  display: inline-block;	  
		}

		.dropdown-content {
			font-size: 90%;			  
			display: none;
			position: absolute;
			background-color: #f1f1f1;
			width: 115%;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}

		.dropdown-content a {
		  color: black;
		  padding: 12px 16px;
		  text-decoration: none;
		  display: block;
		}

		.dropdown-content a:hover {
			background-color: white;
		}

		.dropdown:hover .dropdown-content {
			display: block;
		}

		.dropdown:hover .dropbtn {
			background-color: grey;
		}



		/*responsive for width = 238 and below*/
		@media screen and (max-width: 238px) {
			*{
				font-size: 88%;
			}

  			td img{
  				width: 50%;
  			}

  			td img:hover{
  				width: 100%;
  			}

  			b{
				font-size: 100%;
				margin: 3%;
			}

  			.dropbtn{
  				font-size: 90%;
  				padding: 10px;
  			}

  			.dropdown-content{
  				width: 100%;
  			}
		}


		/*responsive for width = 480 and below*/
		@media screen and (max-width: 400px) and (min-width: 239px) {
			*{
				font-size: 88%;
			}

  			td img{
  				width: 50%;
  			}

  			td img:hover{
  				width: 100%;
  			}

  			b{
				font-size: 165%;
				margin: 3%;
			}

  			.dropbtn{
  				font-size: 90%;
  				padding: 10px;
  			}

  			.dropdown-content{
  				width: 100%;
  			}
		}


		/*responsive for width = 800 and below*/
		@media screen and (max-width: 800px) and (min-width: 401px) {
			*{
				font-size: 90%;
			}

  			td img{
  				width: 50%;
  			}

  			.dropdown-content{
  				width: 100%;
  			}
		}



		/*responsive for width = 1100 and above*/
		@media screen and (min-width: 1100px) {
			*{
				font-size: 100%;
			}

  			td img{
  				width: 50%;
  			}

  			.dropdown-content{
  				width: 116%;
  			}
		}

	</style>
			
</head>
<body style="background-image: url();">
	<?php if(isset($_SESSION['message'])):?>
	<div class="alert alert-<?php echo $_SESSION['message_type']?>" role="alert">
		<?php
			echo $_SESSION['message'] . "<br>";
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif;?>

	<center><img src="../image/logo.png"></center>

	<div class="nav_style sticky-top">
		<div style="height:50px;">
			<b>PRODUCT LIST</b>

			<div class="dropdown" style="float: right;">

				<button class="dropbtn"><i class="fa fa-user-circle" aria-hidden="true">&nbsp&nbsp<?php echo $_SESSION['admin_name'];?></i></button>

				<div class="dropdown-content">
						
					<a href="./upd_and_add.php"><i class="fa fa-plus-square" aria-hidden="true"></i> add product</a>

					<a href="./search_customer_details.php"><i class="fa fa-search" aria-hidden="true"></i> customer detail</a>
					
					<a href="../server/logoutProcess.php"><i class="fa fa-sign-out" aria-hidden="true"></i> log out</a>

				</div>
			</div>
		</div>
	</div>

	<br />

	<!-------- table -------->
	<?php 
		$sql = "SELECT * FROM product ORDER BY Product_Name;";
		$result = mysqli_query($conn, $sql);
	?>
	
	<div style="overflow-x:auto; margin: 3%;">
		<br />
		<table style="border-collapse: collapse;">
			<thead>
				<tr style="background-color: #c0c0c0">
					<th>Product</th>
					<th>Product Image</th>
					<th>Product Name</th>
					<th>Product Category</th>
					<th>Product Description</th>
					<th>Prodcut Price(RM)</th>
					<th>Product Quantity(Unit)</th>
					<th>Total Sales(RM)</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i = 1;
					while($row = mysqli_fetch_assoc($result)):
				?> 
				<tr>
					<td><?php echo $i . ". ";?></td>
					<td><img src="../image/product_img/<?php echo $row['Product_No'];?>.jpg"></td>
					<td><?php echo $row['Product_Name']?></td>
					<td><?php echo $row['Product_Category']?></td>
					<td><?php echo $row['Product_Desc']?></td>
					<td><?php echo $row['Product_Price']?></td>
					<td><?php echo $row['Product_Quantity']?></td>
					<td><?php echo $row['Total_Sales']?></td>
					<td>
						<a href="upd_and_add.php?update=<?php echo $row['Product_No']?>" title="Update Product"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
						<br />
						<br />
						<a href="adminProcess.php?delete=<?php echo $row['Product_No']?>" title="Remove Product" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					</td>
				</tr>

			<?php
				$i++;
				endwhile;
			?>
			</tbody>
		</table>
	</div>
	<hr />

</body>
</html>