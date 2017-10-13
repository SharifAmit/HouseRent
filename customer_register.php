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
				   <span style="float:left; padding:2px; padding-right:2px; line-Height:40px; color:red;">
				   <?php
					 if(isset($_SESSION['customer_email'])){
						 echo "<b> You can create another new account </b>";
					 }

					 else{
						 echo "<b>You can create an account </b>";
					 }
					 ?>




				   </div>

				   <form action="customer_register.php" method="post" enctype="multipart/form-data">



					<table align="center" width="750">

					<tr align="center">
					<td colspan="6"><h2>Create An Account</h2></td>
					</tr>

					<tr>
						<td align="right">Customer Name:</td>
						<td><input type="text" name="c_name" required/></td>
					</tr>


					<tr>
						<td align="right">Customer Email:</td>
						<td><input type="text" name="c_email"required/></td>
					</tr>

					<tr>
						<td align="right">Customer Password:</td>
						<td><input type="password" name="c_pass" required/></td>
					</tr>

					<tr>
						<td align="right">Customer Image:</td>
						<td><input type="file" name="c_image" required/></td>
					</tr>


					<tr>
						<td align="right">Customer Country:</td>
						<td>
						<select name="c_country">
							<option>Select a Country</option>
							<option>Angola</option>
							<option>Bangladesh</option>
							<option>India</option>
							<option>Indonesia</option>
							<option>Lebanon</option>
							<option>Nepal</option>
							<option>Pakistan</option>
							<option>Russia</option>
							<option>Singapore</option>
							<option>United States</option>
							<option>United Kingdom</option>
						</select>
						</td>
					</tr>


					<tr>
						<td align="right">NID:</td>
						<td><input type="text" name="NID" required/></td>
					</tr>


					<tr>
						<td align="right">Customer Contact:</td>
						<td><input type="text" name="c_contact"/></td>
					</tr>


					<tr>
						<td align="right">Customer Address:</td>
						<td><input type="text" name="c_address" required/></td>
					</tr>


					<tr align="center">

						<td colspan="6"><input type="submit" name="register" value="Create Account" ></td>
					</tr>





					</table>

				   </form>

				   </div>




			   <div id="footer">


			   <h2 style="text-align:center; padding-top:20px;">&copy;All rights reserved by Shammi, Samia,Amit, Asif, & Orin</h2>






			   </div>
</div>
	 </body>
	 </html>



	 <?php
	 if(isset($_POST['register'])){
		 $ip = getIp();
		 $c_name = $_POST['c_name'];
		 $c_email = $_POST['c_email'];
		 $c_pass = $_POST['c_pass'];
		 $c_image = $_FILES['c_image']['name'];
		 $c_image_tmp = $_FILES['c_image']['tmp_name'];
		 $c_country = $_POST['c_country'];
		 $NID = $_POST['NID'];
		 $c_contact = $_POST['c_contact'];
		 $c_address = $_POST['c_address'];

		 move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

		  $insert_c="INSERT INTO `customers` (customer_ip,customer_name,customer_email,customer_pass,customer_country,NID,customer_contact,customer_address,customer_image) VALUES ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";

		 $run_c = mysqli_query($con, $insert_c);

		 $sel_cart = "SELECT * FROM `cart` WHERE `ip_add`='$ip'";

		 $run_cart = mysqli_query($con, $sel_cart);

		 $check_cart = mysqli_num_rows($run_cart);

		 if($check_cart==0){


			$_SESSION['customer_email']=$c_email;

			echo "<script>alert('Account has been created successfully, Thanks! ')</script>";
			echo "<script>window.open('customer/my_account.php','_self')</script>";

		 }
		 else{

			 $_SESSION['customer_email']=$c_email;

			echo "<script>alert('Account has been created successfully, Thanks! ')</script>";

			echo "<script>window.open('checkout.php','_self')</script>";

		 }

	 }


	 ?>






