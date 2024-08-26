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

<body>
<?php
	  include('menu.php');
    include('config.php');

$ids=$_GET['Service_id'];
$size=$_GET['carsize'];
    $price= "SELECT $size FROM `service` where Service_id=$ids";    
    $booking = $conn->query($price) or die($conn->error);
          echo $price
?> 
        </body>
        </html>