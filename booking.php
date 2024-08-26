<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: auto;
  text-align: center;
  font-family: arial;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #202C45;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>
</head>
<body>
<?php
		include ('menu.php');
        include("config.php");

	?>

<h1 style="text-align:center">Select Services</h1>
<?php $service=$conn->query("select * from service ")?>
<div class="row g-2 ">
    <?php while($row=$service->fetch_assoc()):?>
    <div class="col-lg-3"> 
        <div class="card h-100">
            <div class="card-body">
                <img src="img/icon service/car wash.png" alt="Car Wash" style="width:30%" >
            
            <h2><?php echo $row['Service_type']?></h2>
            </div>
            <div class="card-footer">
            <a class="btn btn-custom my-2 mx-1" href="handle.php?id=<?php echo $row['Service_id']?>">Book Now</a>
            </div>  
        </div>
    </div>
 <?php endwhile;?>
</div>
</body>
</html>
