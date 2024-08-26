<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$id=$_GET['bid'];
$status=$_POST['bookstatus'];
$sql1="UPDATE booking SET Book_status='$status' WHERE Book_id=$id";
$query = $dbh->prepare($sql1);
$query->execute();
if($query){
 echo "<script>alert('Booking Details updated successfully');</script>";
 //echo "<script>window.location.href ='payment.php'</script>";
}
else
{
	echo "<script>alert('Error');</script>";
}
}

if(isset($_POST['delete']))
{
	$id=$_GET['bid'];
	$sql = "DELETE FROM booking WHERE Book_id = $id";
	$query = $dbh->prepare($sql);
	$query->execute();
	echo "<script>window.location.href ='all-bookings.php'</script>";
}



	?>
<!DOCTYPE HTML>
<html>
<head>
<title>CWBS | Booking Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css?v=<?php echo time();?>" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php include('includes/header.php');?>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Booking Details</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->

				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Bookings Details #<?php echo $_GET['bid'];?></h2>
					    <table id="table">
				
						</thead>
						<tbody>
<?php 
$bid=$_GET['bid'];
$sql = "SELECT *, o.Add_id as add_id from booking o  
join customer c ON o.Cust_id=c.Cust_id 
join service s ON o.Service_id=s.Service_id

join car p ON o.car_id=p.car_id where o.Book_id='$bid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{
	
$add_id= htmlentities($result->add_id);	

	if($add_id!=NULL) {
		$sql2 = "SELECT * from service o  
		join add_on d ON o.Service_id=d.Service_id
		where d.Add_id=$add_id";
		$query = $dbh -> prepare($sql2);
		$query->execute();
		$add=$query->fetchAll(PDO::FETCH_OBJ);

		
	}

?>		
						  <tr>
							<th>Name</th>
								<td width="300"><?php echo htmlentities($result->Cust_name);?></td>
								<th>Mobile No</th>
							<td width="300"><?php echo htmlentities($result->Cust_phone);?></td>

						</tr>
						<tr>
							<th>Service Type</th>
							<td><?php echo htmlentities($result->Service_type);?></td>
							<th>Additional Service</th>
								<td>
								<?php if($add_id!=NULL) { 
									foreach($add as $adds)
									{ echo htmlentities($adds->Service_type);}}
									else {
										echo "No Add On";
									}
									?></td>

						</tr>
						<tr>
							
						<th>Date</th>
							<td><?php echo htmlentities($result->Book_date);?></td>
							<th>Time</th>
							<td><?php echo htmlentities($result->Book_time);?></td>

							</tr>
							<tr>
							<th>Car Plate Number</th>
							<td><?php echo htmlentities($result->Car_platenum);?></td>
							<th>Price</th>
							<td colspan="2">RM <?php echo htmlentities($result->Price);?></td>
							</tr>
							<tr>
							<th>Status</th>
							<td colspan="2"><?php echo htmlentities($result->Book_status);?></td>
							</tr>
<?php if($result->adminRemark==''): ?>

	<tr>
		<td colspan="3">
	<button data-toggle="modal" data-target="#myModal" class="btn-primary btn">Take Action</button><br><br>
	<form method="post">   
	<button type="submit" class="btn btn-danger" name="delete" onClick="return confirm('Do you really want to delete booking?');" >Delete</button>
</td>
</tr>
</form>

<?php  else:?>

<tr>
	<td colspan="4" style="color:blue; font-size:22px; text-align:center; font-weight:bold;">Admin Details</td>
</tr>

<tr>
	<th>Booking Status</th>
	<td><?php echo htmlentities($result->Book_status);?></td>
		<th>Transaction No.(if any)</th>
	<td><?php echo htmlentities($result->txnNumber);?></td>
</tr>
<tr>
	<th>Admin Remark</th>
	<td colspan="3"><?php echo htmlentities($result->adminRemark);?></td>
</tr>
<?php endif;?>

						 <?php } }  ?>
						</tbody>
					  </table>
					</div>
				  </table>

				
			</div>


<!--Model-->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Booking #<?php echo $_GET['bid'];?></h4>
        </div>
        <div class="modal-body">
<form method="post">   
  <p>
            <select name="bookstatus" required class="form-control">
                <option value="">Booking Status</option>
                <option value="PAID">PAID</option>
                 <option value="UNPAID">UNPAID</option>
              </select>       
         
             <p><input type="submit" class="btn btn-custom" name="update" value="Update"></p>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>









<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
						<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>