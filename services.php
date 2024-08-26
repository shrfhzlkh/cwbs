<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

</head>
<body>
	<?php
		include ('menu.php');
        include ('config.php');

	?>
        <div class="section-header text-center">
     <h2>Price List</h2>
</div>
     <p><table width="700" border="6" align="center" cellpadding="5" cellspacing="4">
    <tr class="table-head">
      <td class="head-name" width="30" align="center">No</td>
      <td class="head-name" width="100" align="center">Services</td>
      <td class="head-name" width="50" align="center">Small </td>
      <td class="head-name" width="50" align="center">Medium </td>
      <td class="head-name" width="50" align="center">Large </td>
      <td class="head-name" width="50" align="center">Extra Large </td>
    </tr>
    <?php 
    $q="SELECT * FROM service";
    $i=0;
    $check=mysqli_query($conn, $q);
    while($row=mysqli_fetch_assoc($check))
    { 
    $i++;
    ?>
    <tr class="table-body">
    	<td height="38" align="center"><?php echo $i;?></td>
    <td align="center"><?php echo $row["Service_type"];?></td>
    <td align="center">RM <?php echo $row["Small"];?>.00</td>
    <td align="center">RM <?php echo $row["Medium"];?>.00</td>
    <td align="center">RM <?php echo $row["Large"];?>.00</td>
    <td align="center">RM <?php echo $row["Extralarge"];?>.00</td>
    </tr>
    <?php
    }
    ?>
    	</table></p>

</body>
</html>
