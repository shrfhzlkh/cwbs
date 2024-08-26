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

  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

              <!-- Modal -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ 
      minDate: 1 ,
      beforeShowDay: function(date) {
        return [date.getDay() != 5];
    }
    });
  } );
  </script>
</head>
<style>
	.container{
		padding-left: 11rem ;
	}
</style>

<body>
 <?php include ("menu.php"); 
   include('config.php');
   ?>

 <a type="submit" class="btn btn-custom my-2 mx-1" href="back.php?date=<?php echo $_GET['book_id']?>&id=<?php echo $_GET['id']?>" >Back</a>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal"> <img src="img/car.png" width="32" height="32" alt="Cart">
 Cart
</button><br><br>

 <div class="container pt-5 ">
	<div class="card shadow " style="width:50rem;" >
		<div class="card-body mb-4" >
				<div class="bg-text">
		
	<form action="handle.php" method="POST">
<h2>Choose Date </h2>

<input type="hidden"  name="book_id" value=<?php echo $_GET['book_id']?>>
<input type="hidden"  name="id" value=<?php echo $_GET['id']?>>

<h4> Date:	<input type="text" id="datepicker" name="date_book" required></h4>
 
<button class="btn btn-custom my-2 mx-1" type="submit">Next</a>

</div> 
</div> 
</div> 
</div> 

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <table class="table table-bordered table-hover"> 
        <?php
        $id=$_GET['book_id'];
        $sql="SELECT * FROM booking b join car c on b.car_id=c.car_id join service s on b.Service_id=s.Service_id WHERE Book_id=$id";
        $resultuser = $conn->query($sql);
        if ($resultuser->num_rows > 0) {
            while($rows = $resultuser->fetch_assoc()) {

        ?>
                            <tr> 
                                <th width="5">Service</th> 
                                <td ><?php echo $rows['Service_type'] ?>   </td> 
                            </tr> 
                            <tr> 
                                <th width="5">Car plate number</th> 
                                <td ><?php echo $rows['Car_platenum'] ?>   </td> 
                            </tr> 
                            <tr> 
                                <th width="5">Car size</th> 
                                <td ><?php echo $rows['Car_size'] ?>   </td> 
                            </tr> 


                        </table> 
<?php }}?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>