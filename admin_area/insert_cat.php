
<form action="" method="post" style="padding:80px;">

<b><font color="white" size="6">Insert New Category:</font></b>
<input type="text" name="new_cat" required/>
<input type="submit" name="add_cat" value="Add Category" />

</form>

<?php
include("includes/db.php");

	if(isset($_POST['add_cat'])){

	$new_cat = $_POST['new_cat'];

	$insert_cat = "INSERT INTO `categories` (cat_title) VALUES ('$new_cat')";

	$run_cat = mysqli_query($con, $insert_cat);

	if($run_cat){

	echo "<script>alert('New Category has been inserted!')</script>";
	echo "<script>window.open('index.php?view_cats','_self')</script>";
	}
	}

?>