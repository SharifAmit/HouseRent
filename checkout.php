<!DOCTYPE>
<?php
session_start();
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

					<?php

					if(!isset($_SESSION['customer_email'])){

						include_once("customer_login.php");
					}
					else{
						include_once("payment.php");
					}


					?>


				   </div>
				   </div>




			   <div id="footer">


			  <h3 style="text-align:center; padding-top:20px;">&copy;All rights reserved by Shammi, Samia,Amit, Asif, & Orin</h3>





			   </div>
</div>
	 </body>
	 </html>