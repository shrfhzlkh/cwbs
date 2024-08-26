<!DOCTYPE html>
<html>
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

</head>
<style>
	.container{
		padding-left: 17rem ;
	}
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
<body>
<?php
session_start();

	include("config.php");
	include("function2.php");

	$id=$_GET['book_id'];

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		If (isset($_POST['username'], $_POST['password']))
		{
			$username = $_POST['username'];
		    $password = $_POST['password'];
		}

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{
			//read from database
			$query = "select * from userbank where Username = '$username'";
			$result = mysqli_query($conn, $query);
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['Password'] === $password)
					{
						$_SESSION['login']='1';
						$_SESSION['User_id']=$user_data['User_id'];
						$_SESSION['Username']=$user_data['Username'];
						$_SESSION['Password']=$user_data['Password'];

						header("Location: onlinebanking.php?book_id=$id");
						die;
					}
					else
                    {
						echo '<script type="text/javascript">alert("Wrong password or username!")</script>';
						echo "<script type='text/javascript'>alert;window.location.href='loginpayment.php'</script>";			
					}
			    }
		    }
		
        }
    }


?>

<div class="container pt-5">
	<div class="card shadow " style="width:35rem;">
		<div class="card-body mb-4" >
			<div class="bg-image"></div>
				<div class="bg-text">
                     <img src="img/Bank-Islam-LOGO.png" alt="Bank Islam" style="width:30%" ><br><br>
						<a style="font-size:18px">WELCOME TO BANK ISLAM INTERNET BANKING</a><br><br>
						<form method = "post">
                       

							<div class= "input-group">
							<input id="text" type = "text" name = "username" placeholder="Username" required><br><br>
							</div>
							<div class= "input-group">
							<input id="text" type = "password" name = "password" placeholder="Password" required><br><br>
							</div>

								<button class="button"> Login</button><br><br>
<a href="signuppay.php?book_id=<?php echo $id?>">Register</a>
						</form>
				</div>
		</div>
	</div>
</div>
</body>
</html>