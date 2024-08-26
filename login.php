
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
</style>
<body>
<?php
	include('menu.php');
	include("config.php");
	include("function.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		If (isset($_POST['custemail'], $_POST['custpass']))
		{
			$email = $_POST['custemail'];
		    $password = $_POST['custpass'];
			$password = md5($password);
		}

		if(!empty($email) && !empty($password) && !is_numeric($email))
		{
			//read from database
			$query = "select * from customer where Cust_email = '$email'";
			$result = mysqli_query($conn, $query);
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['Cust_password'] === $password && $user_data['Cust_email'] === $email)
					{
						$_SESSION['login']='1';
						$_SESSION['Cust_id'] = $user_data['Cust_id'];
						$_SESSION['custemail']=$user_data['Cust_email'];
						$_SESSION['custpass']=$user_data['Cust_password'];
						echo "<script type='text/javascript'>alert('You have successfully login!')</script>";
						echo "<script type='text/javascript'>alert;window.location.href='index.php'</script>";			
						die;
					}
					else
                    {
						echo "<script type='text/javascript'>alert('Wrong password or email!')</script>";
						echo "<script type='text/javascript'>alert;window.location.href='login.php'</script>";			
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
						<h1 style="font-size:50px">LOGIN</h1>
						<form method = "post">
							<div class= "input-group">
							<input id="text" type = "text" name = "custemail" placeholder="Email" required><br><br>
							</div>
							<div class= "input-group">
							<input id="text" type = "password" name = "custpass" placeholder="Password" required><br><br>
							</div>
								<button class="btn btn-custom"> Login</button><br><br>
								<p class="login-register-text">Don't have an account? <a href="signup.php">Signup Here</a>.</p>

						</form>
				</div>
		</div>
	</div>
</div>
</body>
