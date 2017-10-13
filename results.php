	<!DOCTYPE>
	<?php
	include("functions/functions.php");

	?>
	<html>
		 <head>
		 <title>House Rent </title>
		   <link rel="stylesheet" href="styles/style.css" media="all" />
		 </head>

		<body>




		 <div class="main_wrapper">
				  <div class="header_wrapper">
<!--<a href="index.php"><img id ="logo" src="images/logo.gif" /></a>
				  <img id="banner" src="images/ad_banner.gif" />
					-->

					</div>




					<div class="menubar">
					<ul id="menu">
					<li><a href="index.php"> Home </a></li>
					<li><a href="all_products.php"> Houses</a></li>

                     <?php
                     if(!isset($_SESSION['customer_email'])){

                         echo "<a href='customer_register.php' style='color:white;'>Sign Up</a>";

                     }
                     else{

                         echo "<a href='my_account.php' style='color:white;'> My Account</a>";
                         echo "<a href='cart.php' style='color:white;'> Booked Place</a>";
                     }
                ?>
					<li><a href="location.php"> Contact us </a></li>

					</ul>
					<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
					   <input type="text" name="user_query" placeholder="search a house"/ >
					   <input type="submit" name="search" value="Search" />
					</form>
					</div>
					</div>







				<div class="content_wrapper">

					   <div id="sidebar">
					   <div id="sidebar_title">Categories</div>


					   <ul id="cats">
					   <?php getcats(); ?>




						<ul>

							   <div id="sidebar_title">Sponsored</div>


					   <ul id="cats">
						<?php getBrands() ; ?>

						<ul>


				</div>
					   <div id="content_area">
					   <div id="shopping_cart">
						 <span style="float:right; font-size:18px; padding:5px; line-Height:40px;">
						 Welcome Guest! <b style="color:red"> Shopping Cart</b>
						 Total Items: Total Price:
						 <a href ="cart.php" style="color:yellow">GO TO CART</a>
						 </span>

					   </div>

					   <div id ="products_box">

		<?php


		if(isset($_GET['search'])){
			$search_query = $_GET['user_query'];
		$get_pro = "SELECT * FROM `products` WHERE `product_keywords` LIKE '%$search_query%'";

		$run_pro = mysqli_query($con, $get_pro);

		while($row_pro=mysqli_fetch_array($run_pro)){
			$pro_id = $row_pro['product_id'];
			$pro_cat = $row_pro['product_cat'];
			$pro_brand = $row_pro['product_brand'];
			$pro_title = $row_pro['product_title'];
			$pro_price = $row_pro['product_price'];
			$pro_image = $row_pro['product_image'];
			echo"
			<div id='single_product'>

			<h3>$pro_title</h3>
			<img src='admin_area/product_images/$pro_image' width='180'  height='180' />

   		  <p><b> $pro_price	</b></p>

	        <a href='details.php?pro_id=$pro_id' style='float:left';>Details</a>

          	<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add To Cart </button></a>

			</div>";
		}
		}
		?>
		</div>
					   </div>
					   </div>




				   <div id="footer">


				    <h3 style="text-align:center; padding-top:20px;">&copy;All rights reserved by Shammi, Samia,Amit, Asif, & Orin</h3>

				   </div>
	</div>
		 </body>
		 </html>