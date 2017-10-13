<!DOCTYPE>

<?php

include("includes/db.php");

?>
<html>
<head>
	<title>Inserting Place</title>

	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script>
		tinymce.init({selector:'textarea'});
	</script>
</head>

<body bgcolor="skyblue">


	<form action="insert_product.php" method="post" enctype="multipart/form-data">

		<table align="center" width="795" border="2" bgcolor="#187eae">

			<tr align="center">
				<td colspan="7"><h2>Insert New Place Here</h2></td>
			</tr>

			<tr>
				<td align="right"><b>Place Title:</b></td>
				<td><input type="text" name="product_title" size="60" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Place Category:</b></td>
				<td>
					<select name="product_cat" >
						<option>Select a Category</option>
						<?php
						$get_cats = "SELECT * FROM `categories` ORDER BY `cat_id` ASC";

						$run_cats = mysqli_query($con, $get_cats);

						while ($row_cats=mysqli_fetch_array($run_cats)){

							$cat_id = $row_cats['cat_id'];
							$cat_title = $row_cats['cat_title'];

							echo "<option value='$cat_id'>$cat_title</option>";


						}

						?>
					</select>


				</td>
			</tr>

			<tr>
				<td align="right"><b>Developer Name:</b></td>
				<td>
					<select name="product_brand" >
						<option>Select a Developer</option>
						<?php
						$get_brands = "SELECT * FROM `brands`";

						$run_brands = mysqli_query($con, $get_brands);

						while ($row_brands=mysqli_fetch_array($run_brands)){

							$brand_id = $row_brands['brand_id'];
							$brand_title = $row_brands['brand_title'];

							echo "<option value='$brand_id'>$brand_title</option>";


						}

						?>
					</select>


				</td>
			</tr>

			<tr>
				<td align="right"><b>Place Image:</b></td>
				<td><input type="file" name="product_image" /></td>
			</tr>

			<tr>
				<td align="right"><b>Place Price:</b></td>
				<td><input type="text" name="product_price" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Place Description:</b></td>
				<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
			</tr>

			<tr>
				<td align="right"><b>Place Keywords:</b></td>
				<td><input type="text" name="product_keyword" size="50" required/></td>
			</tr>

			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
			</tr>

		</table>


	</form>


</body>
</html>
<?php

if(isset($_POST['insert_post'])){

		//getting the text data from the fields
	$product_title = $_POST['product_title'];
	$product_cat= $_POST['product_cat'];
	$product_brand = $_POST['product_brand'];
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	$product_keywords = $_POST['product_keyword'];

		//getting the image from the field
	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];

	move_uploaded_file($product_image_tmp,"product_images/$product_image");

	$insert_product = "INSERT INTO `products`(`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES ('$product_cat', '$product_brand', '$product_title', '$product_price', '$product_desc', '$product_image', '$product_keywords')";

	$insert_pro = mysqli_query($con, $insert_product);

	if($insert_pro){

		echo "<script>alert('Product Has been inserted!')</script>";
		echo "<script>window.open('index.php?insert_product','_self')</script>";

	}
}








?>



