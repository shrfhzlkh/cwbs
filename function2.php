<?php
if(isset($_SESSION['User_id']))
	{
		$uid = $_SESSION['User_id'];
		$query = "select * from userbank where User_id = '$uid' limit 1";
		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
?>