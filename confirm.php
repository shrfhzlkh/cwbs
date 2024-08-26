<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CWBS</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
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
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>

<style>
	.container{
		padding-left: 11rem ;
	}
</style>

<body>

<?php
	include('menu.php');
  include('config.php');

  if(isset($_POST["submit"])) {
    $bid=$_GET['book_id'];
    $sql=$conn->query("UPDATE booking SET Book_status='PAID' WHERE Book_id=$bid");
    
}

?>

<div class="container pt-5 ">
	<div class="card shadow " style="width:50rem;" >
		<div class="card-body mb-4" >
				<div class="bg-text">
                    <h2>Thankyou!<h2>
<h4>Your Booking Has Been Confirmed!<h4>
<a class="btn btn-custom my-2 mx-1" href="index.php">Home</a>
</body>
</html>
