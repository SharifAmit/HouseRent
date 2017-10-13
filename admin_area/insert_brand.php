
<form action="" method="post" style="padding:80px;">

<b><font color="white" size="6">Insert New Developer:</font></b>
<input type="text" name="new_brand" required/>
<input type="submit" name="add_brand" value="Add Brand" />

</form>

<?php
include("includes/db.php");

	if(isset($_POST['add_brand'])){

	$new_brand = $_POST['new_brand'];

	$insert_brand = "INSERT INTO `brands` (brand_title) VALUES ('$new_brand')";

	$run_brand = mysqli_query($con, $insert_brand);

	if($run_brand){

	echo "<script>alert('New Brand has been inserted!')</script>";
	echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
	}

?>