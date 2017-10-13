<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");


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





					 <b style="color:red"> To Your Booking Info</b>

					 <a href ="index.php" style="color:yellow">Back to Gallery</a>


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
				   <form action="" method="post" enctype="multipart/form-data">

				    <table align="center" width="700" bgcolor="transparent">



						<tr align="center">
							<th>Remove</th>
							<th>Booked House</th>
							<th>Number of people</th>
							<th>Total price</th>
						</tr>


					<?php

					$total = 0;
					global $con;

					$ip=getIp();

					$sel_price = "SELECT * FROM `cart` WHERE `ip_add`='$ip'";

					$run_price = mysqli_query($con, $sel_price);

					while($p_price=mysqli_fetch_array($run_price)){

						$pro_id = $p_price['p_id'];

						$pro_price="SELECT* FROM `products` WHERE `product_id`='$pro_id' GROUP BY `product_price`";

						$run_pro_price =mysqli_query($con, $pro_price);

						while($pp_price = mysqli_fetch_array($run_pro_price)){

						//$product_price = array($pp_price['product_price']);

						$product_title = $pp_price['product_title'];

						$product_image = $pp_price['product_image'];

						$single_price = $pp_price['product_price'];

						//$values = array_sum($product_price);

						$total += $single_price;



					?>

					<tr align="center">
						<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
						<td><?php echo $product_title; ?><br>
						<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60"/>
						</td>
						<td><input type="text" size="4" name="qty" value="<?php echo "";?>"/></td>


						<?php
						if(isset($_POST['update_cart'])){

							$qty=$_POST['qty'];

							$update_qty="update cart set qty='$qty'";
							//$update_qty="update cart set qty='$qty' where p_id='$product_id'";

							$run_qty = mysqli_query($con, $update_qty);

							$_SESSION['qty']=$qty;

							// $total=$total*$qty;

						}


						?>




						<td><?php echo "Tk.".$single_price; ?></td>

					</tr>



	<?php } } ?>
				<tr>
						<td colspan="4" align="right"><b>Grand Total:</b></td>
						<td><?php echo "Tk.".$total;?></td>
				</tr>

				<tr align="center">

				<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>

				<td><input type="submit" name="continue" value="Continue to see place"/></td>

				<td><a href = "payment.php" style="text-decoration:none; color:white;">Checkout</a></td>


				</tr>



		</table>


				   </form>

				   <?php

					function updatecart(){
						global $con;
						$ip=getIp();

						if(isset($_POST['update_cart'])){
							foreach($_POST['remove'] as $remove_id){

							$delete_product = "DELETE FROM `cart` WHERE `p_id`='$remove_id' AND `ip_add`='$ip'";

							$run_delete = mysqli_query($con, $delete_product);

							if($run_delete){

								echo "<script>window.open('cart.php','_self')</script>";
							}
							}
						}

						if(isset($_POST['continue'])){

							echo "<script>window.open('index.php','_self')</script>";
						}


					}
				   echo @$up_cart = updatecart();
				   ?>

				   </div>
				   </div>




			   <div id="footer">


			   <h3 style="text-align:center; padding-top:20px;">&copy;
				All rights reserved by Shammi, Samia,Amit, Asif, & Orin</h3>






			   </div>
</div>
	 </body>
	 </html>