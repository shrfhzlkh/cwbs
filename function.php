<?php
function check_login($conn)
{
	if(isset($_SESSION['Cust_id']))
	{
		$id = $_SESSION['Cust_id'];
		$query = "select * from customer where Cust_id = '$id' limit 1";
		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
		//redirect to login
	header("Location: login.php");
	die;
	}
}

/*if(isset($_SESSION['admin_id']))
	{
		$id = $_SESSION['admin_id'];
		$query = "select * from admin where admin_id = '$id' limit 1";
		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
		//redirect to login
	header("Location: adminlogin.php");
	die;
	}
    */
?>

