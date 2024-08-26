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

<body>
<?php
	include('menu.php');
    include('config.php');

?>
<a class="btn btn-custom my-2 mx-1" href="back.php?addservice=<?php echo $_GET['book_id']?>&date_book=<?php echo $_GET['date_book']?>&id=<?php echo $_GET['id']?>">Back</a>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal"> <img src="img/car.png" width="32" height="32" alt="Cart">
 Cart
</button><br><br>

     <h1 style="text-align:center">Select Add-on Options</h1>

<p><table width="700" border="2" align="center" cellpadding="5" cellspacing="4">
    <?php 
    $book_id=$_GET['book_id'];
    $datebook=$_GET['date_book'];
    $id=$_GET['id'];
    $q="SELECT * FROM service WHERE Service_id != $id AND Service_id IN ('1001','1003','1004','1006','1008','1009');";
    $w="SELECT * FROM booking b JOIN car c ON c.Car_id = b.car_id WHERE Book_id=$book_id";
    $i=0;
    $check=mysqli_query($conn, $q);
    $check2=mysqli_query($conn, $w);
    $size=mysqli_fetch_assoc($check2);
    while($row=mysqli_fetch_assoc($check))
    { 
    $i++;
    ?>
    <tr class="table-body">
    <td align="center"><?php echo $row["Service_type"];?></td>

    <?php if($size['Car_size']=='small'){?>
    <td align="center">RM<?php echo $row["Small"];?>.00</td>
    <?php 
    }
    else if($size['Car_size']=='medium'){
    ?>
    <td align="center">RM<?php echo $row["Medium"];?>.00</td>
    <?php 
    }
    else if($size['Car_size']=='large'){
    ?>
    <td align="center">RM<?php echo $row["Large"];?>.00</td>
    <?php 
    }
    else if($size['Car_size']=='extra large'){
    ?>
    <td align="center">RM<?php echo $row["Extralarge"];?>.00</td>
    <?php }?>
    <td align="center"><a class="btn btn-info my-2 mx-1" href="handle.php?addon=<?php echo $row["Service_id"] ?>&noAdd&book_id=<?php echo $_GET['book_id'] ?>&date=<?php echo $datebook ?>&servid=<?php echo $id ?>">Select</a>
</td>
    </tr>
    <?php
    }
    ?>
    	</table></p>
        <a class="btn btn-custom my-2 mx-1 text-align:center" href="summary.php?noAdd&book_id=<?php echo $_GET['book_id'] ?>&date=<?php echo $datebook ?>&id=<?php echo $id ?>">Next</a>

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
                            <tr> 
                                <th width="5">Date</th> 
                                <td ><?php echo $rows['Book_date'] ?>   </td> 
                            </tr> 
                            <tr> 
                                <th width="5">Time</th> 
                                <td ><?php echo $rows['Book_time'] ?>   </td> 
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