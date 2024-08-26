<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
          <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<style>
		.container{
		padding-left: 15rem ;
		padding-right: 15rem ;
	}

#contents > div.clearfix:first-child {
	width: 940px;
	padding: 30px 10px 30px;
}
.button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #202C45;
}

.button1:hover {
  background-color: #6d7da1;
  color: white;
}

</style>

<body>
	<?php
		include ('menu.php');
		
	?>

<a class="btn btn-custom my-2 mx-1" href="booking.php">Back</a>

		<div class="clearfix">
			<div class= "container">
				<div>
					<h2>Select Your Car Size</h2>
				</div>
	
	<div class="card my-2 mx-1">
		<a class="button button1" href="handle.php&size=Small?book_id=<?php echo $_GET['book_id'] ?>">
		<img src="img/car size/small.png" alt="Car Wash" style="width:10%" >
		<h4><b>Small</b></h4>
		<h6>Regular Size Car</h6>
	</a>
	</div>

	<div class="card my-2 mx-1">
	<a class="button button1" href="handle.php?size=Medium">
	<img src="img/car size/medium.png" alt="Car Wash" style="width:10%" >
		<h4><b>Medium</b></h4>
		<h6>Medium Size Car</h6>
		<h6>Compact SUV</h6>
	</a>
	</div>
	<div class="card my-2 mx-1">
	<a class="button button1" href="handle.php?size=Large">
	<img src="img/car size/large.png" alt="Car Wash" style="width:10%" >
		<h4><b>Large</b></h4>
		<h6>Minivan</h6>
		<h6>Pickup Truck</h6>
		</a>
	</div>
	<div class="card my-2 mx-1">
	<a class="button button1" href="handle.php?size=Extralarge">
	<img src="img/car size/extralarge.png" alt="Car Wash" style="width:10%" >
		<h4><b>Extra Large</b></h4>
		<h6>Cargo Truck</h6>
		</a>
	</div>

</body>
</html>