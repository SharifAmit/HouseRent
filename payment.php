

<div style="float:center" >


	<?php
	session_start();
	include("includes/db.php");
	include("functions/functions.php");

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
		<title>House Rent</title>
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
						echo "<a href='cart.php' style='color:white;'> Booked Place</a>";
						echo "<a href='my_account.php' style='color:white;'> My Account</a>";

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
										<span style="float:right; font-size:17px; padding:5px; line-Height:40px;">

											<?php
											if(isset($_SESSION['customer_email'])){
												echo "<b>Welcome:</b>" . $_SESSION['customer_email']. "<b style='color:yellow;'></b>";
											}

											else{
												echo "<b>Welcome Guest</b>";
											}
											?>







											<?php
											if(!isset($_SESSION['customer_email'])){

												echo "<a href='checkout.php' style='color:orange;'>Login</a>";

											}
											else{
												echo"<b style='color:white'> Total Price: </b> $total ";
												echo "<a href='logout.php' style='color:orange;'>Logout</a>";
											}


											?>





										</span>

									</div>
									<div style="float:center">
										<h3><b><span style="center">bKash Payment Steps :</span></b></h3>
										<p><b><span style="center">You can make payments from your bKash Account to our Merchant.</span><b></p>
										<p><b><span style="center">01. Go to your bKash Mobile Menu by dialing *247#</span><b></p>
										<p><b><span style="center">02. Choose Payment option by pressing 3</span><b></p>
										<p><b><span style="center">03. Enter the Merchant bKash Account Number 01925995147 </span><b></p>
										<p><b><span style="center">04. Enter the fare <?php echo "$".$total;?> you want to pay.</span><b></p>
										<p><b><span style="center">05. Write the word tickets against your payment</span><b></p>
										<p><b><span style="center">06. Enter the Counter Number 0</span><b></p>
										<p><b><span style="fcenter">07. Now enter your bKash Mobile Menu PIN to confirm</span><b></p>
										<p><b><span style="center">Done! You will receive a confirmation message from bKash.</span><b></p>

										<span style="float:center">
											<form method="get" action="bkash_success.php" enctype="multipart/form-data">
												<input type="number_format"  name="trx" placeholder="Type your Transection ID" required/>
												<input type="submit" name="done" value="OK" />
											</form>
										</span>



										<span style="float:right">
											<h2 align="center">Pay now with bKash:</h2>

											<p style="text-align:center;"><img src="bkash.png" width="200" height="200"/></p>
										</span>

									</div>
								</div>
								<div id="footer">


									<h3 style="text-align:center; padding-top:20px;">&copy;All rights reserved by Shammi, Samia,Amit, Asif, & Orin</h3>

								</div>
							</div>
						</body>
						</html>

<?php 
	if(isset($_POST['done'])){
		$trx_id = $_POST['trx'];

		$_SESSION['varname'] = $trx_id;
}

?>
