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
			  <!-- <a href="../index.php"><img id ="logo" src="images/logo.gif" /></a>
			  <img id="banner" src="images/ad_banner.gif" /> -->

				</div>




				<div class="menubar">
				<ul id="menu">
				<li><a href="../index.php"> Home </a></li>
				<li><a href="../all_products.php"> All Products</a></li>
				<?php
                     if(!isset($_SESSION['customer_email'])){

                         echo "<a href='../customer_register.php' style='color:white;'>Sign Up</a>";

                     }
                     else{

                         echo "<a href='../my_account.php' style='color:white;'> My Account</a>";
                         echo "<a href='../cart.php' style='color:white;'> Booked Place</a>";
                     }
                ?>
				<li><a href="../location.php"> Contact us </a></li>

				</ul>
				<div id="form">
				<form method+"get" action="../results.php" enctype="multipart/form-data">
				   <input type="text" name="user_query" placeholder="search a product"/ >
				   <input type="submit" nme="search" value="search" />
				</form>
				</div>
				</div>







			<div class="content_wrapper">

				   <div id="sidebar">
			       <div id="sidebar_title">My Account:</div>


				   <ul id="cats">
                  <?php

                $user =$_SESSION['customer_email'];
                $get_img = "SELECT * FROM `customers` WHERE `customer_email`='$user'";
                $run_img = mysqli_query($con,$get_img);
                $row_img = mysqli_fetch_array($run_img);
                $c_image = $row_img['customer_image'];
				$c_name = $row_img['customer_name'];

                echo "<p style='text-align:center;'><img src ='customer_images/$c_image'width='150' height='150'/>";


				  ?>

                    
				    <li><a href="my_account.php?edit_account">Edit Account</a></li>
					<li><a href="my_account.php?change_pass">Change password</a></li>
					<li><a href="my_account.php?view_orders">View orders</a></li>
					<li><a href="my_account.php?delete_account">Delete Account</a></li>

					<li><a href="logout.php">logout</a></li>








                    <ul>
				</div>
			       <div id="content_area">


				   <?php cart(); ?>



				   <div id="shopping_cart">
                     <span style="float:right; font-size:17px; padding:5px; line-Height:40px;">

					 <?php
					 if(isset($_SESSION['customer_email'])){
						 echo "<b>Welcome:</b>" . $_SESSION['customer_email'];

					 }
					 ?>






					 <?php
					 if(!isset($_SESSION['customer_email'])){

						 echo "<a href='checkout.php' style='color:orange;'>Login</a>";

					 }
					 else{
						 echo "<a href='logout.php' style='color:orange;'>Logout</a>";
					 }


					 ?>





					 </span>

				   </div>



				   <div id ="products_box">



				 <?php

                    if (!isset($_GET['view_orders'])){
                      if (!isset($_GET['edit_account'])){
                         if (!isset($_GET['change_pass'])){
                            if(!isset($_GET['delete_account'])){


				echo"
                  <h2 style='padding:20px;'>Welcome: $c_name;</h2>
				<b>you can see your orders progress by clicking this <a href='cart.php'>link</a></b>";

							}
						 }
					  }
					}


					   ?>

						<?php
                          if (isset($_GET['edit_account'])){
                             include("edit_account.php");
						  }

						  if (isset($_GET['change_pass'])){
                             include("change_pass.php");
						  }
						   if (isset($_GET['delete_account'])){
                             include("delete_account.php");
						  }
						  if (isset($_GET['view_orders'])){
                             include("view_orders.php");
						  }




                                       ?>




				   </div>
				   </div>




			   <div id="footer">


			   <h2 style="text-align:center; padding-top:30px;">&copy;All rights reserved by Amit, Asif, Sabit & Orin</h2>






			   </div>
</div>
	 </body>
	 </html>