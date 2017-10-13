	<!DOCTYPE>

	<?php
	session_start();

	include("functions/functions.php");
	include("includes/db.php");
	$total = 0;
	global $con;

	$ip=getIp();

	$sel_price = "SELECT * FROM `cart` WHERE `ip_add`='$ip'";

	$run_price = mysqli_query($con, $sel_price);

	while($p_price=mysqli_fetch_array($run_price)){
		$pro_id = $p_price['p_id'];

		$pro_price="SELECT * FROM `products` WHERE `product_id`='$pro_id' ORDER BY `product_price`";

		$run_pro_price =mysqli_query($con, $pro_price);
		while($pp_price = mysqli_fetch_array($run_pro_price)){

			$product_price = array($pp_price['product_price']);

			$product_name = $pp_price['product_title'];

			$values = array_sum($product_price);

			$total +=$values;

		}


	}

	?>
	<html>
	<head>
		<title>House Rent </title>
		<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>

	<body>




		<div class="main_wrapper">
			<div class="header_wrapper">
				 
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
					<form method+"get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="search a house"/ >
						<input type="submit" nme="search" value="search" />
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

									<?php cart(); ?>

									<div id="shopping_cart">
										<span style="float:right; padding:5px; line-Height:40px;">

											<?php
											if(isset($_SESSION['customer_email'])){
												echo "<b>Welcome:</b>" . $_SESSION['customer_email']. "<b style='color:yellow;'></b>";
											}

											else{
												echo "<b> Welcome Guest! </b>";
											}
											?>





											<b style="color:skyblue"> To House Rent</b>

											<?php
											if(isset($_SESSION['customer_email'])){

												echo"<b style='color:white'> Total Price: </b> $total";
												echo "<a href ='cart.php' style='color:yellow;'> GO TO CART </a>";
											}

											else{
											}
											?>

											<?php
											if(!isset($_SESSION['customer_email'])){

												echo "<a href='customer_login.php' style='color:orange;'>Login</a>";

											}
											else{
												echo "<a href='logout.php' style='color:orange;'>Logout</a>";
											}


											?>





										</span>

									</div>



									<div id ="products_box">


										<?php getPro(); ?>
										<?php getCatPro(); ?>
										<?php getBrandPro();?>
									</div>


								</div>
							</div>




							<div id="footer">


								<h3 style="text-align:center; padding-top:20px;">&copy;All rights reserved by Shammi, Samia,Amit, Asif, & Orin</h3>

							</div>
						</div>
					</body>
					</html>