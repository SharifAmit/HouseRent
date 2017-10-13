<?php 
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

	?>

	<!DOCTYPE> 

	<html>
	<head>
		<title>Admin Panel</title> 
		
		<link rel="stylesheet" href="styles/style.css" media="all" /> 
	</head>


	<body> 

		<div class="main_wrapper">


			<div id="header"></div>

			<div id="right">
				<h2 style="text-align:center;">Manage Content</h2>

				<a href="index.php?insert_product">Add New Place</a>
				<a href="index.php?view_products">Show All Places</a>
				<a href="index.php?insert_cat">Add New Category</a>
				<a href="index.php?view_cats">Show All Categories</a>
				<a href="index.php?insert_brand">Add New Sponsor</a>
				<a href="index.php?view_brands">Show All Sponsors</a>
				<a href="index.php?view_customers">Show Customers</a>
				<a href="index.php?view_orders">Show Orders</a>
				<a href="index.php?view_payments">Show Payments</a>
				<a href="logout.php">Admin Logout</a>

			</div>

			<div id="left">
				<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
				<?php 
				if(isset($_GET['insert_product'])){

					include("insert_product.php"); 

				}
				if(isset($_GET['view_products'])){

					include("view_products.php"); 

				}
				if(isset($_GET['edit_pro'])){

					include("edit_pro.php"); 

				}
				if(isset($_GET['insert_cat'])){

					include("insert_cat.php"); 

				}

				if(isset($_GET['view_cats'])){

					include("view_cats.php"); 

				}

				if(isset($_GET['edit_cat'])){

					include("edit_cat.php"); 

				}

				if(isset($_GET['insert_brand'])){

					include("insert_brand.php"); 

				}

				if(isset($_GET['view_brands'])){

					include("view_brands.php"); 

				}
				if(isset($_GET['edit_brand'])){

					include("edit_brand.php"); 

				}
				if(isset($_GET['view_customers'])){

					include("view_customers.php"); 

				}
				if(isset($_GET['view_orders'])){

					include("view_orders.php"); 

				}
				if(isset($_GET['view_payments'])){

					include("view_payments.php"); 

				}


				?>
			</div>






		</div>


	</body>
	</html>
	<?php } ?>
	<?php
	include("includes/db.php");

	if(isset($_GET['confirm_order'])){
		$get_id = $_GET['confirm_order'];

		$order_status= 'Booking Procedure Complete';

		$update_order = "UPDATE `orders` SET `order_status`='$order_status' WHERE `order_id`='$get_id'";
		$run_update = mysqli_query($con, $update_order);
		if($run_update)
		{
			echo "<script>alert('Order was updated')</script>";
			echo "<script>window.open('index.php?view_orders','_self')</script>";
		}
	}
	?>