<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
?>
<html>
     <head>
	 <title>House Rent</title>
	   <link rel="stylesheet" href="styles/style.css" media="all" />
	 </head>

	<body>




	 <div class="main_wrapper">
              <div class="header_wrapper">
			 <!-- <a href="index.php"><img id ="logo" src="images/logo.gif" /></a>
				  <img id="banner" src="images/ad_banner.gif" /> -->


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
                     <span style="float:left; font-size:18px; padding:5px; line-Height:40px;">

					 <?php
					 if(isset($_SESSION['customer_email'])){
						 echo "<b>Welcome:</b>" . $_SESSION['customer_email']. "<b style='color:yellow;'></b>";
					 }

					 else{
						 echo "<b>WELCOME GUEST</b>";
					 }
					 ?>



					</span>

				   </div>



				   <div id ="products_box">


						<div>
							<form method="post" acton="">

								<table width="500" height="300"align="center" bgcolor="grey">

									<tr align="center">
									<td colspan="4"><h2>Login or Register to Buy!</h2></td>
									</tr>


									<tr>
									<td align="right"><b>Email:</b></td>
									<td><input type="text" name="email" placeholder="enter email" required></td>
									</tr>


									<tr>
									<td align="right"><b>Password:</b></td>
									<td><input type="password" name="pass" placeholder="enter password" required/></td>
									</tr>

									<tr align="center">
									<td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
									</tr>

									<tr align="center">
									<td colspan="4"><input type="submit" name="login" value="Login" /></td>
									</tr>


								</table>

								<h2 style="float:right; padding-right:15px;"><a href = "customer_register.php" style="text-decoration:none; color:white;">New? Register Here</a></h2>


							</form>

							<?php
							if(isset($_POST['login'])){
								$c_email = $_POST['email'];
								$c_pass = $_POST['pass'];

								$sel_c = "SELECT * FROM `customers` WHERE `customer_pass`='$c_pass' AND `customer_email`='$c_email'";

								$run_c = mysqli_query($con, $sel_c);

								$check_customer = mysqli_num_rows($run_c);

								if($check_customer==0){
									echo "<script>alert('Password or Email is Incorrect; Please try again!')</script>";
									exit();

								}
								$ip = getIp();

								$sel_cart = "SELECT * FROM `cart` WHERE `ip_add` ='$ip'";

								 $run_cart = mysqli_query($con, $sel_cart);

								 $check_cart = mysqli_num_rows($run_cart);

								if($check_customer>0 AND $check_cart==0){
									$_SESSION['customer_email']=$c_email;

									echo "<script>alert('You Logged in successfully, Thanks! ')</script>";

									echo "<script>window.open('my_account.php','_self')</script>";
								}
								else{
									$_SESSION['customer_email']=$c_email;

									echo "<script>alert('You Logged in successfully, Thanks! ')</script>";

									echo "<script>window.open('payment.php','_self')</script>";
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