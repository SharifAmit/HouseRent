 <!DOCTYPE>
<?php
session_start();
include("functions/functions.php");


?>
<html>
     <head>
	 <title>House Rent </title>
	   <link rel="stylesheet" href="styles/style.css" media="all" />
	   <!-- bjqs.css contains the *essential* css needed for the slider to work -->
    <link rel="stylesheet" href="bjqs.css">

    <!-- some pretty fonts for this demo page - not required for the slider -->
    <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css'>

    <!-- demo.css contains additional styles used to set up this demo page - not required for the slider -->
    <link rel="stylesheet" href="demo.css">

    <!-- load jQuery and the plugin -->
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="js/bjqs-1.3.min.js"></script>
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
                     <span style="float:right; padding:2px; line-Height:40px; color:red;">

					 <?php
					 if(isset($_SESSION['customer_email'])){
						 echo "<b>Welcome:</b>" . $_SESSION['customer_email']. "<b style='color:yellow;'></b>";
					 }

					 else{
						 echo "<b>WELCOME GUEST</b>";
					 }
					 ?>





					 <b style="color:red"> TO House Rent</b>



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




				   <!--  Outer wrapper for presentation only, this can be anything you like -->
      <div id="banner-fade">

        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">
          <li><img src="img/banner01.jpg" title=""></li>
          <li><img src="img/banner02.jpg" title=""></li>
          <li><img src="img/banner03.jpg" title=""></li>
		  <li><img src="img/banner04.jpg" title=""></li>
		  <li><img src="img/banner05.jpg" title=""></li>

        </ul>
        <!-- end Basic jQuery Slider -->

      </div>
      <!-- End outer wrapper -->

      <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 400,
            width       : 900,
            responsive  : true
          });

        });
      </script>
				   </div>
				   <div id ="products_box">



					   <?php getCatPro(); ?>
				       <?php getBrandPro();?>
				   </div>




			   <div id="footer">


			  <h3 style="text-align:center; padding-top:20px;">&copy;All rights reserved by Shammi, Samia,Amit, Asif, & Orin</h3>

			   </div>
</div>
	 </body>
	 </html>