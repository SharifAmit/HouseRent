<?php
$con = mysqli_connect("localhost","root","","houserent");
if(mysqli_connect_errno())
{
echo "Failed to connect to Mysql " .mysqli_connect_error();
}
?>