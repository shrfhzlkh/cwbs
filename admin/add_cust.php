<?php
include 'includes/config.php';
$name=$_POST['custname'];
$email=$_POST['custemail'];
$phone=$_POST['custphone'];
$pass=$_POST['custpass'];

    $sql = "insert into customer (Cust_name, Cust_email, Cust_phone, Cust_password) 
    values ('$name','$email','$phone','$pass')";

        if ($dbh->query($sql)){
            header("Location: customerlist.php");
            
        }
        else{
            die('Error: ' . mysqli_error($dbh));
        }
        
		
?>