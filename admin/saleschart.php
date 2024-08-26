<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

		
	


	?>
<!--del part-->
<!DOCTYPE HTML>
<html>
<head>
<title>CWBS | Sales Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css?v=<?php echo time();?>" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<!-- tables -->
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
<!-- //tables -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script src="js/all.min.js" crossorigin="anonymous"></script>
		
<title>Sales Graph</title>
<style>
    body.{
        margin: 80px 100px 10px 100px;
        padding: 0;
        text-align: center;
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
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Sales Graph</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->
				<div class="container">

				<form  method="post">                                
<div class="row">
<h3>Choose Year:</h3>
<input   name="year" required>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>

</form>
</div>
<?php
if (isset($_POST['submit'])) { 
		$year=$_POST['year'];

		$data1 = '';

		//query to get data from the table
		
		for($month=1; $month<=12; $month++){
		$sql = "SELECT Book_status, sum(Price) as sum_sale from booking where Book_status='PAID' AND month(Book_date)='$month' AND year(Book_date)='$year' ";
		$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	foreach($results as $result){
	   $total_sale[]=htmlentities($result->sum_sale);
	   }
		}
	   $sale_jan=$total_sale[0];
	   $sale_feb=$total_sale[1];
	   $sale_mar=$total_sale[2];
	   $sale_apr=$total_sale[3];
	   $sale_may=$total_sale[4];
	   $sale_jun=$total_sale[5];
	   $sale_jul=$total_sale[6];
	   $sale_aug=$total_sale[7];
	   $sale_sep=$total_sale[8];
	   $sale_oct=$total_sale[9];
	   $sale_nov=$total_sale[10];
	   $sale_dec=$total_sale[11];
	
	}
?>

                <div class="container">	
	    <h1>Sales Graph <?php echo $year;?></h1>      
			<div class="pr-5" style="width:1000px">

		
			<canvas id="chart" style="width: 70%; height: 50vh; background: #222; border: 1px solid #555652; margin-top: 10px; margin-bottom: 10px;"></canvas><br>
			</div>
			<script>
				var ctx = document.getElementById("chart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [1,2,3,4,5,6,7,8,9,10,11,12],
		            datasets: 
		            [{
		                label: 'Sales',
		                data: ["<?php echo $sale_jan; ?>", 
						"<?php echo $sale_feb; ?>",
						"<?php echo $sale_mar; ?>",
						"<?php echo $sale_apr; ?>",
						"<?php echo $sale_may; ?>",
						"<?php echo $sale_jun; ?>",
						"<?php echo $sale_jul; ?>",
						"<?php echo $sale_aug; ?>",
						"<?php echo $sale_sep; ?>",
						"<?php echo $sale_oct; ?>",
						"<?php echo $sale_nov; ?>",
						"<?php echo $sale_dec; ?>"],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
		                borderWidth: 3
		            }
		            ]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}},
                    scales: {
            x: {
                type: 'time',
                time: {
                    unit: 'month'
                }
            }
        }
		        }
		    });
			</script>
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