<?php
include 'config.php';
$name=$_POST['custname'];
$email=$_POST['custemail'];
$phone=$_POST['custphone'];
$pass=$_POST['custpass'];

$get_email = "select * from customer where Cust_email='$email'";

$run_email = mysqli_query($conn,$get_email);

$check_email = mysqli_num_rows($run_email);

if($check_email == 1){

echo "<script>alert('This email is already registered, try another one')</script>";
echo "<script type='text/javascript'>alert;window.location.href='signup.php'</script>";			

}
else {
    $pass= md5($pass);
        $sql = "insert into customer (Cust_name, Cust_email, Cust_phone, Cust_password) 
    values ('$name','$email','$phone','$pass')";

        if (mysqli_query($conn, $sql)){
            echo "<script>alert('You have successfully register! Please login to continue.')</script>";
            echo "<script type='text/javascript'>alert;window.location.href='login.php'</script>";			
                        
        }
        else{
            die('Error: ' . mysqli_error($conn));
        }
        

}

		
?>