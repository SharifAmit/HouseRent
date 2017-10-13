	<!DOCTYPE>
	<?php

session_start();
	include("functions/functions.php");

	?>
	<html>
		 <head>
		 <title>House Rent </title>
		   <link rel="stylesheet" href="styles/style.css" media="all" />
		   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_0KwbEDCjWvQ0XSPux_wu283DCyGD-no">
			</script>

			<script>
			function initialize() {
			  var mapProp = {
			    center:new google.maps.LatLng(23.7801728,90.4050027),
			    zoom:16,
				    mapTypeId:google.maps.MapTypeId.ROADMAP
			  };
			  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
			}
			google.maps.event.addDomListener(window, 'load', initialize);
			</script>
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


					   <div style="float:center">


					   <h1><b> House Rent Private Limited</b></h1>
					   <h3><b>Address : Brac University, Bangladesh</b></h3>
					   <h3><b> Mobile No. : 01925995147</b></h3>
					   <h3><b> bKash No. : 01676076329</b></h3>

					   <span style="float:right">
						<h2 align="center"> Location :</h2>
						<div id="googleMap" style="width:500px;height:380px;">

						</div>
						<!-- <p style="text-align:center;"><img src="location.png" width="400" height="200"/></p> -->
						</span>

						</div>
					   </div>
					   </div>




				   <div id="footer">


				   <h3 style="text-align:center; padding-top:20px;">&copy;All rights reserved by Shammi, Samia,Amit, Asif, & Orin</h3>

				   </div>
	</div>
		 </body>
		 </html>