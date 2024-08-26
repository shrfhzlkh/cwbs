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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<style>
	.container{
		padding-left: 17rem ;
	}

    table, th, td {
    border: 1px solid #202C45;
    border-collapse: collapse;
    
    }
    .table-head{
    background-color: #202C45;
    }

    .head-name{
    color:white;
    }

    .table-body, td {
        color:#202C45;
    }


</style>

<body>
<?php
	include('menu.php');
    include('config.php');

    $email=$_SESSION['custemail'];
    $qr="SELECT * FROM customer WHERE Cust_email='$email'";
    $qr2="SELECT * FROM booking WHERE Cust_email='$email'";
    $log=mysqli_query($conn, $qr);
    $row=mysqli_fetch_assoc($log);

?>
<br>
<div class="section-header text-center">
<h2>My Account</h2> 
</div>
<div class="container pt-1">
	<div class="card shadow " style="width:35rem;">
		<div class="card-body mb-4" >
			<div class="bg-image"></div>
				<div class="bg-text">

        <p align="justify" class="bg-text"> 
            <label> Name: <?php echo $row["Cust_name"]?> </label>
        </p>
        <p align="justify" class="bg-text"> 
            <label> Email: <?php echo $row["Cust_email"]?> </label>
        </p>
        <p align="justify" class="bg-text"> 
            <label> Phone No: <?php echo $row["Cust_phone"]?> </label>
        </p>
<!-- Button trigger modal -->
<button type="button" class="btn btn-custom my-2 mx-1" data-toggle="modal" data-target="#myModal">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="edit.php" method= "post" style="border:1px solid #ccc" >

      <div class="modal-body">
      <p> 
        <label for="custname"> Name: </label>
        <input name="custname" type="text" value="<?php echo $row["Cust_name"];?>"/>
    </p>
    <p> 
        <label for="custemail"> Email: </label>
        <input id="email" name="custemail" type="text" value="<?php echo $row["Cust_email"];?>"/> 
    </p>
    <p> 
        <label for="custphone" > Phone No: </label>
        <input name="custphone" type="text" value="<?php echo $row["Cust_phone"];?>"/> 
    </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
        </div>
</div>
</div>
</div>
</div>


<br><br>
<div class="section-header text-center">
     <h3>Booking History</h3>
</div>

<p><table width="700" border="6" align="center" cellpadding="5" cellspacing="4">
    <tr class="table-head">
      <td class="head-name" width="30" align="center">NO</td>
      <td class="head-name" width="100" align="center">SERVICE</td>
      <td class="head-name" width="80" align="center">DATE</td>
      <td class="head-name" width="50" align="center">TIME</td>
      <td class="head-name" width="50" align="center">PLATE NUMBER</td>
      <td class="head-name" width="50" align="center">ADDITIONAL SERVICE</td>
      <td class="head-name" width="50" align="center">PRICE</td>
      <td class="head-name" width="50" align="center">STATUS</td>
    </tr>
                            <?php  
                            $id=$_SESSION['Cust_id'];
                            $sql ="SELECT *, d.Service_id AS service_add from booking o  
                            join customer c ON o.Cust_id=c.Cust_id 
                            join service s ON o.Service_id=s.Service_id
                            left outer join add_on d ON o.Add_id=d.Add_id
                            join car p ON o.car_id=p.car_id where o.Cust_id=$id "; 
                            $booking = $conn->query($sql) or die($conn->error);
                            $count=1;
                            while($row=$booking->fetch_assoc()): 
if($row['Add_id']!=null){
                              $sql2 =$conn->query("SELECT * from service o  
                              join add_on d ON o.Service_id=d.Service_id
                              where d.Add_id=".$row['Add_id']) ;

                              foreach($sql2->fetch_array() as $k => $val){
                                $$k =$val;
                              }
                            }
                            ?> 
                                <tr class="table-body">
    <td height="38" align="center"><?php echo $count;?></td>
    <td align="center"><?php echo $row["Service_type"];?></td>
    <td align="center"><?php echo $row["Book_date"];?></td>
    <td align="center"><?php echo $row["Book_time"];?></td>
    <td align="center"><?php echo $row["Car_platenum"];?></td>
    <td align="center"><?php echo $row['Add_id']!=NULL ? $Service_type : 'No add on' ?> </td>
    <td align="center"><?php echo $row["Price"];?></td>
    <td align="center"><?php echo $row["Book_status"];?></td>
    </tr>

                            <?php $count=$count+1;
                        endwhile; ?> 
                        </table> </p>

</body>
</html>