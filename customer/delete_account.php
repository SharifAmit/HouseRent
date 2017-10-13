
                    <br>

                    <h2 style ="text-align:center;">Do You really want to DELETE your account?</h2>

                    <form action ="" method="post">

                    <br>

                    <input type ="submit" name="yes" value="Yes i want" />

                    <input type ="submit" name="no" value="no i was joking"/>


                    </form>

                    <?php
                    include ("includes/db.php");
                    $user =$_SESSION['customer_email'];

                    if (isset($_POST['yes'])){
                    $delete_customer ="DELETE FROM `customers` WHERE `customer_email`='$user'";
                    $run_customer = mysqli_query($con,$delete_customer);

                    echo "<script>alert('It was great having you !')</script>";
                    echo "<script>window.open('../index.php','_self')</script>";
                    }

                    if (isset($_POST['no'])){

                    echo "<script>alert('Thanks for changing your mind !')</script>";
                    echo "<script>window.open('my_account.php','_self')</script>";


                    }


                    ?>

