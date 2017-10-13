<?php
include("includes/db.php");

if(isset($_GET['edit_brand'])){

	$brand_id = $_GET['edit_brand'];

	$get_brand = "SELECT * FROM `brands` WHERE `brand_id`='$brand_id'";

	$run_brand = mysqli_query($con, $get_brand);

	$row_brand= mysqli_fetch_array($run_brand);

	$brand_id = $row_brand['brand_id'];

	$brand_title = $row_brand['brand_title'];
}


?>
<form action="" method="post" style="padding:80px;">

<b><font color="white" size="6">Update Developer Name</font></b>
<input type="text" name="new_brand" value="<?php echo $brand_title;?>"/>
<input type="submit" name="update_brand" value="Update Brand" />

</form>

<?php

	if(isset($_POST['update_brand'])){

	$update_id = $brand_id;

	$new_brand = $_POST['new_brand'];

	$update_brand = "UPDATE `brands` SET `brand_title`='$new_brand' WHERE `brand_id`='$update_id'";

	$run_update = mysqli_query($con, $update_brand);

	if($run_update){

	echo "<script>alert('Brand has been updated!')</script>";
	echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
	}

?>