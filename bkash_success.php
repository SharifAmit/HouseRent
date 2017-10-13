<!DOCTYPE>
<?php
session_start();
?>
<?php
include("includes/db.php");
include("functions/functions.php");
$total = 0;
global $con;

//product 


$ip=getIp();

$sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";

$run_price = mysqli_query($con, $sel_price);

while($p_price=mysqli_fetch_array($run_price)){
	$pro_id = $p_price['p_id'];

	$pro_price="SELECT * FROM `products` WHERE `product_id`='$pro_id' ORDER BY `product_price`";

	$run_pro_price =mysqli_query($con, $pro_price);
	while($pp_price = mysqli_fetch_array($run_pro_price)){

		$product_price = array($pp_price['product_price']);

		$values = array_sum($product_price);

		$product_id = $pp_price['product_id'];

		$total +=$values;

	}


}
// number of people
$get_qty = "SELECT * from `cart` WHERE `p_id`='$pro_id'";
$run_qty = mysqli_query($con,$get_qty);

$row_qty = mysqli_fetch_array($run_qty);

$qty = $row_qty['qty'];




//customer
$user =$_SESSION['customer_email'];
$get_c = "SELECT * FROM `customers` WHERE `customer_email`='$user'";
$run_c = mysqli_query($con,$get_c);
$row_c = mysqli_fetch_array($run_c);
$c_id  = $row_c['customer_id'];
$varname ="";
$trx_id = isset($_POST['varname']) ? $_POST['varname'] : '';
//$trx_id = $_SESSION['varname'];




//insertion
$insert_payment ="INSERT INTO `payments` (amount,customer_id,product_id,trx_id,payment_date) VALUES ('$total','$c_id','$pro_id','$trx_id',NOW())";
$run_payments = mysqli_query($con,$insert_payment);

//order
$insert_orders = "INSERT INTO `orders` (p_id,c_id,qty,order_date,order_status) VALUES ('$pro_id','$c_id','$qty',NOW(),'Booked')";
$run_orders = mysqli_query($con,$insert_orders);

// $empty_cart = "DELETE FROM `cart`";
// $run_cart = mysqli_query($con,$empty_cart);

?>
<html>
<head>
	<title>House Rent </title>
	<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>




	<div class="main_wrapper">
		<div class="header_wrapper">
			  <!-- <a href="index.php"><img id ="logo" src="images/logo.gif" /></a>
			  <img id="banner" src="images/ad_banner.gif" />
			-->
		</div>




		<div class="menubar">
			<ul id="menu">
				<li><a href="index.php"> Home </a></li>
				<li><a href="all_products.php"> All Products</a></li>
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
					<input type="text" name="user_query" placeholder="search a product"/ >
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

						<div id="sidebar_title">Brands</div>


						<ul id="cats">
							<?php getBrands() ; ?>

							<ul>


							</div>
							<div>


								<title>Payment Successful!</title>

								<h2 style="color:white;text-align:center; padding-top:30px;">Welcome <?php echo $_SESSION['customer_email'];?></h2>
								<h3 style="color:white;text-align:center; padding-top:30px;" >Your payment was successful, please go to your account</h3>
								<h3><a href="my_account.php">Go to your account.</a></h3>

							</div>




							<div id="footer">


								<h2 style="text-align:center; padding-top:30px;">&copy;All rights reserved by Shammi, Samia,Amit, Asif, & Orin</h2>






							</div>
						</div>
					</body>
					</html>
