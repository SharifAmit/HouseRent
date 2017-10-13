
<table width="795" align="center" bgcolor="white">


	<tr align="center"  bgcolor="white">
		<td colspan="6"><h2>View all orders here</h2></td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Customer Email</th>
		<th>Booked House</th>
		<th>Number of Person</th>
		<th>Order Date</th>
		<th>Order Status</th>
	</tr>
	<?php
	include("includes/db.php");
	

	$get_orders = "SELECT * FROM `orders`";

	$run_orders = mysqli_query($con, $get_orders);

	$i = 0;

	while ($row_order=mysqli_fetch_array($run_orders)){

		$order_id = $row_order['order_id'];
		$qty = $row_order['qty'];
		$pro_id = $row_order['p_id'];
		$c_id = $row_order['c_id'];
		$order_date = $row_order['order_date'];
		$order_status = $row_order['order_status'];
		$i++;

		$get_pro = "SELECT * FROM `products` WHERE `product_id`='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro);

		$row_pro=mysqli_fetch_array($run_pro);

		$pro_image = $row_pro['product_image'];
		$pro_title = $row_pro['product_title'];


		 $get_c = "SELECT * from `customers` where `customer_id`='$c_id'";
		 $run_c = mysqli_query($con, $get_c);

		$row_c=mysqli_fetch_array($run_c);

		 $c_email = $row_c['customer_email'];

		?>
		<tr align="center">
			<td><?php echo $i;?></td>
			
			<td><?php echo $c_email;?></td>
			<td>
				<?php echo $pro_title;?><br>
				<img src="../admin_area/product_images/<?php echo $pro_image;?>" width="100" height="100" />
			</td>
			<td><?php echo $qty;?></td>
			<td><?php echo $order_date;?></td>
			<td><?php echo $order_status;?></td>
			<td><a href="index.php?confirm_order=<?php echo $order_id; ?>">Complete Order</a></td>

		</tr>
		<?php } ?>

	</table>
	