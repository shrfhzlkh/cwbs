<?php
include 'config.php';

$id=$_GET['book_id'];
$username=$_POST['username'];
$accountno=$_POST['accountno'];
$password=$_POST['password'];

    $sql = "insert into userbank (Username, Password, Account_no) 
    values ('$username','$password','$accountno')";

        if (mysqli_query($conn, $sql)){
            header("Location: loginpayment.php?book_id=$id");
            
        }
        else{
            die('Error: ' . mysqli_error($conn));
        }
        
		
?>
