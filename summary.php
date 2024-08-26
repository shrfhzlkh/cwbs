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

    <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  margin: 0;
  padding: 0;
  
  top: 0;
  width: 100%;
  overflow: hidden;
  background-color: black;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav b {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
  font-style: italic;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: black;
}

.bg-text {
  text-align: center;
}

.logo-image {
  float: left;
  padding: 0;
}
</style>

</head>

<body>
<?php
    include('config.php');
    include ('menu.php');
?>

<a class="btn btn-custom my-2 mx-1" href="back.php?summary=<?php echo $_GET['book_id']?>&date_book=<?php echo $_GET['date']?>&id=<?php echo $_GET['id']?>">Back</a>


    <div class="container pt-5" id="main content"> 
        <div class="row"> 
            <div class="col-lg-20 ms-auto p-4 overflow-hidden"> 
                <div class="container-fluid" > 
                <div class="col-md-12"> 
                    <div class="card"> 
                        <div class="card-header" style="text-align:center"> 
                            <h3>BOOKING SUMMARY</h3>                    
                        </div> 
                    <div class="card-body" > 
                        <table class="table table-bordered table-hover"> 
                        <colgroup> 
                            <col width="15%"> 
                            <col width="20%"> 
                            <col width="15%"> 
                            <col width="10%"> 
                            <col width="10%"> 
                            <col width="10%"> 
                            <col width="30%"> 
                            <col width="10%"> 

                        </colgroup> 
                        <thead> 
                            <tr> 
                                <th class="text-center">BOOKING ID</th> 
                                <th class="text-center">CUSTOMER NAME</th> 
                                <th class="text-center">SERVICE</th> 
                                <th class="text-center">DATE</th> 
                                <th class="text-center">TIME</th> 
                                <th class="text-center">PLATE NUMBER</th> 
                                <th class="text-center">ADDITIONAL SERVICE</th> 
                                <th class="text-center">PRICE</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php

                            
                            $id=$_GET['book_id'];
                            $addon_total=0;
                            $total=0;


                            if(!isset($_GET['noAdd'])) {

                            $sql ="SELECT *, d.Service_id AS service_add from booking o  
                            join customer c ON o.Cust_id=c.Cust_id 
                            join service s ON o.Service_id=s.Service_id
                            join add_on d ON o.Add_id=d.Add_id
                            join car p ON o.car_id=p.car_id where o.Book_id=$id "; 
                            $booking = $conn->query($sql) or die($conn->error);
                            }

                            else{

                                $sql ="SELECT *, p.Car_size as size from booking o  
                                join customer c ON o.Cust_id=c.Cust_id 
                                join service s ON o.Service_id=s.Service_id
                                join car p ON o.car_id=p.car_id where o.Book_id=$id "; 
                                $booking = $conn->query($sql) or die($conn->error);

                            }

                            while($row=$booking->fetch_assoc()): 

                               if($row['Add_id']!=NULL) {
                              $sql2 =$conn->query("SELECT * from service o  
                              join add_on d ON o.Service_id=d.Service_id
                              where d.Add_id=".$row['Add_id']) ;

                              foreach($sql2->fetch_array() as $k => $val){
                                $$k =$val;
                              }
                            
                              $sql3 =$conn->query("SELECT * from car
                              where car_id=".$row['car_id']) ;

                              foreach($sql3->fetch_array() as $k => $val){
                                $$k =$val;
                              }

                              if($Car_size=='Small'){

                                $sql4 =$conn->query("SELECT * from service
                                where Service_id=".$row['service_add']) ;
  
                                foreach($sql4->fetch_array() as $k => $val){
                                  $$k =$val;
                                }

                                $addon_total=$Small;

                              }

                              else if($Car_size=='Medium'){

                                $sql4 =$conn->query("SELECT * from service
                                where Service_id=".$row['service_add']) ;
  
                                foreach($sql4->fetch_array() as $k => $val){
                                  $$k =$val;
                                }

                                $addon_total=$Medium;

                              }

                              else if($Car_size=='Large'){

                                $sql4 =$conn->query("SELECT * from service
                                where Service_id=".$row['service_add']) ;
  
                                foreach($sql4->fetch_array() as $k => $val){
                                  $$k =$val;
                                }

                                $addon_total=$Large;

                              }

                              else if($Car_size=='Extralarge'){

                                $sql4 =$conn->query("SELECT * from service
                                where Service_id=".$row['service_add']) ;
  
                                foreach($sql4->fetch_array() as $k => $val){
                                  $$k =$val;
                                }

                                $addon_total=$Extralarge;

                              }

                              
                              $total=(int)$addon_total;

                            }


                              $carsize=$row['Car_size'];

                              $totalprice= $row[$carsize] + $total;
                              $price="UPDATE booking SET Price=$totalprice WHERE Book_id=$id";
                              $bookings = $conn->query($price) or die($conn->error);

                            ?> 
                            <tr> 
                                <td class="text-center"><?php echo $row['Book_id'] ?></td> 
                                 
                                <td class=""> 
                                    <?php echo $row['Cust_name'] ?>                                   
                                </td> 
                                <td class=""> 
                                    <?php echo $row['Service_type'] ?>                                  
                                </td> 
                                <td class=""> 
                                    <?php echo $row['Book_date'] ?>                                   
                                </td> 
                                <td class=""> 
                                    <?php echo $row['Book_time'] ?>                                   
                                </td> 
                                <td class=""> 
                                    <?php echo $row['Car_platenum'] ?>                                 
                                </td> 
                                <td class=""> 
                                    <?php echo $row['Add_id']!=NULL ? $Service_type : 'No add on' ?>                                 
                                </td> 
                                <td class=""> 
                                    RM<?php echo $row[$carsize] + $total ?>.00                                
                                </td> 

                                 
                                <!-- action button-->

                            </tr> 
                        </tbody> 
                        </table> 

                        <div class="ml-auto" style="text-align:center">
                        <a class="btn btn-custom my-2 mx-1" value="cancel" onClick="return confirm('Do you really want to cancel ?');" href="deletebook.php?book_id=<?php echo $row['Book_id']?>">Cancel</a>
                        <a class="btn btn-custom my-2 mx-1" href="payment.php?book_id=<?php echo $row['Book_id']?>">Confirm</a>
                        </div>
                        <?php endwhile; ?> 

                    </div> 
                    </div> 
                </div> 
                </div> 
            </div> 
        </div> 
    </div> 
 
</body> 
</html>