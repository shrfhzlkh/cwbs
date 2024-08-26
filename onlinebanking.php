<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>CWBS</title>

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
		<link href="css/style.css?v=<?php echo time();?>" rel="stylesheet">

</head>

<style>
	.container{
		padding-left: 11rem ;
	}


</style>

<body>
<?php 

session_start();
include ("config.php"); 
 
        $bid=$_GET['book_id'];
        $user_id=$_SESSION['User_id'];
        $sql = "SELECT * FROM booking WHERE Book_id=$bid";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            $price=$row['Price'];
            }
        }

        $sql1 = "SELECT * FROM userbank WHERE User_id=$user_id";
        $resultuser = $conn->query($sql1);
        if ($resultuser->num_rows > 0) {
            while($rows = $resultuser->fetch_assoc()) {
            $account=$rows['Account_no'];
            $balance=$rows['Balance'];
            }
        }

        if(isset($_POST["submit"])) {
            $sql2=$conn->query("UPDATE booking SET Book_status='PAID' WHERE Book_id=$bid");
            $newbal=$balance-$price;
            $sql3=$conn->query("UPDATE userbank SET Balance=$newbal WHERE User_id=$user_id");
            header ("location:confirm.php?book_id=$bid");
        }
        
        ?>

 <div class="container pt-5 ">
	<div class="card shadow " style="width:50rem;" >
		<div class="card-body mb-4" >
				<div class="bg-text">
                <form method="POST">
                <img src="img/Bank-Islam-LOGO.png" alt="Bank Islam" style="width:30%" ><br><br>

<label for="accounttype"><b>Account Type:   </b> Savings Account</label><br>

<label for="accountnum"><b>Account Number:    </b><?php echo $account?></label><br>
<label for="date"><b>Date:    </b><?php echo date("Y/m/d")?></label><br>
<label for="balance"><b>Available balance: </b>RM<?php echo $balance?>.00</label><br>

    <label for="price"><b>Price: </b>RM
    <?php echo $price ?>.00</label><br>

<button class="button" type="submit" name="submit">Pay</a>

</div> 
</div> 
</div> 
</div> 
<?php 
           // }}
?>