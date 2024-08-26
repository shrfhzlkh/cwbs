<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	// Code for Booking
if(isset($_POST['book']))
{
$stype=$_POST['servicetype'];
$fname=$_POST['fname'];
$mobile=$_POST['contactno'];
$platenum=$_POST['platenum'];
$carsize=$_POST['carsize'];
$date=$_POST['date'];
$time=$_POST['time'];
$bno=mt_rand(100000000, 999999999);
$sql="INSERT INTO booking(Book_id,Book_time,Book_date) VALUES(:bno, :date,:time)";
$query = $dbh->prepare($sql);
$query->bindParam(':bno',$bno,PDO::PARAM_STR);
$query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
$query->bindParam(':wpoint',$wpoint,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':time',$time,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
 
  echo '<script>alert("Your booking done successfully. Booking number is "+"'.$bno.'")</script>';
 echo "<script>window.location.href ='service.php'</script>";
}
else 
{
 echo "<script>alert('Something went wrong. Please try again.');</script>";
}

}

	?>
<!DOCTYPE HTML>
<html>
<head>
<title>CWBS | Add Booking</title>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ 
      minDate: 0 ,
      beforeShowDay: function(date) {
        return [date.getDay() != 5];
    }
    });
  } );
  </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
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
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Add Car Washing Booking </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Add Booking</h3>

  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="washingpoint" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Service Type</label>
									<div class="col-sm-8">
								 <select name="servicetype" required class="form-control">
                <option value="">Service Type</option>
                <option value="Car Wash">CAR WASH</option>
                 <option value="Water Wax">WATER WAX</option>
                  <option value="Wash Carpet">WASH CARPET</option>
				  <option value="Steam Rim">STEAM RIM</option>
                  <option value="Wax">WAX</option>
                  <option value="Steam Leather">STEAM LEATHER</option>
                  <option value="Full Polish Winscreen">FULL POLISH WINSCREEN</option>
                  <option value="Leather Wash">LEATHER WASH</option>
                  <option value="Leather Coating">LEATHER COATING</option>
                  <option value="Fabric Wash">FABRIC WASH</option>
                  <option value="Lamp Polish Coating">LAMP POLISH COATING</option>
                  <option value="Trim Coating">TRIM COATING</option>
                  <option value="1 Layer Polish">1 LAYER POLISH</option>
                  <option value="4 Layer Polish">4 LAYER POLISH</option>
                  <option value="KB Nanox 1 Year 1 Layer Polish">KB NANOX 1 YEAR 1 LAYER POLISH</option>
                  <option value="KB Diamond 9H 2 Year 4 Layer Polish">KB DIAMOND 9H 2 YEAR 4 LAYER POLISH</option>
                  <option value="KB Diamond + Nano 3 Year">KB DIAMOND + NANO 3 YEAR </option>

              </select>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Full Name</label>
									<div class="col-sm-8">
										<input type="text" name="fname" class="form-control" required placeholder="Full Name">
									</div>
								</div>



								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile No</label>
									<div class="col-sm-8">
										<input type="text" name="contactno" class="form-control"  required placeholder="Mobile No.">
									</div>
								</div>


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Car Plate Number</label>
									<div class="col-sm-8">
										<input type="text" name="platenum" class="form-control"   required placeholder="Plate number">
									</div>
								</div>


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Car size</label>
									<div class="col-sm-8">
										<input type="text" name="carsize" class="form-control"  required placeholder="Size of the car">
									</div>
								</div>



								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Date</label>
									<div class="col-sm-8">
									<input type="date" id="datepicker" name="date" required class="form-control">
									</div>
								</div>

	

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Time</label>
									<div class="col-sm-8">
									<select name="time" required class="form-control">
				<option value="">Time</option>
				<option value="10:00AM - 10:30AM">10:00AM - 10:30AM</option>
                <option value="10:30AM - 11:00AM">10:30AM - 11:00AM</option>
                <option value="11:00AM - 11:30AM">11:00AM - 11:30AM</option>
				<option value="11:30AM - 12:00AM">11:30AM - 12:00AM</option>
                 <option value="12:00PM - 12:30PM">12:00PM - 12:30PM</option>
				 <option value="12:30PM - 13:00PM">12:30PM - 13:00PM</option>
                 <option value="13:00PM - 13:30PM">13:00PM - 13:30PM</option>
                 <option value="13:30PM - 14:00PM">13:30PM - 14:00PM</option>
                 <option value="14:00PM - 14:30PM">14:00PM - 14:30PM</option>
                 <option value="14:30PM - 15:00PM">14:30PM - 15:00PM</option>
                 <option value="15:00PM - 15:30PM">15:00PM - 15:30PM</option>
                 <option value="15:30PM - 16:00PM">15:30PM - 16:00PM</option>
                 <option value="16:00PM - 16:30PM">16:00PM - 16:30PM</option>
                 <option value="16:30PM - 17:00PM">16:30PM - 17:00PM</option>
                 <option value="17:00PM - 17:30PM">17:00PM - 17:30PM</option>
                 <option value="17:30PM - 18:00PM">17:30PM - 18:00PM</option>
                 <option value="18:00PM - 18:30PM">18:00PM - 18:30PM</option>
                 <option value="18:30PM - 19:00PM">18:30PM - 19:00PM</option>
</select>
									</div>
								</div>														
	

					
								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="book" class="btn-primary btn">Add</button>

				<button type="reset" class="btn-inverse btn">Reset</button>
			</div>
		</div>
						
						
						
					</div>
					
					</form>

     
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	<!--//grid-->

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