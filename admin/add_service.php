<?php
include 'includes/config.php';
$service=$_POST['service'];
$small=$_POST['small'];
$medium=$_POST['medium'];
$large=$_POST['large'];
$extralarge=$_POST['extralarge'];

    $sql = "insert into service (Service_type, Small, Medium, Large, Extralarge) 
    values ('$service', '$small', '$medium', '$large', '$extralarge')";

        if ($dbh->query($sql)){
            header("Location: service.php");
            
        }
        else{
            die('Error: ' . mysqli_error($dbh));
        }
        
		
?>