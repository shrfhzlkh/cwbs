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

            <!-- Modal -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<style>
	.container{
		padding-left: 17rem ;
	}
</style>

<body>

<?php
	include('menu.php');
  include('config.php');
?>

<a type="submit" class="btn btn-custom my-2 mx-1" href="back.php?cardetails=<?php echo $_GET['book_id'] ?>" >Back</a>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal"> <img src="img/car.png" width="32" height="32" alt="Cart">
 Cart
</button><br><br>

<div class="row">
  <div class="col-sm-6">
    <div class="card ml-5">
      <div class="card-body">
	  <div class="bg-text">

<form action="handle.php" method="POST">
<input type="hidden" class="form-control" name="book_id" value="<?php echo $_GET['book_id'] ?>" >
<input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id'] ?>" >

  <div class="mb-3">
    <label for="platenum" class="form-label">Car Plate Number (eg: WKS3393)</label>
    <input type="text" class="form-control" name="platenum" required>
  </div>
  
  <div class="mb-3">
    <label for="carsize" class="form-label">Car Size</label>
    <select name="carsize" class="form-control" required>
        <option value="">Select car size</option>
        <option value="Small">Small</option>
        <option value="Medium">Medium</option>
        <option value="Large">Large</option>
        <option value="Extralarge">Extra Large</option>
    </select>
  </div>

         <button class="btn btn-custom my-2 mx-1" type="submit">Next</a>

</form>
</div>
</div>
</div>
</div>
<br><br>

<div class="col-sm-6">
    <div class="card text-center " style="width:25rem;">
      <div class="card-body mb-3 pb-2">
<h5 style="text-align:center"> Car Size Guide </h5>

		<img src="img/car size/small.png" alt="Car Wash" style="width:10%" >
		<h4><b>Small</b></h4>
		<h6>-Regular Size Car</h6>
	</a>
	<img src="img/car size/medium.png" alt="Car Wash" style="width:10%" >
		<h4><b>Medium</b></h4>
		<h6>-Medium Size Car</h6>
		<h6>-Compact SUV</h6>
	</a>
	<img src="img/car size/large.png" alt="Car Wash" style="width:10%" >
		<h4><b>Large</b></h4>
		<h6>-Minivan</h6>
		<h6>-Pickup Truck</h6>
		</a>
	<img src="img/car size/extralarge.png" alt="Car Wash" style="width:10%" >
		<h4><b>Extra Large</b></h4>
		<h6>-Cargo Truck</h6>
		</a>
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
        $id=$_GET['id'];
        $sql="SELECT * FROM service WHERE Service_id=$id";
        $resultuser = $conn->query($sql);
        if ($resultuser->num_rows > 0) {
            while($rows = $resultuser->fetch_assoc()) {

        ?>
                            <tr> 
                                <th width="5">Service</th> 
                                <td ><?php echo $rows['Service_type'] ?>   </td> 
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