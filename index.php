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
?>
<!-- Carousel Start -->

            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/bg.jpg" alt="Image" style="height: 500px;">
                        </div>

                        <div class="carousel-text">
                            <h3>Car Detailing Specialist</h3>
                            <h1>AP AUTO SPA</h1>
                            <?php if(isset($_SESSION['login'])):?>
                            <a class="btn btn-custom" href="booking.php">Book Now!</a>
                            <?php  else :?>
                            <a class="btn btn-custom" href="login.php">Book Now!</a>
                            <?php endif;?>
                        </div>
                        
                    </div>
                 
                </div>
            </div>

    <div class="container ">
                    <!-- About Start -->
            <div class="about mt-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="img/background.jpg" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="section-header text-left">
                                <p>About Us</p>
                                <h2>Car Detailing Specialist</h2>
                            </div>
                            <div class="about-content">
                                <p>
                                Premium Quality Car Wash And Trusted Car Detailing Center In Kuala Terengganu                               
                                </p>
                                <ul>
                                    <li><i class="far fa-check-circle"></i>Seats washing</li>
                                    <li><i class="far fa-check-circle"></i>Vacuum cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Interior wet cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Window wiping</li>
                                </ul>
                                <a class="btn btn-custom" href="about.php">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->

                    <!-- Service Start -->
            <div class="service">
                <div class="container">
                    <div class="section-header text-center">
                        <p>What We Do?</p>
                        <h2>Premium Washing Services</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <i class="flaticon-car-wash-1"></i>
                                <h3>Car Wash</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <i class="flaticon-car-wash"></i>
                                <h3>Water Wax</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <i class="flaticon-vacuum-cleaner"></i>
                                <h3>Steam Leather</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <i class="flaticon-seat"></i>
                                <h3>Leather Wash</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <i class="flaticon-car-service"></i>
                                <h3>Fabric Wash</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <i class="flaticon-car-service-2"></i>
                                <h3>Wash Carpet</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <i class="flaticon-car-wash"></i>
                                <h3>Lamp Polish Coating</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <i class="flaticon-brush-1"></i>
                                <h3>Trim Coating</h3>
                            </div>
                        </div>
                        <a class="btn btn-custom my-2 mx-1" text-align="center" href="services.php">Learn More</a>

                    </div>
                </div>
            </div>
            <!-- Service End -->
    </div>

    <?php include_once('footer.php');?>

</body>
</html>



