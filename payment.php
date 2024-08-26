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

<body>

<?php
	include('menu.php');
  include('config.php');

?>

<?php 
    $id=$_GET['book_id'];
    $qry = $conn->query("SELECT * from booking where Book_id = $id");
    $row = $qry -> fetch_array(MYSQLI_ASSOC);
    
    $sql=$conn->query("UPDATE booking SET Book_status='UNPAID' WHERE Book_id=$id");
?>
<section class="py-5">
    <div class="container">
        <div class="card rounded-0">
            <div class="card-body"></div>
            <h3 class="text-center"><b>Checkout</b></h3>
            <hr class="border-dark">
            <form action="" id="place_order">
                <input type="hidden" name="amount" value="<?php echo $row['Price'] ?>">
                <input type="hidden" name="payment_method" value="cod">
                <input type="hidden" name="paid" value="0">
                <div class="row row-col-1 justify-content-center">
                    <div class="col-6">
                        <div class="form-group col address-holder">
                            <label for="" class="control-label">Your booking is confirmed! Please proceed to payment.</label>
                        </div>
                        <div class="col">
                            <span><h4><b>Total: RM</b> <?php echo $row['Price'] ?>.00</h4></span>
                        </div>
                        <hr>
                        <div class="col my-3">
                        <h4 class="text-muted">Payment</h4>
                            <div class="d-flex w-100 justify-content-between">
                            <a class="btn btn-custom my-2 mx-1" href="loginpayment.php?book_id=<?php echo $id?>">Online Payment</a>
                            <a class="btn btn-custom my-2 mx-1" href="confirm.php">Pay on Arrival</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
 
    </body>
    </html>