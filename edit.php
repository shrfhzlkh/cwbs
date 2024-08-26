<?php
session_start();

include 'config.php';

$email=$_SESSION['custemail'];
$name=$_POST['custname'];
$cemail=$_POST['custemail'];
$phone=$_POST['custphone'];

$qr="UPDATE customer SET Cust_name='$name', Cust_email='$cemail', Cust_phone='$phone' WHERE Cust_email='$email'";
$log=mysqli_query($conn, $qr);
if($log)
{
    echo '<script type="text/javascript">alert("Updated")</script>';
    echo "<script type='text/javascript'>alert;window.location.href='profile.php'</script>";
}
else
{
    echo "Error :".$qr;
}
?>