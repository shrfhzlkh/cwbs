<?php session_start();

?>
<style>
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

<div class="topnav  ">
    <div class="logo-image">
      <img src="img/logo.png" width="100" height="50" title="logo cwbs";>
    </div>
      <b> AP AUTOSPA </b>

      <?php if(isset($_SESSION['login'])):?>
      <div class="ml-auto">
         <a class="btn btn-custom my-2 mx-1" href="logout.php">Logout</a>
      </div>
      <?php else :?>
        <div class="ml-auto">
         <a class="btn btn-custom my-2 mx-1" href="login.php">Login</a>
      </div>
      <?php endif;?>

      <?php if(isset($_SESSION['login'])):?>
    <a href="profile.php">Profile</a>
    <?php endif;?>

    <a href="services.php">Pricing</a>

    <?php if(isset($_SESSION['login'])):?>
    <a href="booking.php">Booking</a>
    <?php endif;?>

    <a href="about.php">About</a>
    <a href="index.php">Home</a>

  </div>
